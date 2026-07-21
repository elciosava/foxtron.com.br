const editor = document.getElementById("editor");
        const highlight = document.getElementById("highlight");
        const saidaDiv = document.getElementById("saida");

        const JSBase_Nativo = {
            numero: (v) => Number(v),
            texto: (v) => String(v),
            booleano: (v) => Boolean(v)
        };

        function lerDoConsole(mensagem) {
            return new Promise((resolve) => {
                const span = document.createElement("span");
                span.className = "pergunta-msg";
                span.innerText = mensagem + " ";
                saidaDiv.appendChild(span);

                const input = document.createElement("input");
                input.className = "input-console";
                input.type = "text";
                saidaDiv.appendChild(input);
                input.focus();

                input.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") {
                        const valor = input.value;
                        input.remove();
                        const valorSpan = document.createElement("span");
                        valorSpan.innerText = valor + "\n";
                        saidaDiv.appendChild(valorSpan);
                        resolve(valor);
                    }
                });
            });
        }

        function transpilar(codigoJSBase) {
            let linhasBrutas = codigoJSBase.split('\n');
            let linhasProcessadas = [];

            for (let i = 0; i < linhasBrutas.length; i++) {
                let linha = linhasBrutas[i].trim();
                if (linha === "") continue;

                // Lógica de multilinhas: Se a linha termina com 'recebe' ou é uma declaração incompleta
                if (linha.toLowerCase().includes("recebe") && !linha.split(/recebe/i)[1].trim() && i + 1 < linhasBrutas.length) {
                    let proxima = linhasBrutas[i + 1].trim();
                    linhasProcessadas.push(linha + " " + proxima);
                    i++;
                } else {
                    linhasProcessadas.push(linha);
                }
            }

            let codigoJS = "";
            let pilhaBlocos = [];

            for (let i = 0; i < linhasProcessadas.length; i++) {
                let linha = linhasProcessadas[i];

                if (linha.startsWith("//")) {
                    codigoJS += linha + "\n";
                    continue;
                }

                // Validação de Blocos
                if (/^se\s+/i.test(linha)) {
                    pilhaBlocos.push({ tipo: "se", linha: i + 1 });
                } else if (/^enquanto\s+/i.test(linha)) {
                    pilhaBlocos.push({ tipo: "enquanto", linha: i + 1 });
                } else if (/^para\s+/i.test(linha)) {
                    pilhaBlocos.push({ tipo: "para", linha: i + 1 });
                } else if (/^inicio$/i.test(linha)) {
                    pilhaBlocos.push({ tipo: "inicio", linha: i + 1 });
                }

                if (/^fimse$/i.test(linha)) {
                    let topo = pilhaBlocos.pop();
                    if (!topo || topo.tipo !== "se") throw new Error(`Linha ${i + 1}: 'fimse' sem 'se' correspondente.`);
                } else if (/^fimenquanto$/i.test(linha)) {
                    let topo = pilhaBlocos.pop();
                    if (!topo || topo.tipo !== "enquanto") throw new Error(`Linha ${i + 1}: 'fimenquanto' sem 'enquanto' correspondente.`);
                } else if (/^fimpara$/i.test(linha)) {
                    let topo = pilhaBlocos.pop();
                    if (!topo || topo.tipo !== "para") throw new Error(`Linha ${i + 1}: 'fimpara' sem 'para' correspondente.`);
                } else if (/^fim$/i.test(linha)) {
                    let topo = pilhaBlocos.pop();
                    if (!topo || topo.tipo !== "inicio") throw new Error(`Linha ${i + 1}: 'fim' sem 'inicio' correspondente.`);
                }

                // Transpilação
                linha = linha.replace(/\bperguntar\s+(.+)$/gi, "await lerDoConsole($1)");

                // Variáveis de verdadeiro ou falso
                let varMatch = linha.match(/^(numero|texto|booleano)\s+(\w+)\s+recebe\s+(.+)$/i);
                if (varMatch) {
                    let valor = traduzirOperadores(varMatch[3]);
                    codigoJS += `let ${varMatch[2]} = ${valor};\n`;
                    continue;
                }

                let atribMatch = linha.match(/^(\w+)\s+recebe\s+(.+)$/i);
                if (atribMatch) {
                    let valor = traduzirOperadores(atribMatch[2]);
                    codigoJS += `${atribMatch[1]} = ${valor};\n`;
                    continue;
                }

                // Mostrar
                let mostrarMatch = linha.match(/^mostrar\s+(.+)$/i);
                if (mostrarMatch) {
                    let conteudo = mostrarMatch[1];
                    let partes = conteudo.split(/\s*,\s*/);
                    codigoJS += `console.log(${partes.join(", ")});\n`;
                    continue;
                }

                // Estruturas
                if (/^enquanto\s+/i.test(linha)) {
                    let cond = linha.match(/^enquanto\s+(.+)$/i)[1];
                    codigoJS += `while (${traduzirOperadores(cond)}) {\n`;
                    continue;
                }
                if (linha.toLowerCase() === "fimenquanto") {
                    codigoJS += "}\n";
                    continue;
                }

                if (/^para\s+/i.test(linha)) {
                    let match = linha.match(/^para\s*\((.+)\)$/i);
                    if (match) {
                        let conteudo = match[1];
                        let partes = conteudo.split(';');
                        let init = transpilarLinhaSimples(partes[0]);
                        let cond = traduzirOperadores(partes[1]);
                        let incr = transpilarLinhaSimples(partes[2]);
                        codigoJS += `for (${init.replace(';', '')}; ${cond}; ${incr.replace(';', '')}) {\n`;
                    }
                    continue;
                }
                if (linha.toLowerCase() === "fimpara") {
                    codigoJS += "}\n";
                    continue;
                }

                if (/^se\s+/i.test(linha)) {
                    let cond = linha.match(/^se\s+(.+)$/i)[1];
                    codigoJS += `if (${traduzirOperadores(cond)}) {\n`;
                    continue;
                }
                if (linha.toLowerCase() === "senão" || linha.toLowerCase() === "senao") {
                    codigoJS += "} else {\n";
                    continue;
                }
                if (linha.toLowerCase() === "fimse") {
                    codigoJS += "}\n";
                    continue;
                }

                if (linha.toLowerCase() === "inicio") {
                    codigoJS += "{\n";
                    continue;
                }
                if (linha.toLowerCase() === "fim") {
                    codigoJS += "}\n";
                    continue;
                }

                codigoJS += traduzirOperadores(linha) + "\n";
            }

            if (pilhaBlocos.length > 0) {
                let blocoAberto = pilhaBlocos[pilhaBlocos.length - 1];
                throw new Error(`Bloco '${blocoAberto.tipo}' iniciado na linha ${blocoAberto.linha} não foi fechado.`);
            }

            return codigoJS;
        }

        function transpilarLinhaSimples(linha) {
            linha = linha.trim();
            linha = linha.replace(/\bperguntar\s+(.+)$/gi, "await lerDoConsole($1)");
            let varMatch = linha.match(/^(numero|texto|booleano)\s+(\w+)\s+recebe\s+(.+)$/i);
            if (varMatch) return `let ${varMatch[2]} = ${traduzirOperadores(varMatch[3])};`;
            let atribMatch = linha.match(/^(\w+)\s+recebe\s+(.+)$/i);
            if (atribMatch) return `${atribMatch[1]} = ${traduzirOperadores(atribMatch[2])};`;
            return traduzirOperadores(linha);
        }

        function traduzirOperadores(texto) {
            return texto
                .replace(/\bverdadeiro\b/gi, "true")
                .replace(/\bfalso\b/gi, "false")
                .replace(/\bmaior ou igual\b/gi, ">=")
                .replace(/\bmenor ou igual\b/gi, "<=")
                .replace(/\bmaior que\b/gi, ">")
                .replace(/\bmenor que\b/gi, "<")
                .replace(/\bdiferente\b/gi, "!=")
                .replace(/\bigual\b/gi, "==")
                .replace(/\be\b/gi, "&&")
                .replace(/\bou\b/gi, "||");
        }

        async function executar() {
            saidaDiv.innerHTML = "";
            const codigoOriginal = editor.value;
            const originalLog = console.log;

            console.log = function (...args) {
                const span = document.createElement("span");
                span.innerText = args.map(a => typeof a === 'object' ? JSON.stringify(a) : a).join(" ") + "\n";
                saidaDiv.appendChild(span);
            };

            try {
                const codigoTraduzido = transpilar(codigoOriginal);
                const numero = JSBase_Nativo.numero;
                const texto = JSBase_Nativo.texto;
                const booleano = JSBase_Nativo.booleano;

                const asyncCodigo = `(async () => { ${codigoTraduzido} })()`;
                await eval(asyncCodigo);
            } catch (erro) {
                const erroSpan = document.createElement("span");
                erroSpan.className = "erro-msg";
                let linhaErro = "";
                if (erro.stack) {
                    const stackMatch = erro.stack.match(/<anonymous>:(\d+):/);
                    if (stackMatch) linhaErro = ` na linha ${stackMatch[1]}`;
                }
                if (erro.message.includes("Linha")) {
                    erroSpan.innerHTML = `Erro de Lógica: ${erro.message}`;
                } else {
                    erroSpan.innerHTML = `Erro${linhaErro}: ${erro.message}`;
                }
                saidaDiv.appendChild(erroSpan);
            }

            console.log = originalLog;
        }

        function updateHighlight() {
            let texto = editor.value;
            texto = texto.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");

            const combinedRegex = /(\/\/.*)|(["'](?:\\.|[^\\])*?["'])|(\b(?:inicio|fim|recebe|se|senao|senão|fimse|enquanto|fimenquanto|para|fimpara|mostrar|perguntar|numero|texto|booleano|verdadeiro|falso|maior ou igual|menor ou igual|maior que|menor que|igual|diferente|e|ou)\b)|(\b\d+\b)/gi;

            let result = texto.replace(combinedRegex, function (match, comentario, string, reservada, numero) {
                if (comentario) return `<span class="comentario">${match}</span>`;
                if (string) return `<span class="string">${match}</span>`;
                if (reservada) return `<span class="reservada">${match}</span>`;
                if (numero) return `<span class="numero">${match}</span>`;
                return match;
            });

            highlight.innerHTML = result + "\n";
        }

        editor.addEventListener("input", updateHighlight);
        editor.addEventListener("scroll", function () {
            highlight.scrollTop = editor.scrollTop;
            highlight.scrollLeft = editor.scrollLeft;
        });
        updateHighlight();