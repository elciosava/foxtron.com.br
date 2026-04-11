# 🎨 Editor Interativo de Banners SENAI

Editor HTML/CSS/JavaScript para criar banners A4 personalizados dos cursos técnicos do SENAI de União da Vitória.

## 📋 Características

✅ **4 Cursos Pré-configurados:**
- Técnico em Administração (Azul #003d99 + Laranja #ff6b35)
- Desenvolvimento de Sistemas (Azul #0055cc + Ciano #00d4ff)
- Eletromecânica (Azul #003d99 + Laranja #ff8c42)
- Manutenção Automotiva (Azul #003d99 + Laranja #ff6b35)

✅ **Funcionalidades Principais:**
- 📷 Upload de foto de fundo personalizável
- 🔲 Geração dinâmica de QR Code
- 📝 5 campos de informações editáveis em tempo real
- 💾 Exportação como PNG de alta qualidade
- 🎯 Painel de edição separado e intuitivo
- 📱 Design responsivo

## 🚀 Como Usar

### 1. Abrir o Editor
Abra o arquivo `index.html` em um navegador web (Chrome, Firefox, Edge, Safari).

### 2. Selecionar um Curso
Escolha um dos 4 cursos disponíveis no dropdown "Selecione o Curso". O banner será atualizado automaticamente com as cores e informações do curso.

### 3. Adicionar Foto de Fundo
- Clique em "Escolher Arquivo" para selecionar uma imagem do seu computador
- Ou arraste e solte uma imagem diretamente na área de fundo do banner
- Recomendação: 1240x600px para melhor resultado

### 4. Gerar QR Code
- Insira um link (ex: `https://www.senaipr.org.br`)
- Clique em "Gerar QR Code"
- O QR code aparecerá automaticamente no banner

### 5. Preencher Informações
Edite os 5 campos de informações com dados relevantes:
- **Informação 1:** Horário (ex: "Horário: 14h às 18h")
- **Informação 2:** Local (ex: "Local: Sala 101")
- **Informação 3:** Instrutor (ex: "Instrutor: João Silva")
- **Informação 4:** Vagas (ex: "Vagas: 30")
- **Informação 5:** Carga horária (ex: "Carga horária: 80h")

As mudanças aparecem em tempo real no banner.

### 6. Exportar como PNG
Clique em "Exportar como PNG" para baixar o banner em alta qualidade (1240x1754px, 300 DPI).

### 7. Resetar
Clique em "Resetar" para limpar todas as edições e voltar aos valores padrão.

## 📁 Estrutura de Arquivos

```
senai-banners-standalone/
├── index.html          # Arquivo principal (abra este no navegador)
├── styles.css          # Estilos do editor e banners
├── script.js           # Lógica de edição e funcionalidades
└── README.md           # Este arquivo
```

## 🎨 Personalização Avançada

### Modificar Cores de um Curso
Abra `script.js` e procure por `coursesData`. Edite os valores de `primaryColor` e `accentColor`:

```javascript
administracao: {
    primaryColor: '#003d99',    // Cor primária (azul)
    accentColor: '#ff6b35',     // Cor de destaque (laranja)
    // ... outras propriedades
}
```

### Adicionar Novo Curso
No objeto `coursesData` em `script.js`, adicione:

```javascript
novoCurso: {
    title: 'Título do Curso',
    subtitle: 'Subtítulo',
    description: 'Descrição completa...',
    primaryColor: '#XXXXXX',
    accentColor: '#XXXXXX',
    icon: '🎓'
}
```

Depois adicione a opção no `<select>` em `index.html`:

```html
<option value="novoCurso">Novo Curso</option>
```

## 💡 Dicas Úteis

- **Foto de Fundo:** Use imagens com boa qualidade e que não comprometam a legibilidade do texto
- **QR Code:** Teste o QR code gerado com seu smartphone antes de imprimir
- **Impressão:** Use a opção "Exportar como PNG" para garantir qualidade de impressão
- **Compatibilidade:** Funciona em todos os navegadores modernos (Chrome, Firefox, Edge, Safari)

## 🔧 Requisitos

- Navegador web moderno (atualizado)
- Conexão com internet (para gerar QR codes)
- Nenhuma instalação necessária

## 📝 Notas

- Os banners são salvos em formato PNG com resolução 1240x1754px (300 DPI)
- As cores seguem a identidade visual do SENAI
- O design é responsivo e funciona em diferentes tamanhos de tela
- Os dados não são salvos automaticamente - use "Exportar como PNG" para salvar

## 🆘 Suporte

Se encontrar problemas:

1. Verifique se o navegador está atualizado
2. Limpe o cache do navegador (Ctrl+Shift+Delete)
3. Tente em outro navegador
4. Certifique-se de que JavaScript está habilitado

## 📄 Licença

Desenvolvido para SENAI - União da Vitória, PR

---

**Versão:** 1.0  
**Última atualização:** Março de 2026
