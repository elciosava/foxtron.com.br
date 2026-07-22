# Documentação Completa - JSBase 4.0

## Visão Geral

**JSBase 4.0** é uma linguagem de programação em português projetada para ensinar os conceitos fundamentais de programação, atuando como uma camada de abstração sobre JavaScript. O objetivo é permitir que iniciantes aprendam lógica de programação sem a complexidade da sintaxe em inglês do JavaScript.

---

## Características Principais

✅ **Sintaxe em Português**: Palavras-chave e estruturas em português brasileiro  
✅ **Transpilação em Tempo Real**: Converte JSBase para JavaScript automaticamente  
✅ **Visualização do Código Gerado**: Veja o JavaScript transpilado em tempo real  
✅ **Biblioteca Padrão Completa**: Funções úteis pré-implementadas  
✅ **Suporte a Funções**: Defina e chame funções com parâmetros tipados  
✅ **Destaque de Sintaxe**: Colorização automática do código  
✅ **Ambiente Integrado**: Editor, transpilador e saída em uma única página  

---

## 1. Tipos de Dados

JSBase suporta três tipos de dados básicos:

### 1.1 Número
Representa valores numéricos inteiros ou decimais.

```jsbase
numero idade recebe 25
numero altura recebe 1.75
```

### 1.2 Texto
Representa sequências de caracteres. Deve estar entre aspas duplas.

```jsbase
texto nome recebe "João Silva"
texto mensagem recebe "Olá, Mundo!"
```

### 1.3 Booleano
Representa valores verdadeiro ou falso.

```jsbase
booleano ativo recebe verdadeiro
booleano inativo recebe falso
```

---

## 2. Declaração de Variáveis

A declaração de variáveis segue o padrão:

```
<tipo> <nome> recebe <valor>
```

**Exemplos:**

```jsbase
numero x recebe 10
texto nome recebe "Maria"
booleano aprovado recebe verdadeiro
```

### 2.1 Atribuição de Valores

Você pode atribuir novos valores a variáveis já declaradas:

```jsbase
numero contador recebe 0
contador recebe contador + 1
```

---

## 3. Operadores

### 3.1 Operadores Aritméticos

| Operador | Descrição | Exemplo |
|----------|-----------|---------|
| `+` | Adição | `a + b` |
| `-` | Subtração | `a - b` |
| `*` | Multiplicação | `a * b` |
| `/` | Divisão | `a / b` |
| `%` | Módulo (resto) | `a % b` |

### 3.2 Operadores de Comparação

| Operador | Descrição | Exemplo |
|----------|-----------|---------|
| `maior que` | Maior que | `a maior que b` |
| `menor que` | Menor que | `a menor que b` |
| `maior ou igual` | Maior ou igual | `a maior ou igual b` |
| `menor ou igual` | Menor ou igual | `a menor ou igual b` |
| `igual` | Igualdade | `a igual b` |
| `diferente` | Diferença | `a diferente b` |

### 3.3 Operadores Lógicos

| Operador | Descrição | Exemplo |
|----------|-----------|---------|
| `e` | E lógico (AND) | `condicao1 e condicao2` |
| `ou` | OU lógico (OR) | `condicao1 ou condicao2` |

---

## 4. Entrada e Saída

### 4.1 Mostrar (Saída)

A função `mostrar` exibe valores no console de saída.

```jsbase
mostrar "Olá, Mundo!"
mostrar "O resultado é:", 42
mostrar "Múltiplos valores:", 1, 2, 3
```

### 4.2 Ler (Entrada)

A função `ler` solicita entrada do usuário através de um prompt.

```jsbase
texto nome recebe ler("Qual é o seu nome?")
mostrar "Bem-vindo,", nome
```

---

## 5. Estruturas de Controle

### 5.1 Condicional: Se/Senão

Executa um bloco de código se uma condição for verdadeira.

```jsbase
se condicao
    // código executado se verdadeiro
senao
    // código executado se falso
fimse
```

**Exemplo:**

