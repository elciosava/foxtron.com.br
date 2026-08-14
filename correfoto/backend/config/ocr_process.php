<?php
require_once __DIR__.'/ocr.php';

function run_process_array(array $command, int $timeoutSeconds = 90): array {
    $descriptor = [
        0 => ['pipe','r'],
        1 => ['pipe','w'],
        2 => ['pipe','w'],
    ];

    $pipes = [];
    $options = PHP_OS_FAMILY === 'Windows'
        ? ['bypass_shell' => true, 'suppress_errors' => true]
        : [];

    try {
        $process = @proc_open($command, $descriptor, $pipes, null, null, $options);
    } catch (Throwable $e) {
        return [
            'started' => false,
            'exit_code' => -1,
            'stdout' => '',
            'stderr' => $e->getMessage(),
        ];
    }

    if (!is_resource($process)) {
        return [
            'started' => false,
            'exit_code' => -1,
            'stdout' => '',
            'stderr' => 'proc_open não conseguiu iniciar o processo.',
        ];
    }

    fclose($pipes[0]);

    stream_set_blocking($pipes[1], false);
    stream_set_blocking($pipes[2], false);

    $stdout = '';
    $stderr = '';
    $start = microtime(true);
    $timedOut = false;

    while (true) {
        $stdout .= stream_get_contents($pipes[1]);
        $stderr .= stream_get_contents($pipes[2]);

        $status = proc_get_status($process);
        if (!$status['running']) {
            break;
        }

        if ((microtime(true) - $start) > $timeoutSeconds) {
            $timedOut = true;
            proc_terminate($process);
            break;
        }

        usleep(50000);
    }

    $stdout .= stream_get_contents($pipes[1]);
    $stderr .= stream_get_contents($pipes[2]);

    fclose($pipes[1]);
    fclose($pipes[2]);

    $exit = proc_close($process);

    return [
        'started' => true,
        'exit_code' => $exit,
        'stdout' => trim($stdout),
        'stderr' => trim($stderr),
        'timed_out' => $timedOut,
    ];
}

function find_working_python(): array {
    global $OCR_TIMEOUT_SECONDS;

    $tests = [];

    foreach (ocr_python_candidates() as $candidate) {
        $cmd = array_merge($candidate, ['-c', 'import sys; print(sys.executable); print(sys.version)']);
        $r = run_process_array($cmd, min(15, $OCR_TIMEOUT_SECONDS));
        $tests[] = [
            'candidate' => $candidate,
            'result' => $r,
        ];

        if ($r['started'] && !$r['timed_out'] && $r['stdout'] !== '') {
            // On Windows proc_close can occasionally return -1 after proc_get_status;
            // stdout is enough for this lightweight probe.
            return [
                'ok' => true,
                'command' => $candidate,
                'probe' => $r,
                'tests' => $tests,
            ];
        }
    }

    return [
        'ok' => false,
        'command' => null,
        'probe' => null,
        'tests' => $tests,
    ];
}
