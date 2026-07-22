# JSBase - Linguagem de Programação Educacional

Uma linguagem de programação em português projetada para ensinar os conceitos fundamentais de programação, atuando como uma camada de abstração sobre JavaScript.

## 🎯 Objetivo

Permitir que iniciantes aprendam lógica de programação sem a complexidade da sintaxe em inglês do JavaScript.

## ✨ Características Principais

- ✅ **Sintaxe em Português**: Palavras-chave e estruturas em português brasileiro
- ✅ **Transpilação em Tempo Real**: Converte JSBase para JavaScript automaticamente
- ✅ **Visualização do Código Gerado**: Veja o JavaScript transpilado em tempo real
- ✅ **Biblioteca Padrão Completa**: Funções úteis pré-implementadas
- ✅ **Suporte a Funções**: Defina e chame funções com parâmetros tipados
- ✅ **Destaque de Sintaxe**: Colorização automática do código
- ✅ **Ambiente Integrado**: Editor, transpilador e saída em uma única página

## 📁 Estrutura do Projeto

```
jsbase-official/
├── index.html              # Página inicial
├── playground.html         # Editor interativo
├── docs/
│   └── index.html          # Documentação completa
├── css/
│   └── style.css           # Estilos (tema VS Code)
├── js/
│   └── compiler.js         # Compilador JSBase
└── README.md               # Este arquivo
```

## 🚀 Como Usar

### 1. Página Inicial
Acesse `index.html` para ver a apresentação da linguagem com exemplos e características.

### 2. Playground
Acesse `playground.html` para:
- Escrever código JSBase
- Ver a transpilação em tempo real
- Executar e visualizar os resultados

### 3. Documentação
Acesse `docs/index.html` para:
- Aprender a sintaxe completa
- Ver exemplos de código
- Consultar a referência de palavras-chave

## 📚 Tipos de Dados

JSBase suporta três tipos de dados básicos:

### Número
```jsbase
numero idade recebe 25
numero altura recebe 1.75
```

### Texto
```jsbase
texto nome recebe "João Silva"
texto mensagem recebe "Olá, Mundo!"
```

### Booleano
```jsbase
booleano ativo recebe verdadeiro
booleano inativo recebe falso
```

## 🔧 Operadores

### Aritméticos
- `+` Adição
- `-` Subtração
- `*` Multiplicação
- `/` Divisão
- `%` Módulo (resto)

### Comparação
- `maior que` ou `>`
- `menor que` ou `<`
- `maior ou igual` ou `>=`
- `menor ou igual` ou `<=`
- `igual` ou `==`
- `diferente` ou `!=`

### Lógicos
- `e` (AND)
- `ou` (OR)

## 📝 Exemplos

### Olá Mundo
```jsbase
mostrar "Olá Mundo!"
```

### Variáveis e Condições
```jsbase
numero idade recebe 18

se idade maior ou igual 18
  mostrar "Maior de idade"
senao
  mostrar "Menor de idade"
fimse
```

### Loops
```jsbase
para (numero i recebe 1; i menor ou igual 10; i recebe i + 1)
  mostrar "Número:", i
fimpara
```

### Funções
```jsbase
funcao soma(numero a, numero b)
  retornar a + b
fimfuncao

numero resultado recebe soma(10, 20)
mostrar "Resultado:", resultado
```

### Tabuada
```jsbase
funcao tabuada(numero n)
  para (numero i recebe 1; i menor ou igual 10; i recebe i + 1)
    mostrar n, "x", i, "=", n * i
  fimpara
fimfuncao

tabuada(7)
```

## 📖 Palavras-Chave Reservadas

| Palavra-Chave | Uso |
|---|---|
| `numero` | Declarar variável numérica |
| `texto` | Declarar variável de texto |
| `booleano` | Declarar variável booleana |
| `recebe` | Atribuir valor |
| `mostrar` | Exibir saída |
| `ler` | Solicitar entrada |
| `se` | Condicional |
| `senao` | Else |
| `fimse` | Fim do if |
| `enquanto` | Loop while |
| `fimenquanto` | Fim do while |
| `para` | Loop for |
| `fimpara` | Fim do for |
| `funcao` | Definir função |
| `fimfuncao` | Fim da função |
| `retornar` | Retornar valor |
| `devolver` | Retornar valor (alternativa) |
| `verdadeiro` | Valor booleano true |
| `falso` | Valor booleano false |

## 🛠️ Biblioteca Padrão

### Manipulação de Texto
- `tamanho(texto)` - Retorna o número de caracteres
- `maiusculo(texto)` - Converte para maiúsculas
- `minusculo(texto)` - Converte para minúsculas

### Números Aleatórios
- `aleatorio(min, max)` - Gera número aleatório entre min e max (inclusive)

### Data e Hora
- `hoje()` - Retorna a data atual (DD/MM/YYYY)
- `hora()` - Retorna a hora atual (HH:MM:SS)

### Conversão de Tipos
- `inteiro(valor)` - Converte para inteiro
- `decimal(valor)` - Converte para decimal
- `texto(valor)` - Converte para texto
- `booleano(valor)` - Converte para booleano

## 🎨 Tema Visual

O site utiliza um tema escuro inspirado no VS Code com as seguintes cores:

- **Fundo Escuro**: `#1E1E1E`
- **Azul Primário**: `#4FC1FF` (destaques, links)
- **Laranja**: `#CE9178` (strings)
- **Verde**: `#6A9955` (palavras-chave)
- **Branco**: `#D4D4D4` (texto principal)

## 💻 Tecnologias Utilizadas

- **HTML5** - Estrutura
- **CSS3** - Estilos (tema VS Code)
- **JavaScript Puro** - Compilador e interatividade
- **Sem Frameworks** - Código limpo e direto

## 🔄 Como Funciona a Transpilação

1. **Lexer**: Tokeniza o código JSBase em linhas
2. **Parser**: Classifica cada linha (declaração, atribuição, controle de fluxo, etc.)
3. **Code Generator**: Gera o código JavaScript equivalente

Exemplo:
```
JSBase:        numero idade recebe 18
JavaScript:    let idade = 18;
```

## 📦 Distribuição

O site está pronto para ser hospedado em qualquer servidor web que suporte HTML, CSS e JavaScript puro.

### Arquivos Necessários
- `index.html` - Página inicial
- `playground.html` - Playground
- `docs/index.html` - Documentação
- `css/style.css` - Estilos
- `js/compiler.js` - Compilador

## 🤝 Contribuições

Este é um projeto educacional. Sugestões de melhorias são bem-vindas!

## 📄 Licença

JSBase é um projeto educacional de código aberto.

---

**Criado com ❤️ para ensinar programação de forma simples e acessível.**
