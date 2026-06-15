# Planejamento de Modernização - CodSpace

## 1. Identidade Visual
*   **Cores**: Manter a base escura mas com tons mais profundos e gradientes suaves.
    *   Fundo: `#0f172a` (Slate 900)
    *   Destaque 1: `#38bdf8` (Sky 400)
    *   Destaque 2: `#818cf8` (Indigo 400)
    *   Texto Primário: `#f8fafc`
    *   Texto Secundário: `#94a3b8`
*   **Tipografia**: Utilizar fontes modernas sem serifa (ex: 'Inter', system-ui).
*   **Estilo**: Glassmorphism (efeito de vidro), bordas arredondadas (8px a 12px), sombras suaves.

## 2. Melhorias de UX
*   **Login/Cadastro**: Transformar em um card centralizado com transições suaves entre as abas.
*   **Dashboard Aluno**:
    *   Substituir o layout de "seção sobre seção" por um layout de grid.
    *   Melhorar o upload de arquivos com drag-and-drop visual.
    *   Refinar a exibição do iframe do perfil.
*   **Dashboard Professor**:
    *   Transformar a lista de alunos em cards modernos com fotos circulares e status.
    *   Adicionar busca rápida de alunos.
*   **Notificações**: Implementar um sistema de "Toasts" em JS puro para feedbacks de sucesso/erro.

## 3. Arquitetura de Front-end
*   **CSS Único**: Unificar `pc.css` e `mobile.css` em um `style.css` altamente responsivo.
*   **Componentização**: Criar classes CSS para botões, inputs e cards que sejam consistentes em todo o sistema.
*   **JavaScript**: Centralizar lógicas de UI em um `app.js`.

## 4. Mudanças Técnicas
*   Remover estilos inline.
*   Melhorar a acessibilidade (labels corretas, contrastes).
*   Manter a compatibilidade com o backend PHP existente.
