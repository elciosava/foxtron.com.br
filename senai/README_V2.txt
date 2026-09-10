SENAI CALENDÁRIO - REVISÃO V2 (Etapa 1)
========================================

Objetivo desta revisão:
- corrigir o fluxo de Aprendizagem;
- separar módulo de entrada da turma regular;
- preservar a integração com a turma principal;
- corrigir falhas críticas já encontradas no gerador.

REGRA IMPLEMENTADA PARA MÓDULO DE ENTRADA
------------------------------------------
1. A turma de entrada fica vinculada a uma turma principal (curso_base_id).
2. São buscadas especificamente estas 3 UCs, e não mais "as 3 primeiras":
   - FCI - Fundamentos da Comunicação e Informação
   - RCE/RSP - Relações Sócio Profissionais, Cidadania e Ética
   - SST - Saúde e Segurança do Trabalho
3. Durante o módulo de entrada as aulas ocorrem de SEG a SEX.
4. As UCs são executadas em sequência, sem a semana de apuração entre elas.
5. Ao terminar as UCs, o sistema procura a próxima UC da turma principal que ainda vai começar.
6. Até a véspera dessa UC, a turma de entrada fica marcada como IND (empresa).
7. O dia de início dessa UC fica salvo como data_integracao.

TURMA REGULAR DE APRENDIZAGEM
-----------------------------
- APR-ADM...: escola SEG/TER; UC nova começa em SEG.
- APR-PRO... ou APR-PROD...: escola QUA/QUI/SEX; UC nova começa em QUA.
- Foi mantida, por enquanto, a regra já existente de 7 dias de empresa/apuração entre UCs regulares.

CORREÇÕES TÉCNICAS
------------------
- Corrigido reconhecimento APR-PROD-TRILHA.
- Código APR-* também identifica Aprendizagem em cadastros antigos.
- Turma de entrada agora grava tipo=Aprendizagem.
- Professores das 3 UCs são herdados da turma-base e podem ser alterados depois.
- Corrigido cálculo de horas decimais usando minutos.
- Corrigida detecção de sobreposição de horários.
- Conflito de sala ignora sala NULL.
- IND/AVA não geram conflito de professor.
- Corrigida precedência de POST no painel do coordenador.
- Criada a estrutura de exceções de calendário que faltava nos dumps antigos.

BANCO
-----
O sistema tenta adicionar automaticamente as colunas V2 ao usar a Aprendizagem:
- curso_base_id
- fase_aprendizagem
- data_integracao
- uc_integracao_id

Migração manual opcional:
  bck/migracao_v2_aprendizagem.sql

TESTE RECOMENDADO
-----------------
1. Faça backup do banco atual.
2. Abra "Módulo de Entrada - Aprendizagem".
3. Selecione uma turma principal com calendário já gerado.
4. Clique em "Pré-visualizar integração".
5. Confirme o término das 3 UCs e a próxima UC da turma principal.
6. Crie a turma de entrada.
7. Confira no calendário as 3 UCs, a fase empresa e a data/UC de integração.

Se o professor herdado estiver ocupado no mesmo horário, o gerador bloqueia o conflito.
Nesse caso, altere o professor da UC da turma de entrada em "Gerenciar UCs" e gere novamente.

V3 - MATRIZES PADRAO DE APRENDIZAGEM
------------------------------------
- Nova tela: paginas/matrizes_aprendizagem.php
- Matrizes ADM e PROD sao criadas/semeadas automaticamente na primeira abertura.
- As 3 UCs marcadas como Entrada (FCI, RCE/RSP, SST) nao sao copiadas para a turma principal.
- Ao cadastrar um curso do tipo Aprendizagem, selecione ADM ou PROD. As UCs regulares sao copiadas automaticamente.
- Professores das UCs regulares devem ser definidos na tela de UCs antes de gerar o calendario.
- No Modulo de Entrada, os professores das 3 UCs iniciais sao escolhidos no proprio formulario.
- A turma de entrada busca FCI/RCE/SST diretamente da matriz padrao, portanto funciona mesmo numa instalacao sem turmas antigas.
