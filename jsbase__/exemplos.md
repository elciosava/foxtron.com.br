# Exemplos de Código JSBase 4.0

## 1. Exemplo Básico: Olá Mundo

```jsbase
mostrar "Olá, Mundo!"
```

**Saída esperada:**
```
Olá, Mundo!
```

---

## 2. Variáveis e Tipos

```jsbase
numero idade recebe 25
texto nome recebe "João Silva"
booleano ativo recebe verdadeiro

mostrar "Nome:", nome
mostrar "Idade:", idade
mostrar "Ativo:", ativo
```

**Saída esperada:**
```
Nome: João Silva
Idade: 25
Ativo: true
```

---

## 3. Operações Matemáticas

```jsbase
numero a recebe 10
numero b recebe 3

mostrar "Soma:", a + b
mostrar "Subtração:", a - b
mostrar "Multiplicação:", a * b
mostrar "Divisão:", a / b
```

**Saída esperada:**
```
Soma: 13
Subtração: 7
Multiplicação: 30
Divisão: 3.3333333333333335
```

---

## 4. Estrutura Condicional (Se/Senão)

```jsbase
numero nota recebe 8

se nota maior ou igual 7
    mostrar "Aprovado!"
senao
    mostrar "Reprovado!"
fimse
```

**Saída esperada:**
```
Aprovado!
```

---

## 5. Laço Enquanto

```jsbase
numero contador recebe 1

enquanto contador menor ou igual 5
    mostrar "Contagem:", contador
    contador recebe contador + 1
fimenquanto
```

**Saída esperada:**
```
Contagem: 1
Contagem: 2
Contagem: 3
Contagem: 4
Contagem: 5
```

---

## 6. Laço Para

```jsbase
para (numero i recebe 1; i menor ou igual 3; i recebe i + 1)
    mostrar "Iteração:", i
fimpara
```

**Saída esperada:**
```
Iteração: 1
Iteração: 2
Iteração: 3
```

---

## 7. Funções Simples

```jsbase
funcao saudacao()
    mostrar "Bem-vindo ao JSBase!"
fimfuncao

saudacao()
```

**Saída esperada:**
```
Bem-vindo ao JSBase!
```

---

## 8. Funções com Parâmetros

```jsbase
funcao soma(numero a, numero b)
    retornar a + b
fimfuncao

numero resultado recebe soma(10, 20)
mostrar "Resultado:", resultado
```

**Saída esperada:**
```
Resultado: 30
```

---

## 9. Funções com Retorno de Texto

```jsbase
funcao nomeCompleto()
    retornar "Elcio Julio Sava"
fimfuncao

texto nome recebe nomeCompleto()
mostrar "Nome:", nome
```

**Saída esperada:**
```
Nome: Elcio Julio Sava
```

---

## 10. Função com Lógica Complexa

```jsbase
funcao maior(numero a, numero b)
    se a maior que b
        retornar a
    senao
        retornar b
    fimse
fimfuncao

numero resultado recebe maior(15, 8)
mostrar "O maior número é:", resultado
```

**Saída esperada:**
```
O maior número é: 15
```

---

## 11. Biblioteca Padrão: Tamanho

```jsbase
texto mensagem recebe "JavaScript"
numero tam recebe tamanho(mensagem)

mostrar "A palavra tem", tam, "caracteres"
```

**Saída esperada:**
```
A palavra tem 10 caracteres
```

---

## 12. Biblioteca Padrão: Maiúscula e Minúscula

```jsbase
texto texto1 recebe "Olá Mundo"

mostrar maiusculo(texto1)
mostrar minusculo(texto1)
```

**Saída esperada:**
```
OLÁ MUNDO
olá mundo
```

---

## 13. Biblioteca Padrão: Aleatório

```jsbase
numero sorte recebe aleatorio(1, 10)
mostrar "Número sorteado:", sorte
```

**Saída esperada:**
```
Número sorteado: [um número entre 1 e 10]
```

---

## 14. Biblioteca Padrão: Data e Hora

```jsbase
mostrar "Hoje é:", hoje()
mostrar "Hora atual:", hora()
```

