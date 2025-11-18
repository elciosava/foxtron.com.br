<?php
include '../conexao/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Agenda dos Professores - SENAI</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #f3f6fc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        header {
            background: #1a2041;
            color: #fff;
            padding: 20px 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
        }

        header a {
            background: #fff;
            color: #1a2041;
            padding: 7px 15px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .semana-controles {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .semana-controles button {
            background: #1a2041;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .container {
            width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }

        th {
            background: #1a2041;
            color: #fff;
            padding: 10px;
        }

        td {
            border: 1px solid #ccc;
            height: 40px;
            text-align: center;
            padding: 0;
            /* 🔹 sem padding pra cor pegar a célula toda */
            font-size: 13px;
            font-weight: bold;
        }

        td.vazio {
            cursor: pointer;
            background: #f7f7f7;
            color: #777;
        }

        .evento {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            padding: 4px;
            border-radius: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .evento .titulo {
            font-size: 11px;
            margin-bottom: 2px;
        }

        .evento .acoes {
            margin-top: 2px;
            display: flex;
            gap: 4px;
        }

        .evento .acoes button {
            background: rgba(255, 255, 255, 0.25);
            border: none;
            border-radius: 3px;
            padding: 1px 4px;
            font-size: 11px;
            cursor: pointer;
            color: #fff;
        }

        .evento .acoes button:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 25px;
            width: 400px;
            border-radius: 8px;
        }

        .modal-content h3 {
            margin-top: 0;
        }

        .modal-content select,
        .modal-content input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }

        .btn {
            background: #1a2041;
            color: #fff;
            padding: 7px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .cancelar {
            background: #b30000;
        }
    </style>
</head>

<body>

    <header>
        <h2>Agenda dos Professores</h2>
        <a href="../index.php">Voltar</a>
    </header>

    <div class="container">

        <div class="semana-controles">
            <button id="btnAnterior">◀ Semana anterior</button>
            <h3 id="semanaLabel">Carregando...</h3>
            <button id="btnProxima">Semana seguinte ▶</button>
        </div>

        <table id="tabelaAgenda">
            <thead>
                <tr id="theadDias">
                    <th>Professor</th>
                    <th>Turno</th>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sab</th>
                    <th>Dom</th>
                </tr>
            </thead>
            <tbody id="corpoAgenda"></tbody>
        </table>

    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h3 id="tituloModal">Novo evento</h3>

            <label>Professor</label>
            <select id="professor"></select>

            <label>Curso</label>
            <select id="curso"></select>

            <label>Unidade Curricular</label>
            <select id="uc"></select>

            <label>Tipo do Evento</label>
            <select id="tipoEvento">
                <option value="AULA">Aula</option>
                <option value="FOLGA">Folga</option>
                <option value="AUSENTE">Ausente</option>
                <option value="SUBSTITUICAO">Substituição</option>
            </select>

            <label>Observação</label>
            <input id="observacao" placeholder="Opcional">

            <br><br>
            <button class="btn" id="btnSalvar">Salvar</button>
            <button class="btn cancelar" id="btnCancelar">Cancelar</button>
        </div>
    </div>


    <script>
        // ================================
        //  CONTROLE DE SEMANAS
        // ================================
        let dataAtual = new Date();

        function getSegunda(d) {
            const data = new Date(d);
            const dia = data.getDay();
            const diff = data.getDate() - dia + (dia === 0 ? -6 : 1);
            return new Date(data.setDate(diff));
        }

        function formatarData(d) {
            return d.toISOString().split("T")[0];
        }

        function atualizarLabelSemana() {
            const segunda = getSegunda(dataAtual);
            const domingo = new Date(segunda);
            domingo.setDate(segunda.getDate() + 6);

            document.getElementById("semanaLabel").innerText =
                segunda.toLocaleDateString("pt-BR") +
                " até " +
                domingo.toLocaleDateString("pt-BR");
        }

        // ================================
        //  CARREGAR TABELA (COM 3 TURNOS)
        // ================================
        async function carregarAgenda() {
            const segunda = getSegunda(dataAtual);
            const semanaInicio = formatarData(segunda);

            atualizarLabelSemana();

            const diasSemana = ["Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"];

            // Monta cabeçalho com dia + data
            const thead = document.getElementById("theadDias");
            let thHtml = `
            <th style="width: 140px;">Professor</th>
            <th>Turno</th>
        `;

            diasSemana.forEach((sigla, idx) => {
                const d = new Date(segunda);
                d.setDate(segunda.getDate() + idx);

                const dia = String(d.getDate()).padStart(2, "0");
                const mes = String(d.getMonth() + 1).padStart(2, "0");

                thHtml += `<th>${sigla} ${dia}/${mes}</th>`;
            });

            thead.innerHTML = thHtml;

            // Busca professores
            const professores = await fetch("../api/listar_professores.php").then(r => r.json());

            // Eventos manuais
            let eventos = [];
            try {
                eventos = await fetch("../api/listar_aulas.php?semana_inicio=" + semanaInicio).then(r => r.json());
            } catch (e) {
                console.warn("Não foi possível carregar eventos manuais:", e);
            }

            // Aulas oficiais
            let aulasOficiais = [];
            try {
                aulasOficiais = await fetch("../api/listar_aulas_oficiais.php?semana_inicio=" + semanaInicio)
                    .then(r => r.json());
            } catch (e) {
                console.warn("Não foi possível carregar aulas oficiais:", e);
            }

            console.log("🧑‍🏫 Professores:", professores);
            console.log("📘 Aulas oficiais:", aulasOficiais);
            console.log("✏️ Eventos manuais:", eventos);

            // professor → { nome, turnos: { Manhã:{}, Tarde:{}, Noite:{} } }
            const mapa = {};

            professores.forEach(p => {
                mapa[p.id] = {
                    nome: p.nome,
                    turnos: {
                        "Manhã": {},
                        "Tarde": {},
                        "Noite": {}
                    }
                };
            });

            // Preenche com aulas oficiais
            aulasOficiais.forEach(a => {
                if (!mapa[a.professor_id]) return;

                if (!mapa[a.professor_id].turnos[a.turno]) {
                    mapa[a.professor_id].turnos[a.turno] = {};
                }

                mapa[a.professor_id].turnos[a.turno][a.dia_semana] = {
                    tipo: "AULA",
                    uc: a.uc_nome,
                    sigla: a.sigla,
                    cor: a.cor || "#1a2041",
                    oficial: true
                };
            });

            // Sobrescreve com eventos manuais
            eventos.forEach(ev => {
                const prof = mapa[ev.professor_id];
                if (!prof) return;

                if (!prof.turnos[ev.turno]) {
                    prof.turnos[ev.turno] = {};
                }

                prof.turnos[ev.turno][ev.dia_semana] = {
                    tipo: ev.tipo,
                    uc: ev.uc_nome,
                    sigla: ev.sigla,
                    cor: ev.cor || "#555",
                    id: ev.id,
                    oficial: false
                };
            });

            // Monta linhas
            let html = "";

            Object.keys(mapa).forEach(profId => {
                const p = mapa[profId];

                ["Manhã", "Tarde", "Noite"].forEach(turno => {
                    html += "<tr>";

                    if (turno === "Manhã") {
                        html += `<td rowspan="3">${p.nome}</td>`;
                    }

                    html += `<td>${turno}</td>`;

                    diasSemana.forEach(dia => {
                        const item = p.turnos[turno][dia];

                        if (!item) {
                            html += `<td class="vazio" onclick="abrirModal(${profId}, '${dia}', '${turno}')">+</td>`;
                        } else {
                            const label = item.sigla || item.uc || item.tipo || "";

                            const acoes = item.oficial
                                ? ""
                                : `<button type="button" onclick="editar(${item.id})" title="Editar">✏️</button>
                               <button type="button" onclick="excluir(${item.id})" title="Excluir">🗑️</button>`;

                            html += `
                            <td style="background:${item.cor || '#1a2041'}; color:#fff;">
                                <div class="evento">
                                    <div class="titulo">${label}</div>
                                    <div class="acoes">
                                        ${acoes}
                                    </div>
                                </div>
                            </td>
                        `;
                        }
                    });

                    html += "</tr>";
                });
            });

            document.getElementById("corpoAgenda").innerHTML = html;
        }

        // ================================
        // MODAL
        // ================================
        let diaSelecionado = null;
        let profSelecionado = null;
        let turnoSelecionado = null;
        let editandoId = null;

        async function abrirModal(profId, dia, turno) {
            editandoId = null;
            diaSelecionado = dia;
            profSelecionado = profId;
            turnoSelecionado = turno;

            document.getElementById("tituloModal").innerText = "Novo evento";
            document.getElementById("modal").style.display = "flex";

            await carregarListas();
        }

        document.getElementById("btnCancelar").onclick = () => {
            document.getElementById("modal").style.display = "none";
        };

        async function carregarListas() {
            // Professores
            const profs = await fetch("../api/listar_professores.php").then(r => r.json());
            document.getElementById("professor").innerHTML =
                profs.map(p => `<option value="${p.id}" ${p.id == profSelecionado ? "selected" : ""}>${p.nome}</option>`).join("");

            // Cursos
            const cursos = await fetch("../api/listar_cursos.php").then(r => r.json());
            document.getElementById("curso").innerHTML =
                "<option value=''>Selecione</option>" +
                cursos.map(c => `<option value="${c.id}">${c.nome}</option>`).join("");

            // UCs por curso
            document.getElementById("curso").onchange = async () => {
                const curso = document.getElementById("curso").value;
                if (!curso) {
                    document.getElementById("uc").innerHTML = "<option value=''>Selecione o curso</option>";
                    return;
                }

                const ucs = await fetch("../api/listar_uc_por_curso.php?curso_id=" + curso).then(r => r.json());
                document.getElementById("uc").innerHTML =
                    "<option value=''>Selecione</option>" +
                    ucs.map(u => `<option value="${u.id}">${u.nome}</option>`).join("");
            };
        }

        // ================================
        // SALVAR
        // ================================
        document.getElementById("btnSalvar").onclick = async () => {
            const segunda = getSegunda(dataAtual);
            const index = ["Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"].indexOf(diaSelecionado);
            const dataFinal = new Date(segunda);
            dataFinal.setDate(segunda.getDate() + index);

            const payload = {
                id: editandoId,
                professor_id: document.getElementById("professor").value,
                curso_id: document.getElementById("curso").value || null,
                uc_id: document.getElementById("uc").value || null,
                tipo: document.getElementById("tipoEvento").value,
                substituto_id: null,
                observacao: document.getElementById("observacao").value,
                data: formatarData(dataFinal),
                turno: turnoSelecionado
            };

            await fetch("../api/salvar_evento.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(payload)
            });

            document.getElementById("modal").style.display = "none";
            carregarAgenda();
        };

        // ================================
        // EDITAR EVENTO
        // ================================
        async function editar(id) {
            const ev = await fetch("../api/obter_evento.php?id=" + id).then(r => r.json());

            editandoId = id;
            diaSelecionado = ev.dia_semana;
            turnoSelecionado = ev.turno;

            document.getElementById("tituloModal").innerText = "Editar evento";
            document.getElementById("modal").style.display = "flex";

            profSelecionado = ev.professor_id;
            await carregarListas();

            document.getElementById("curso").value = ev.curso_id;
            document.getElementById("tipoEvento").value = ev.tipo;
            document.getElementById("observacao").value = ev.observacao || "";

            if (ev.curso_id) {
                const ucs = await fetch("../api/listar_uc_por_curso.php?curso_id=" + ev.curso_id).then(r => r.json());
                document.getElementById("uc").innerHTML =
                    "<option value=''>Selecione</option>" +
                    ucs.map(u => `<option value="${u.id}" ${u.id == ev.uc_id ? "selected" : ""}>${u.nome}</option>`).join("");
            }
        }

        // ================================
        // EXCLUIR
        // ================================
        async function excluir(id) {
            if (!confirm("Deseja excluir este evento?")) return;

            await fetch("../api/excluir_evento.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id })
            });

            carregarAgenda();
        }

        // ================================
        // INIT
        // ================================
        document.getElementById("btnAnterior").onclick = () => {
            dataAtual.setDate(dataAtual.getDate() - 7);
            carregarAgenda();
        };

        document.getElementById("btnProxima").onclick = () => {
            dataAtual.setDate(dataAtual.getDate() + 7);
            carregarAgenda();
        };

        carregarAgenda();
    </script>

</body>

</html>