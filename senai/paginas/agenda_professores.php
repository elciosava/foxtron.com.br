<?php
include '../conexao/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda dos Professores - SENAI</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: #f3f6fc; font-family: 'Segoe UI', sans-serif; display: flex; flex-direction: column; align-items: center; }
        header { background: #1a2041; color: #fff; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap; gap: 10px; }
        header h2 { font-size: 18px; flex: 1; min-width: 200px; }
        header a { background: #fff; color: #1a2041; padding: 6px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 13px; }
        
        .container { width: 98%; max-width: 1400px; margin: 20px auto; padding: 0 10px; }
        .semana-controles { display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 20px; flex-wrap: wrap; }
        .semana-controles button { background: #1a2041; color: white; padding: 8px 15px; border-radius: 5px; border: none; cursor: pointer; font-weight: 600; font-size: 13px; }
        #semanaLabel { font-size: 16px; color: #1a2041; font-weight: 700; min-width: 200px; text-align: center; }

        /* ===== DESKTOP (>= 1024px) ===== */
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; }
        th { background: #1a2041; color: #fff; padding: 12px 8px; font-size: 13px; border: 1px solid #2d3a6b; }
        th.hoje { background: #2e7d32; }

        td.col-professor { background: #f8f9fd; font-weight: 700; font-size: 13px; color: #1a2041; text-align: center; padding: 10px; border-right: 2px solid #d1d9e6; border-bottom: 1px solid #eee; }
        td.col-turno { font-size: 11px; font-weight: 600; color: #666; text-align: center; background: #fafafa; border-right: 1px solid #eee; border-bottom: 1px solid #eee; }
        tr.linha-manha td { border-top: 2px solid #d1d9e6; }

        td.dia-cel { border: 1px solid #eee; vertical-align: top; padding: 0; min-width: 140px; height: 70px; position: relative; }
        td.hoje-col { background: #f0fff0; }
        
        .vazio { cursor: pointer; display: flex; align-items: center; justify-content: center; height: 100%; width: 100%; color: #ccc; font-size: 20px; transition: background 0.2s; }
        .vazio:hover { background: #f0f4ff; color: #1a2041; }

        /* BADGE ÚNICA POR TURNO */
        .aula-badge { width: 100%; height: 100%; padding: 6px; display: flex; flex-direction: column; justify-content: space-between; color: #fff; }
        .badge-top { display: flex; justify-content: space-between; align-items: flex-start; }
        .badge-sigla { font-size: 12px; font-weight: 800; line-height: 1.2; }
        .badge-modalidade { font-size: 9px; font-weight: 800; padding: 1px 4px; border-radius: 3px; background: rgba(0,0,0,0.2); }
        .badge-info { font-size: 10px; margin-top: 2px; opacity: 0.9; }
        .badge-obs { font-size: 9px; background: rgba(255,255,255,0.15); padding: 2px; border-radius: 2px; margin-top: 3px; }
        
        .badge-acoes { display: flex; gap: 4px; margin-top: 4px; justify-content: flex-end; }
        .badge-acoes button { background: rgba(255,255,255,0.2); border: none; border-radius: 3px; padding: 1px 4px; font-size: 10px; cursor: pointer; color: #fff; }
        .badge-acoes button:hover { background: rgba(255,255,255,0.4); }

        /* Cores */
        .tipo-FOLGA { background: #607d8b !important; }
        .tipo-AUSENTE { background: #d32f2f !important; }
        .tipo-SUBSTITUICAO { background: #f57c00 !important; }
        .tipo-AVA { background: #455a64 !important; }

        /* Modal */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000; padding: 20px; overflow-y: auto; }
        .modal-content { background: white; padding: 25px; width: 100%; max-width: 400px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .modal-content h3 { margin-bottom: 15px; color: #1a2041; font-size: 16px; }
        .form-group { margin-bottom: 12px; }
        .form-group label { display: block; font-size: 12px; font-weight: 700; color: #555; margin-bottom: 4px; }
        .form-group select, .form-group input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 13px; }
        .modal-acoes { display: flex; gap: 10px; margin-top: 20px; }
        .btn { flex: 1; padding: 10px; border: none; cursor: pointer; border-radius: 5px; font-weight: 700; font-size: 13px; }
        .btn-salvar { background: #1a2041; color: #fff; }
        .btn-cancelar { background: #eee; color: #333; }

        /* ===== TABLET (768px - 1023px) ===== */
        @media (max-width: 1023px) {
            header h2 { font-size: 16px; }
            header a { padding: 5px 12px; font-size: 12px; }
            
            #semanaLabel { font-size: 14px; min-width: 180px; }
            .semana-controles button { padding: 6px 12px; font-size: 12px; }
            
            table { font-size: 12px; }
            th { padding: 8px 4px; font-size: 11px; }
            
            td.col-professor { font-size: 12px; padding: 8px; }
            td.col-turno { font-size: 10px; }
            td.dia-cel { min-width: 100px; height: 60px; }
            
            .badge-sigla { font-size: 11px; }
            .badge-modalidade { font-size: 8px; padding: 0px 3px; }
            .badge-info { font-size: 9px; }
            .badge-obs { font-size: 8px; }
            .badge-acoes button { padding: 0px 3px; font-size: 9px; }
        }

        /* ===== MOBILE (<= 767px) ===== */
        @media (max-width: 767px) {
            body { padding: 0; }
            header { padding: 12px 15px; flex-direction: column; text-align: center; }
            header h2 { font-size: 16px; margin-bottom: 8px; width: 100%; }
            header a { padding: 5px 12px; font-size: 12px; }
            
            .container { width: 100%; margin: 15px auto; padding: 0 10px; }
            
            #semanaLabel { font-size: 13px; min-width: 100%; margin-bottom: 10px; }
            .semana-controles { gap: 10px; margin-bottom: 15px; }
            .semana-controles button { padding: 6px 12px; font-size: 12px; flex: 1; max-width: 100px; }
            
            /* OCULTAR TABELA NO MOBILE */
            table { display: none; }
            
            /* EXIBIR CARTÕES NO MOBILE */
            .mobile-cards { display: block; }
            
            .card-professor { background: white; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden; }
            .card-professor-header { background: #1a2041; color: white; padding: 12px 15px; font-weight: 700; font-size: 14px; }
            
            .card-turno { border-bottom: 1px solid #eee; padding: 0; }
            .card-turno:last-child { border-bottom: none; }
            
            .turno-label { background: #f5f5f5; padding: 8px 15px; font-weight: 600; font-size: 12px; color: #666; display: flex; justify-content: space-between; align-items: center; }
            .turno-dias { display: flex; flex-wrap: wrap; gap: 8px; padding: 10px 15px; }
            
            .dia-card { flex: 0 1 calc(50% - 4px); background: #f9f9f9; border: 1px solid #eee; border-radius: 6px; padding: 8px; min-height: 80px; position: relative; }
            .dia-card.hoje { background: #f0fff0; border-color: #2e7d32; }
            
            .dia-nome { font-size: 11px; font-weight: 700; color: #1a2041; margin-bottom: 4px; }
            .dia-data { font-size: 10px; color: #999; margin-bottom: 6px; }
            
            .aula-badge-mobile { width: 100%; padding: 6px; border-radius: 4px; color: white; display: flex; flex-direction: column; justify-content: space-between; min-height: 50px; }
            .badge-sigla-mobile { font-size: 11px; font-weight: 800; line-height: 1.2; }
            .badge-info-mobile { font-size: 9px; margin-top: 2px; opacity: 0.9; }
            .badge-modalidade-mobile { font-size: 8px; font-weight: 800; padding: 1px 3px; border-radius: 2px; background: rgba(0,0,0,0.2); display: inline-block; margin-top: 2px; }
            .badge-acoes-mobile { display: flex; gap: 3px; margin-top: 4px; }
            .badge-acoes-mobile button { background: rgba(255,255,255,0.2); border: none; border-radius: 2px; padding: 2px 4px; font-size: 9px; cursor: pointer; color: white; }
            .badge-acoes-mobile button:hover { background: rgba(255,255,255,0.4); }
            
            .dia-vazio { display: flex; align-items: center; justify-content: center; height: 50px; color: #ccc; font-size: 24px; cursor: pointer; transition: background 0.2s; }
            .dia-vazio:active { background: #f0f4ff; color: #1a2041; }
            
            .modal-content { width: 95%; max-width: 100%; }
            .modal-content h3 { font-size: 15px; }
            .form-group select, .form-group input { font-size: 14px; }
            .btn { padding: 12px; font-size: 14px; }
        }

        /* ===== EXTRA SMALL (<= 480px) ===== */
        @media (max-width: 480px) {
            header h2 { font-size: 14px; }
            header a { padding: 4px 10px; font-size: 11px; }
            
            #semanaLabel { font-size: 12px; }
            .semana-controles button { padding: 5px 10px; font-size: 11px; }
            
            .card-professor-header { font-size: 13px; padding: 10px 12px; }
            .turno-label { font-size: 11px; padding: 6px 12px; }
            .turno-dias { gap: 6px; padding: 8px 12px; }
            
            .dia-card { flex: 0 1 100%; }
            .dia-nome { font-size: 10px; }
            .dia-data { font-size: 9px; }
            .badge-sigla-mobile { font-size: 10px; }
            .badge-info-mobile { font-size: 8px; }
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
            <button id="btnAnterior">◀ Anterior</button>
            <h3 id="semanaLabel">Carregando...</h3>
            <button id="btnProxima">Próxima ▶</button>
        </div>

        <!-- TABELA DESKTOP -->
        <table id="tabelaDesktop">
            <thead>
                <tr id="theadDias">
                    <th style="width:160px;">Professor</th>
                    <th style="width:70px;">Turno</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                </tr>
            </thead>
            <tbody id="corpoAgenda"></tbody>
        </table>

        <!-- CARTÕES MOBILE -->
        <div id="cartoesMobile" class="mobile-cards" style="display: none;"></div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <h3 id="tituloModal">Novo Evento</h3>
            <div class="form-group">
                <label>Professor</label>
                <select id="professor" disabled></select>
            </div>
            <div class="form-group">
                <label>Curso</label>
                <select id="curso"></select>
            </div>
            <div class="form-group">
                <label>Unidade Curricular</label>
                <select id="uc"></select>
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <select id="tipoEvento">
                    <option value="AULA">Aula</option>
                    <option value="FOLGA">Folga</option>
                    <option value="AUSENTE">Ausente</option>
                    <option value="SUBSTITUICAO">Substituição</option>
                </select>
            </div>
            <div class="form-group">
                <label>Observação</label>
                <input id="observacao" placeholder="Opcional">
            </div>
            <div class="modal-acoes">
                <button class="btn btn-salvar" id="btnSalvar">Salvar</button>
                <button class="btn btn-cancelar" id="btnCancelar">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        let dataAtual = new Date();
        const DIAS_NOMES = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"];
        let isMobile = window.innerWidth <= 767;

        function getSegunda(d) {
            const data = new Date(d);
            const dia = data.getDay();
            const diff = data.getDate() - dia + (dia === 0 ? -6 : 1);
            return new Date(data.setDate(diff));
        }

        function formatarData(d) {
            return d.toISOString().split("T")[0];
        }

        function isHoje(d) {
            const hoje = new Date();
            return d.toDateString() === hoje.toDateString();
        }

        window.addEventListener('resize', () => {
            const novoIsMobile = window.innerWidth <= 767;
            if (novoIsMobile !== isMobile) {
                isMobile = novoIsMobile;
                carregarAgenda();
            }
        });

        async function carregarAgenda() {
            const segunda = getSegunda(dataAtual);
            const semanaInicio = formatarData(segunda);
            
            const sexta = new Date(segunda);
            sexta.setDate(segunda.getDate() + 4);
            document.getElementById("semanaLabel").innerText = segunda.toLocaleDateString("pt-BR") + " — " + sexta.toLocaleDateString("pt-BR");

            // Dados
            const [professores, eventos, aulas] = await Promise.all([
                fetch("../api/listar_professores.php").then(r => r.json()),
                fetch("../api/listar_eventos.php?semana_inicio=" + semanaInicio).then(r => r.json()).catch(() => []),
                fetch("../api/listar_aulas_oficiais.php?semana_inicio=" + semanaInicio).then(r => r.json()).catch(() => [])
            ]);

            const mapa = {};
            professores.forEach(p => {
                mapa[p.id] = { nome: p.nome, turnos: { "Manhã": {}, "Tarde": {}, "Noite": {} } };
            });

            // Aulas Oficiais
            aulas.forEach(a => {
                if (mapa[a.professor_id]) {
                    const turno = a.turno || "Manhã";
                    mapa[a.professor_id].turnos[turno][a.data] = {
                        tipo: (a.modalidade === 'AVA') ? 'AVA' : 'AULA',
                        modalidade: a.modalidade,
                        uc: a.uc_nome, sigla: a.sigla, curso: a.curso_nome,
                        hora: a.hora_inicio.substring(0,5) + " - " + a.hora_fim.substring(0,5),
                        cor: a.cor, oficial: true
                    };
                }
            });

            // Eventos Manuais
            eventos.forEach(ev => {
                if (mapa[ev.professor_id]) {
                    mapa[ev.professor_id].turnos[ev.turno][ev.data] = {
                        tipo: ev.tipo, uc: ev.uc_nome, sigla: ev.sigla, curso: ev.curso_nome,
                        cor: ev.cor, id: ev.id, oficial: false, obs: ev.observacao
                    };
                }
            });

            if (isMobile) {
                renderizarMobile(mapa, segunda);
            } else {
                renderizarDesktop(mapa, segunda);
            }
        }

        function renderizarDesktop(mapa, segunda) {
            document.getElementById("tabelaDesktop").style.display = "table";
            document.getElementById("cartoesMobile").style.display = "none";

            const thead = document.getElementById("theadDias");
            let thHtml = `<th>Professor</th><th>Turno</th>`;
            for(let i=0; i<5; i++) {
                const d = new Date(segunda);
                d.setDate(segunda.getDate() + i);
                const classeHoje = isHoje(d) ? ' class="hoje"' : '';
                thHtml += `<th${classeHoje}>${DIAS_NOMES[i]}<br><small>${d.getDate()}/${d.getMonth()+1}</small></th>`;
            }
            thead.innerHTML = thHtml;

            let html = "";
            Object.keys(mapa).forEach(profId => {
                const p = mapa[profId];
                ["Manhã", "Tarde", "Noite"].forEach(turno => {
                    html += `<tr${turno === "Manhã" ? ' class="linha-manha"' : ''}>`;
                    if (turno === "Manhã") html += `<td class="col-professor" rowspan="3">${p.nome}</td>`;
                    html += `<td class="col-turno">${turno}</td>`;

                    for(let i=0; i<5; i++) {
                        const d = new Date(segunda);
                        d.setDate(segunda.getDate() + i);
                        const dataChave = formatarData(d);
                        const item = p.turnos[turno][dataChave];
                        const tdClass = isHoje(d) ? 'dia-cel hoje-col' : 'dia-cel';

                        if (!item) {
                            html += `<td class="${tdClass}"><div class="vazio" onclick="abrirModal(${profId}, ${i}, '${turno}')">+</div></td>`;
                        } else {
                            const cor = item.tipo === 'AULA' ? (item.cor ? (item.cor.startsWith('#') ? item.cor : '#'+item.cor) : '#1a2041') : '';
                            const classeTipo = ` tipo-${item.tipo}`;
                            html += `<td class="${tdClass}">
                                <div class="aula-badge${classeTipo}" style="${cor ? 'background:'+cor : ''}">
                                    <div class="badge-top">
                                        <span class="badge-sigla">${item.sigla || item.uc || item.tipo}</span>
                                        ${item.modalidade && item.modalidade !== 'PRESENCIAL' ? `<span class="badge-modalidade">${item.modalidade}</span>` : ''}
                                    </div>
                                    <div class="badge-info">${item.hora || item.curso || ''}</div>
                                    ${item.obs ? `<div class="badge-obs">${item.obs}</div>` : ''}
                                    ${!item.oficial ? `<div class="badge-acoes"><button onclick="editar(${item.id})">✏️</button><button onclick="excluir(${item.id})">🗑️</button></div>` : ''}
                                </div>
                            </td>`;
                        }
                    }
                    html += "</tr>";
                });
            });
            document.getElementById("corpoAgenda").innerHTML = html;
        }

        function renderizarMobile(mapa, segunda) {
            document.getElementById("tabelaDesktop").style.display = "none";
            document.getElementById("cartoesMobile").style.display = "block";

            let html = "";
            Object.keys(mapa).forEach(profId => {
                const p = mapa[profId];
                html += `<div class="card-professor">
                    <div class="card-professor-header">${p.nome}</div>`;

                ["Manhã", "Tarde", "Noite"].forEach(turno => {
                    html += `<div class="card-turno">
                        <div class="turno-label">${turno}</div>
                        <div class="turno-dias">`;

                    for(let i=0; i<5; i++) {
                        const d = new Date(segunda);
                        d.setDate(segunda.getDate() + i);
                        const dataChave = formatarData(d);
                        const item = p.turnos[turno][dataChave];
                        const classeHoje = isHoje(d) ? ' hoje' : '';

                        html += `<div class="dia-card${classeHoje}">
                            <div class="dia-nome">${DIAS_NOMES[i]}</div>
                            <div class="dia-data">${d.getDate()}/${d.getMonth()+1}</div>`;

                        if (!item) {
                            html += `<div class="dia-vazio" onclick="abrirModal(${profId}, ${i}, '${turno}')">+</div>`;
                        } else {
                            const cor = item.tipo === 'AULA' ? (item.cor ? (item.cor.startsWith('#') ? item.cor : '#'+item.cor) : '#1a2041') : '';
                            const classeTipo = ` tipo-${item.tipo}`;
                            html += `<div class="aula-badge-mobile${classeTipo}" style="${cor ? 'background:'+cor : ''}">
                                <span class="badge-sigla-mobile">${item.sigla || item.uc || item.tipo}</span>
                                ${item.modalidade && item.modalidade !== 'PRESENCIAL' ? `<span class="badge-modalidade-mobile">${item.modalidade}</span>` : ''}
                                <div class="badge-info-mobile">${item.hora || ''}</div>
                                ${!item.oficial ? `<div class="badge-acoes-mobile"><button onclick="editar(${item.id})">✏️</button><button onclick="excluir(${item.id})">🗑️</button></div>` : ''}
                            </div>`;
                        }

                        html += `</div>`;
                    }

                    html += `</div></div>`;
                });

                html += `</div>`;
            });
            document.getElementById("cartoesMobile").innerHTML = html;
        }

        let modalData = { profId: null, diaIndex: null, turno: null, editId: null, dataFixa: null };

        async function abrirModal(pId, dIdx, turno) {
            modalData = { profId: pId, diaIndex: dIdx, turno: turno, editId: null, dataFixa: null };
            document.getElementById("tituloModal").innerText = "Novo Evento - " + turno;
            document.getElementById("modal").style.display = "flex";
            await carregarListas();
        }

        document.getElementById("btnCancelar").onclick = () => document.getElementById("modal").style.display = "none";

        async function carregarListas() {
            const [profs, cursos] = await Promise.all([
                fetch("../api/listar_professores.php").then(r => r.json()),
                fetch("../api/listar_cursos.php").then(r => r.json())
            ]);
            document.getElementById("professor").innerHTML = profs.map(p => `<option value="${p.id}" ${p.id == modalData.profId ? "selected" : ""}>${p.nome}</option>`).join("");
            document.getElementById("curso").innerHTML = "<option value=''>Selecione o Curso</option>" + cursos.map(c => `<option value="${c.id}">${c.nome}</option>`).join("");
            document.getElementById("curso").onchange = async () => {
                const cId = document.getElementById("curso").value;
                if (!cId) return document.getElementById("uc").innerHTML = "<option value=''>Selecione o curso</option>";
                const ucs = await fetch("../api/listar_uc_por_curso.php?curso_id=" + cId).then(r => r.json());
                document.getElementById("uc").innerHTML = "<option value=''>Selecione a UC</option>" + ucs.map(u => `<option value="${u.id}">${u.nome}</option>`).join("");
            };
        }

        document.getElementById("btnSalvar").onclick = async () => {
            let dataEnv;
            if (modalData.editId) {
                dataEnv = modalData.dataFixa;
            } else {
                const seg = getSegunda(dataAtual);
                const dFinal = new Date(seg);
                dFinal.setDate(seg.getDate() + modalData.diaIndex);
                dataEnv = formatarData(dFinal);
            }

            const payload = {
                id: modalData.editId,
                professor_id: document.getElementById("professor").value,
                curso_id: document.getElementById("curso").value || null,
                uc_id: document.getElementById("uc").value || null,
                tipo: document.getElementById("tipoEvento").value,
                observacao: document.getElementById("observacao").value,
                data: dataEnv,
                turno: modalData.turno
            };

            const res = await fetch("../api/salvar_evento.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(payload)
            });

            if ((await res.json()).status === "ok") {
                document.getElementById("modal").style.display = "none";
                carregarAgenda();
            } else {
                alert("Erro ao salvar.");
            }
        };

        async function editar(id) {
            const ev = await fetch("../api/obter_evento.php?id=" + id).then(r => r.json());
            modalData = { profId: ev.professor_id, diaIndex: null, turno: ev.turno, editId: id, dataFixa: ev.data };
            document.getElementById("tituloModal").innerText = "Editar Evento";
            document.getElementById("modal").style.display = "flex";
            await carregarListas();
            document.getElementById("curso").value = ev.curso_id;
            document.getElementById("tipoEvento").value = ev.tipo;
            document.getElementById("observacao").value = ev.observacao || "";
            if (ev.curso_id) {
                const ucs = await fetch("../api/listar_uc_por_curso.php?curso_id=" + ev.curso_id).then(r => r.json());
                document.getElementById("uc").innerHTML = "<option value=''>Selecione</option>" + ucs.map(u => `<option value="${u.id}" ${u.id == ev.uc_id ? "selected" : ""}>${u.nome}</option>`);
            }
        }

        async function excluir(id) {
            if (confirm("Excluir este evento?")) {
                await fetch("../api/excluir_evento.php", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ id }) });
                carregarAgenda();
            }
        }

        document.getElementById("btnAnterior").onclick = () => { dataAtual.setDate(dataAtual.getDate() - 7); carregarAgenda(); };
        document.getElementById("btnProxima").onclick = () => { dataAtual.setDate(dataAtual.getDate() + 7); carregarAgenda(); };

        carregarAgenda();
    </script>
</body>
</html>