```jsbase
numero nota recebe 8

se nota maior ou igual 7
    mostrar "Aprovado!"
senao
    mostrar "Reprovado!"
fimse
```

### 5.2 Laço: Enquanto

Repete um bloco de código enquanto uma condição for verdadeira.

```jsbase
enquanto condicao
    // código repetido
fimenquanto
```

**Exemplo:**

```jsbase
numero i recebe 1

enquanto i menor ou igual 5
    mostrar "Número:", i
    i recebe i + 1
fimenquanto
```

### 5.3 Laço: Para

Repete um bloco de código um número específico de vezes.

```jsbase
para (inicializacao; condicao; incremento)
    // código repetido
fimpara
```

**Exemplo:**

```jsbase
para (numero i recebe 1; i menor ou igual 10; i recebe i + 1)
    mostrar "Iteração:", i
fimpara
```

---

## 6. Funções

### 6.1 Definição de Função

```jsbase
funcao nomeDaFuncao()
    // corpo da função
fimfuncao
```

### 6.2 Função com Parâmetros

```jsbase
funcao soma(numero a, numero b)
    retornar a + b
fimfuncao
```

### 6.3 Chamada de Função

```jsbase
numero resultado recebe soma(10, 20)
mostrar resultado
```

### 6.4 Retorno de Valores

Use `retornar` ou `devolver` para retornar um valor da função.

```jsbase
funcao quadrado(numero x)
    retornar x * x
fimfuncao

numero resultado recebe quadrado(5)
mostrar "5² =", resultado
```

### 6.5 Função sem Retorno

```jsbase
funcao saudacao()
    mostrar "Bem-vindo ao JSBase!"
fimfuncao

saudacao()
```

---

## 7. Biblioteca Padrão

JSBase fornece uma biblioteca de funções úteis pré-implementadas:

### 7.1 Manipulação de Texto

#### `tamanho(texto)`
Retorna o número de caracteres em um texto.

```jsbase
numero tam recebe tamanho("JavaScript")
mostrar tam  // Saída: 10
```

#### `maiusculo(texto)`
Converte o texto para maiúsculas.

```jsbase
mostrar maiusculo("olá mundo")  // Saída: OLÁ MUNDO
```

#### `minusculo(texto)`
Converte o texto para minúsculas.

```jsbase
mostrar minusculo("OLÁ MUNDO")  // Saída: olá mundo
```

### 7.2 Números Aleatórios

#### `aleatorio(min, max)`
Gera um número aleatório entre `min` e `max` (inclusive).

```jsbase
numero sorte recebe aleatorio(1, 100)
mostrar "Número sorteado:", sorte
```

### 7.3 Controle de Tempo

#### `esperar(milissegundos)`
Pausa a execução por um número de milissegundos.

```jsbase
mostrar "Iniciando..."
esperar(2000)  // Aguarda 2 segundos
mostrar "Pronto!"
```

### 7.4 Data e Hora

#### `hoje()`
Retorna a data atual no formato DD/MM/YYYY.

```jsbase
mostrar "Hoje é:", hoje()
```

#### `hora()`
Retorna a hora atual no formato HH:MM:SS.

```jsbase
mostrar "Hora:", hora()
```

### 7.5 Limpeza de Console

#### `limpar()`
Limpa toda a saída do console.

```jsbase
mostrar "Primeira mensagem"
limpar()
mostrar "Segunda mensagem (primeira foi apagada)"
```

### 7.6 Conversão de Tipos

#### `inteiro(valor)`
Converte um valor para inteiro.

```jsbase
numero x recebe inteiro(3.7)
mostrar x  // Saída: 3
```

#### `decimal(valor)`
Converte um valor para número decimal.

```jsbase
numero x recebe decimal("3.14")
mostrar x  // Saída: 3.14
```

#### `texto(valor)`
Converte um valor para texto.

```jsbase
texto resultado recebe texto(42)
mostrar resultado  // Saída: "42"
```

#### `booleano(valor)`
Converte um valor para booleano.