**Saída esperada:**
```
Hoje é: 21/7/2026
Hora atual: [hora atual do sistema]
```

---

## 15. Programa Completo: Calculadora Simples

```jsbase
funcao calcular(numero a, numero b, texto operacao)
    se operacao igual "soma"
        retornar a + b
    senao
        se operacao igual "subtracao"
            retornar a - b
        senao
            se operacao igual "multiplicacao"
                retornar a * b
            senao
                retornar 0
            fimse
        fimse
    fimse
fimfuncao

numero x recebe 10
numero y recebe 5

mostrar "10 + 5 =", calcular(x, y, "soma")
mostrar "10 - 5 =", calcular(x, y, "subtracao")
mostrar "10 * 5 =", calcular(x, y, "multiplicacao")
```

**Saída esperada:**
```
10 + 5 = 15
10 - 5 = 5
10 * 5 = 50
```

---

## 16. Programa Completo: Tabuada

```jsbase
funcao tabuada(numero n)
    para (numero i recebe 1; i menor ou igual 10; i recebe i + 1)
        mostrar n, "x", i, "=", n * i
    fimpara
fimfuncao

mostrar "Tabuada do 7:"
tabuada(7)
```

**Saída esperada:**
```
Tabuada do 7:
7 x 1 = 7
7 x 2 = 14
7 x 3 = 21
7 x 4 = 28
7 x 5 = 35
7 x 6 = 42
7 x 7 = 49
7 x 8 = 56
7 x 9 = 63
7 x 10 = 70
```

---

## 17. Programa Completo: Verificar Número Par/Ímpar

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

**Saída esperada:**
```
42 é par
```

---

## 18. Programa Completo: Fibonacci

```jsbase
funcao fibonacci(numero n)
    se n menor ou igual 1
        retornar n
    senao
        retornar fibonacci(n - 1) + fibonacci(n - 2)
    fimse
fimfuncao

para (numero i recebe 0; i menor ou igual 8; i recebe i + 1)
    mostrar fibonacci(i)
fimpara
```

**Saída esperada:**
```
0
1
1
2
3
5
8
13
21
```

---

## 19. Usando Múltiplas Funções

```jsbase
funcao quadrado(numero x)
    retornar x * x
fimfuncao

funcao cubo(numero x)
    retornar x * x * x
fimfuncao

numero valor recebe 5

mostrar "Quadrado de", valor, "=", quadrado(valor)
mostrar "Cubo de", valor, "=", cubo(valor)
```

**Saída esperada:**
```
Quadrado de 5 = 25
Cubo de 5 = 125
```

---

## 20. Programa Completo: Jogo de Adivinhação

```jsbase
funcao jogar()
    numero secreto recebe aleatorio(1, 100)
    numero tentativa recebe 0
    numero tentativas recebe 0

    enquanto tentativa diferente secreto
        tentativa recebe ler("Adivinhe o número (1-100):")
        tentativas recebe tentativas + 1

        se tentativa menor que secreto
            mostrar "Muito baixo! Tente novamente."
        senao
            se tentativa maior que secreto
                mostrar "Muito alto! Tente novamente."
            senao
                mostrar "Acertou! Você usou", tentativas, "tentativas"
            fimse
        fimse
    fimenquanto
fimfuncao

jogar()
```

**Saída esperada (interativa):**
```
Adivinhe o número (1-100): [usuário digita]
Muito baixo! Tente novamente.
Adivinhe o número (1-100): [usuário digita]
Acertou! Você usou 5 tentativas
```

---

## Notas Importantes

- **Comentários**: Use `//` para adicionar comentários
- **Tipagem**: Sempre declare o tipo da variável (`numero`, `texto`, `booleano`)
- **Funções**: Use `funcao` para declarar e `fimfuncao` para encerrar
- **Retorno**: Use `retornar` ou `devolver` para retornar valores
- **Biblioteca Padrão**: Funções como `tamanho()`, `maiusculo()`, `aleatorio()` estão disponíveis globalmente
- **Operadores**: Use `maior que`, `menor que`, `igual`, `diferente`, `e`, `ou`
- **Valores Booleanos**: Use `verdadeiro` e `falso`
