# JSBase Official Website - Design Strategy

## Design Philosophy: VS Code-Inspired Developer Experience

A linguagem JSBase merece um site que reflita sua natureza como uma **ferramenta profissional de aprendizado**. Inspirado no VS Code, o design prioriza:

- **Clareza e Funcionalidade**: Interface limpa, sem distrações
- **Acessibilidade para Iniciantes**: Código em português em destaque, com transições suaves para JavaScript
- **Profissionalismo Técnico**: Tema escuro sofisticado com acentos de cor bem definidos
- **Interatividade Imediata**: Playground integrado permite experimentar sem deixar a página

---

## Design Movement

**Modern Developer Tooling Aesthetic** — Inspirado em IDEs e editores modernos (VS Code, JetBrains), mas acessível a iniciantes. Combina a seriedade técnica com a calidez educacional.

---

## Core Principles

1. **Transparência Técnica**: Mostrar o "antes e depois" (JSBase → JavaScript) em todas as páginas, desmistificando a transpilação
2. **Hierarquia Clara**: Navegação intuitiva com menu lateral na documentação, permitindo exploração não-linear
3. **Playground Ubíquo**: Exemplos de código devem ser executáveis, não apenas legíveis
4. **Minimalismo Funcional**: Sem decoração desnecessária; cada elemento serve um propósito

---

## Color Philosophy

Paleta inspirada no VS Code com ajustes para acessibilidade:

| Cor | Hex | Uso |
|-----|-----|-----|
| **Fundo Escuro** | `#1E1E1E` | Background principal |
| **Azul Primário** | `#4FC1FF` | CTAs, destaques, links |
| **Laranja** | `#CE9178` | Strings, valores de texto |
| **Verde** | `#6A9955` | Palavras-chave, comentários |
| **Branco** | `#D4D4D4` | Texto principal |
| **Cinza Secundário** | `#858585` | Texto secundário, borders |

**Intenção Emocional**: Profissional, confiável, amigável. O escuro reduz fadiga ocular; o azul transmite confiança técnica; o laranja e verde trazem calor sem perder foco.

---

## Layout Paradigm

**Assimétrico com Sidebar Fixa** — Diferente de grids centralizados:

- **Página Inicial**: Hero com código JSBase/JavaScript lado a lado, CTA destacada
- **Documentação**: Sidebar esquerda (menu) + conteúdo direita (70/30 split)
- **Playground**: Editor esquerda + saída direita + código transpilado em abas
- **Download**: Seção simples com instruções passo a passo

---

## Signature Elements

1. **Code Comparison Panel**: Bloco lado a lado mostrando JSBase → JavaScript em tempo real (presente em hero, docs, exemplos)
2. **Syntax Highlighting Consistente**: Cores do VS Code aplicadas a todos os blocos de código
3. **Divider Ondulado**: Separadores entre seções com onda suave (referência ao fluxo de dados)
4. **Terminal Mockup**: Blocos de saída estilizados como terminal, com prompt `>` e output em verde

---

## Interaction Philosophy

- **Hover States**: Botões ganham brilho azul sutil; links ficam sublinhados
- **Transições Suaves**: Mudanças de tema, abas, expansão de menu com `transition: all 200ms ease-out`
- **Feedback Imediato**: Executar código no playground mostra resultado em <100ms
- **Exploração Incentivada**: Exemplos de código são clicáveis para carregar no playground

---

## Animation

- **Entrance**: Fade-in suave (300ms) para seções ao scroll
- **Code Execution**: Pulse suave no botão "Executar" durante execução
- **Menu Toggle**: Slide suave do sidebar (200ms)
- **Syntax Highlight**: Highlight de palavras-chave ao passar mouse (sem delay)
- **Respeitando Preferências**: `@media (prefers-reduced-motion: reduce)` desativa animações

---

## Typography System

| Elemento | Font | Peso | Tamanho | Uso |
|----------|------|------|--------|-----|
| **Títulos (H1)** | IBM Plex Mono | 700 | 3.5rem | Página inicial, seções principais |
| **Subtítulos (H2)** | IBM Plex Mono | 600 | 2rem | Seções de documentação |
| **Corpo** | Inter | 400 | 1rem | Texto principal |
| **Código** | IBM Plex Mono | 400 | 0.875rem | Blocos de código, terminal |
| **Labels** | Inter | 500 | 0.875rem | Botões, labels de input |

**Rationale**: IBM Plex Mono traz autoridade técnica; Inter oferece legibilidade em corpo de texto. Combinação clássica em ferramentas modernas.

---

## Brand Essence

**Positioning**: Uma linguagem de programação que torna JavaScript acessível a iniciantes, sem sacrificar profissionalismo.

**Personality**: 
- **Técnica** — Precisa, confiável, sem compromissos com qualidade
- **Acessível** — Educacional, paciente, celebra o progresso
- **Inovadora** — Transpilação em tempo real, documentação automática, ecossistema integrado

---

## Brand Voice

**Headlines**: Diretas, técnicas, inspiradoras
- ✅ "Escreva em português, execute em JavaScript"
- ✅ "Uma linguagem feita para aprender, construída para escalar"
- ❌ "Bem-vindo ao JSBase" (genérico)

**CTAs**: Ação clara, sem hesitação
- ✅ "Começar Agora" | "Explorar Playground" | "Ler Documentação"
- ❌ "Clique aqui" | "Saiba mais"

**Microcopy**: Tom educacional, nunca condescendente
- ✅ "Veja o JavaScript gerado" (curiosidade)
- ✅ "Erro de sintaxe na linha 5" (preciso, construtivo)
- ❌ "Você errou" (negativo)

---

## Wordmark & Logo

**Conceito**: Símbolo geométrico que representa transpilação — seta ou transformação visual

- **Forma**: Dois triângulos ou blocos entrelaçados (JSBase ↔ JavaScript)
- **Cores**: Azul primário (#4FC1FF) com destaque em laranja
- **Estilo**: Moderno, geométrico, sem serifs
- **Uso**: 
  - Header: 32px (pequeno, limpo)
  - Favicon: 16px
  - Documentação: 48px (destaque)

---

## Signature Brand Color

**Azul #4FC1FF** — Cor que é imediatamente reconhecível como JSBase. Usada em:
- Botões primários
- Links ativos
- Destaques de sintaxe (palavras-chave)
- Borda de cards ativos
- Ícones de ação

---

## Visual Assets

- **Hero Background**: Padrão geométrico sutil (grade ou linhas diagonais) em tom escuro com overlay
- **Code Blocks**: Fundo #1E1E1E com borda sutil em #4FC1FF
- **Buttons**: Fundo #4FC1FF, texto branco, hover com brightness +10%
- **Icons**: Lucide React (simples, técnicas, monoline)

---

## Implementation Notes

- **Tema**: Dark-first (defaultTheme="dark" em App.tsx)
- **CSS Variables**: Usar OKLCH para cores (suporte moderno, melhor perceptibilidade)
- **Componentes**: shadcn/ui para consistência (Button, Card, Tabs, etc.)
- **Responsividade**: Mobile-first; sidebar colapsável em <768px
- **Performance**: Lazy load exemplos de código; syntax highlighting via highlight.js

---

## Style Decisions (Amendments)

(Será preenchido durante implementação)