```jsbase
booleano x recebe booleano(1)
mostrar x  // Saída: true
```

---

## 8. Comentários

Use `//` para adicionar comentários ao código. Tudo após `//` na mesma linha é ignorado.

```jsbase
// Isto é um comentário
numero x recebe 10  // Comentário inline
mostrar x
```

---

## 9. Exemplos Práticos

### 9.1 Calculadora Simples

```jsbase
funcao calcular(numero a, numero b, texto op)
    se op igual "+"
        retornar a + b
    senao
        se op igual "-"
            retornar a - b
        senao
            se op igual "*"
                retornar a * b
            senao
                retornar 0
            fimse
        fimse
    fimse
fimfuncao

mostrar "10 + 5 =", calcular(10, 5, "+")
mostrar "10 - 5 =", calcular(10, 5, "-")
mostrar "10 * 5 =", calcular(10, 5, "*")
```

### 9.2 Tabuada

```jsbase
funcao tabuada(numero n)
    para (numero i recebe 1; i menor ou igual 10; i recebe i + 1)
        mostrar n, "x", i, "=", n * i
    fimpara
fimfuncao

tabuada(7)
```

### 9.3 Verificar Número Par/Ímpar

```jsbase
funcao ehPar(numero n)
    se n % 2 igual 0
        retornar verdadeiro
    senao
        retornar falso
    fimse
fimfuncao

numero num recebe 42

se ehPar(num)
    mostrar num, "é par"
senao
    mostrar num, "é ímpar"
fimse
```

### 9.4 Soma de Números

```jsbase
funcao somarAte(numero n)
    numero soma recebe 0
    numero i recebe 1
    
    enquanto i menor ou igual n
        soma recebe soma + i
        i recebe i + 1
    fimenquanto
    
    retornar soma
fimfuncao

mostrar "Soma de 1 a 10:", somarAte(10)
```

---

## 10. Tratamento de Erros

JSBase fornece mensagens de erro úteis quando algo dá errado:

- **Erro de Lógica**: Blocos não fechados corretamente (fimse, fimenquanto, fimpara, fim)
- **Erro de Execução**: Problemas durante a execução do código JavaScript transpilado

Se um erro ocorrer, a mensagem será exibida em vermelho na saída.

---

## 11. Boas Práticas

1. **Use nomes significativos**: `idade` é melhor que `x`
2. **Declare o tipo correto**: Use `numero`, `texto` ou `booleano`
3. **Indente o código**: Melhora a legibilidade
4. **Use comentários**: Explique o que o código faz
5. **Teste incrementalmente**: Execute pequenas partes do código
6. **Visualize o JavaScript**: Use a aba "Código Transpilado" para entender o que está acontecendo

---

## 12. Palavras-Chave Reservadas

| Palavra-Chave | Uso |
|---------------|-----|
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

---

## 13. Atalhos Úteis

- **Executar Código**: Clique no botão "▶ Executar" ou use a função `executar()`
- **Limpar Saída**: Use `limpar()` no seu código
- **Ver Código Transpilado**: Verifique a aba "Código Transpilado" para entender a conversão

---

## 14. Suporte e Feedback

Se encontrar bugs ou tiver sugestões de melhoria, entre em contato com a equipe de desenvolvimento do JSBase.

---

## Versão

**JSBase 4.0** - Lançamento: Julho 2026

### Mudanças da Versão 3.2 para 4.0

- ✨ Suporte completo a funções com parâmetros tipados
- ✨ Palavras-chave `retornar` e `devolver` para retorno de funções
- ✨ Biblioteca padrão expandida (ler, limpar, esperar, aleatorio, tamanho, maiusculo, minusculo, hoje, hora)
- ✨ Visualização em tempo real do código JavaScript transpilado
- ✨ Interface redesenhada com painel de referência rápida
- ✨ Melhor tratamento de erros e mensagens
- ✨ Suporte a tipos adicionais (inteiro, decimal)
- ✨ Destaque de sintaxe aprimorado

---

**Aprenda programação em português com JSBase!** 🚀
