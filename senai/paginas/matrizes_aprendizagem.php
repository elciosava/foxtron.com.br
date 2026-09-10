<?php
require '../conexao/conexao.php';
require '../conexao/matrizes_aprendizagem.php';
garantirEstruturaMatrizesAprendizagem($conexao);

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    try {
        if ($acao === 'salvar_uc') {
            $id = (int)($_POST['id'] ?? 0);
            $stmt = $conexao->prepare("UPDATE matriz_aprendizagem_ucs SET sigla=:sigla,nome=:nome,carga_horaria=:carga,cor=:cor,ordem=:ordem,eh_entrada=:entrada WHERE id=:id");
            $stmt->execute([
                ':sigla'=>trim($_POST['sigla'] ?? ''), ':nome'=>trim($_POST['nome'] ?? ''),
                ':carga'=>(float)($_POST['carga_horaria'] ?? 0), ':cor'=>trim($_POST['cor'] ?? '') ?: null,
                ':ordem'=>(int)($_POST['ordem'] ?? 0), ':entrada'=>isset($_POST['eh_entrada'])?1:0, ':id'=>$id
            ]);
            $msg = 'UC atualizada.';
        } elseif ($acao === 'adicionar_uc') {
            $matrizId=(int)($_POST['matriz_id']??0);
            $stmt=$conexao->prepare("INSERT INTO matriz_aprendizagem_ucs (matriz_id,sigla,nome,carga_horaria,cor,ordem,eh_entrada) VALUES (:m,:s,:n,:c,:cor,:o,:e)");
            $stmt->execute([':m'=>$matrizId,':s'=>trim($_POST['sigla']??''),':n'=>trim($_POST['nome']??''),':c'=>(float)($_POST['carga_horaria']??0),':cor'=>trim($_POST['cor']??'')?:null,':o'=>(int)($_POST['ordem']??0),':e'=>isset($_POST['eh_entrada'])?1:0]);
            $msg='UC adicionada.';
        } elseif ($acao === 'excluir_uc') {
            $stmt=$conexao->prepare("DELETE FROM matriz_aprendizagem_ucs WHERE id=:id");
            $stmt->execute([':id'=>(int)($_POST['id']??0)]);
            $msg='UC removida.';
        }
    } catch (Throwable $e) { $msg='Erro: '.$e->getMessage(); }
}
$matrizes=$conexao->query("SELECT * FROM matrizes_aprendizagem WHERE ativo=1 ORDER BY FIELD(perfil,'ADM','PROD'),id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><title>Matrizes de Aprendizagem</title>
<style>
body{font-family:Arial,sans-serif;background:#f3f6fc;margin:0;color:#20243a}header{background:#1a2041;color:#fff;padding:15px 20px}.container{max-width:1250px;margin:20px auto;background:#fff;padding:22px 26px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,.1)}.btn,button{display:inline-block;padding:8px 12px;background:#1a2041;color:#fff;border:0;border-radius:5px;text-decoration:none;cursor:pointer;font-weight:bold}.msg{padding:10px;background:#eef8ee;border:1px solid #a8d5a8;border-radius:6px;margin:12px 0}.info{padding:12px;background:#f4f7ff;border-left:4px solid #1a2041;margin:14px 0;line-height:1.5}table{width:100%;border-collapse:collapse;margin:12px 0 28px}th,td{border:1px solid #ddd;padding:7px;font-size:12px}th{background:#eef1f8;text-align:left}input{width:100%;box-sizing:border-box;padding:6px;border:1px solid #bbb;border-radius:4px}.entrada{background:#fff6d8}.regular{background:#fff}.small{font-size:11px;color:#555}.add{display:grid;grid-template-columns:90px 1fr 100px 110px 80px 120px;gap:8px;align-items:end;margin-bottom:28px}.add label{font-size:11px;font-weight:bold;display:block;margin-bottom:3px}
</style></head><body><header><h1>Matrizes de Aprendizagem</h1></header><div class="container">
<a class="btn" href="cursos.php">← Cursos</a> <a class="btn" href="entrada_aprendizagem.php">Módulo de Entrada</a>
<div class="info"><strong>Como funciona:</strong> estas matrizes existem mesmo em uma instalação vazia. As 3 UCs marcadas como <strong>Entrada</strong> são usadas somente nas três semanas iniciais. Ao cadastrar uma turma principal ADM ou PROD, o sistema copia automaticamente as demais UCs regulares.</div>
<?php if($msg):?><div class="msg"><?=htmlspecialchars($msg)?></div><?php endif;?>
<?php foreach($matrizes as $m):
$stmt=$conexao->prepare("SELECT * FROM matriz_aprendizagem_ucs WHERE matriz_id=:id ORDER BY ordem,id");$stmt->execute([':id'=>$m['id']]);$ucs=$stmt->fetchAll(PDO::FETCH_ASSOC);?>
<h2><?=htmlspecialchars($m['perfil'].' — '.$m['nome'])?></h2>
<table><tr><th>Ordem</th><th>Sigla</th><th>UC</th><th>CH</th><th>Cor</th><th>Entrada?</th><th>Ações</th></tr>
<?php foreach($ucs as $uc):?><tr class="<?=$uc['eh_entrada']?'entrada':'regular'?>"><form method="post">
<input type="hidden" name="acao" value="salvar_uc"><input type="hidden" name="id" value="<?=$uc['id']?>">
<td><input name="ordem" type="number" value="<?=$uc['ordem']?>"></td><td><input name="sigla" value="<?=htmlspecialchars($uc['sigla']??'')?>"></td><td><input name="nome" value="<?=htmlspecialchars($uc['nome'])?>"></td><td><input name="carga_horaria" type="number" step="0.25" value="<?=$uc['carga_horaria']?>"></td><td><input name="cor" value="<?=htmlspecialchars($uc['cor']??'')?>"></td><td style="text-align:center"><input style="width:auto" type="checkbox" name="eh_entrada" <?=$uc['eh_entrada']?'checked':''?>></td><td><button>Salvar</button></form> <form method="post" style="display:inline" onsubmit="return confirm('Remover esta UC da matriz?')"><input type="hidden" name="acao" value="excluir_uc"><input type="hidden" name="id" value="<?=$uc['id']?>"><button>Excluir</button></form></td></tr><?php endforeach;?></table>
<form method="post" class="add"><input type="hidden" name="acao" value="adicionar_uc"><input type="hidden" name="matriz_id" value="<?=$m['id']?>">
<div><label>Sigla</label><input name="sigla"></div><div><label>Nome da nova UC</label><input name="nome" required></div><div><label>Carga (h)</label><input type="number" step="0.25" name="carga_horaria" required></div><div><label>Cor</label><input name="cor" placeholder="#1a2041"></div><div><label>Ordem</label><input type="number" name="ordem" required></div><div><label><input style="width:auto" type="checkbox" name="eh_entrada"> Entrada</label><button style="margin-top:4px">Adicionar UC</button></div></form>
<?php endforeach;?>
<p class="small">As matrizes iniciais foram montadas a partir das UCs que já existiam no backup do sistema. Você pode alterar nome, sigla, carga horária e ordem aqui.</p>
</div></body></html>
