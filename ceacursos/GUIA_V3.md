# 🎨 Editor de Banners SENAI v3 - Guia de Uso

## ✨ Novidades da Versão 3

A versão 3 foi completamente redesenhada com **layout profissional em 3 seções**:

### Principais Melhorias:

✅ **Cabeçalho Azul SENAI** - Título customizável + nome do curso
✅ **Imagem de Fundo em Destaque** - Ocupando a área central do banner
✅ **Quadro de Informações à Esquerda** - Sobreposto na imagem com 5 campos
✅ **Rodapé Azul SENAI** - Com QR code, CTA e informações institucionais
✅ **Melhor Aproveitamento de Espaço** - Todas as informações visíveis
✅ **Design Profissional** - Segue padrão corporativo SENAI

---

## 🎯 Layout da Versão 3

```
┌─────────────────────────────────────────┐
│         CABEÇALHO AZUL SENAI            │
│  GRATUITO                               │
│  Técnico em Administração               │
├─────────────────────────────────────────┤
│                                         │
│  ┌──────────┐                          │
│  │ ⏰ Info1 │    [FOTO DE FUNDO]       │
│  │ 📍 Info2 │                          │
│  │ 👤 Info3 │    [EM DESTAQUE]         │
│  │ 📊 Info4 │                          │
│  │ 📚 Info5 │                          │
│  └──────────┘                          │
│                                         │
├─────────────────────────────────────────┤
│ [QR] Texto QR    [CTA] INSCRIÇÕES      │
│                  ABERTAS                │
│                  SENAI / União da Vitória
└─────────────────────────────────────────┘
```

---

## 🚀 Como Usar

### 1. Abrir o Editor
Abra o arquivo **`index-v3.html`** em um navegador web.

### 2. Selecionar o Curso
Escolha entre os 5 cursos disponíveis:
- Técnico em Administração
- Desenvolvimento de Sistemas
- Eletromecânica
- Manutenção Automotiva
- Auxiliar de Informática

### 3. Adicionar Foto de Fundo
- Clique em "Escolher Arquivo" ou arraste a imagem
- A foto ocupará a área central do banner
- **Recomendação**: 1240x800px para melhor resultado
- **Dica**: Use fotos de laboratórios, salas de aula ou pessoas trabalhando

### 4. Customizar Título
- Digite "GRATUITO" ou outro texto (ex: "INSCRIÇÕES ABERTAS", "NOVO CURSO")
- Aparecerá em destaque no cabeçalho azul

### 5. Preencher as 5 Informações
Cada campo tem um ícone representativo:

| Ícone | Campo | Exemplo |
|-------|-------|---------|
| ⏰ | Informação 1 | Início 02/02/2026 - 160 horas |
| 📍 | Informação 2 | Modalidade: PRESENCIAL (13:30-17:30) |
| 👤 | Informação 3 | Requisitos: 14 anos completos |
| 📊 | Informação 4 | Ensino fundamental incompleto |
| 📚 | Informação 5 | Contato: (42) 3521-3910 |

### 6. Gerar QR Code
- Insira um link válido (ex: https://www.senaipr.org.br)
- Clique em "Gerar QR Code"
- O QR code aparecerá no rodapé azul (canto esquerdo)

### 7. Exportar como PNG
- Clique em "Exportar como PNG"
- O banner será baixado em alta qualidade (1240x1754px)
- Pronto para impressão em formato A4

---

## 📐 Estrutura Técnica

### Dimensões
- **Formato**: A4 (210mm × 297mm)
- **Resolução**: 1240 × 1754 pixels
- **DPI**: 300 (pronto para impressão)

### Seções
1. **Cabeçalho**: 60px (azul #003d99)
2. **Área Central**: Flexível (imagem + informações)
3. **Rodapé**: 110px (azul #003d99)

### Cores
- **Azul Primário**: #003d99 (SENAI)
- **Laranja Destaque**: #ff6b35 (CTA)
- **Fundo Info**: rgba(0, 61, 153, 0.92) com blur

---

## 💡 Dicas Profissionais

### Fotos de Fundo
- ✅ **Boas**: Laboratórios, salas de aula, pessoas em ação
- ❌ **Evitar**: Imagens muito claras, muito escuras ou genéricas
- 📏 **Tamanho ideal**: 1240x800px (proporção 3:2)

### Informações
- **Máximo 40 caracteres** por linha para não cortar
- **Seja conciso**: Use abreviações quando necessário
- **Ordem lógica**: Coloque informações importantes primeiro

### QR Code
- 🔍 **Teste antes**: Escaneie com seu smartphone
- 🔗 **Link válido**: Certifique-se que o link funciona
- 📍 **Posicionamento**: Fica automático no rodapé

### Exportação
- 🖨️ **Qualidade**: PNG em 300 DPI (pronto para imprimir)
- 📄 **Formato**: A4 (210×297mm)
- 💾 **Compatibilidade**: Funciona em qualquer programa

---

## 🎨 Personalização Avançada

### Modificar Cores de um Curso
Abra `script-v3.js` e procure por `coursesData`:

```javascript
administracao: {
    title: 'Técnico em Administração',
    description: 'Gestão e Organização Empresarial',
    primaryColor: '#003d99',    // Azul SENAI
    accentColor: '#ff6b35',     // Laranja
    icon: '📚'
}
```

Altere `primaryColor` e `accentColor` para as cores desejadas.

### Adicionar Novo Curso
1. Em `script-v3.js`, adicione ao objeto `coursesData`:

```javascript
novoCurso: {
    title: 'Nome do Novo Curso',
    description: 'Descrição do curso',
    primaryColor: '#XXXXXX',
    accentColor: '#XXXXXX',
    icon: '🎓'
}
```

2. Em `index-v3.html`, adicione ao select:

```html
<option value="novoCurso">Nome do Novo Curso</option>
```

---

## 🔧 Requisitos Técnicos

- **Navegador**: Chrome, Firefox, Edge, Safari (versões recentes)
- **JavaScript**: Habilitado
- **Conexão**: Internet (para gerar QR codes)
- **Instalação**: Nenhuma necessária

---

## 📊 Comparação: v1 vs v2 vs v3

| Recurso | v1 | v2 | v3 |
|---------|----|----|-----|
| Cabeçalho azul | ❌ | ❌ | ✅ |
| Rodapé azul | ❌ | ❌ | ✅ |
| Foto em destaque | ❌ | ✅ | ✅ |
| Informações à esquerda | ❌ | ❌ | ✅ |
| Overlay de informações | ❌ | ✅ | ✅ |
| Título customizável | ❌ | ✅ | ✅ |
| QR Code | ✅ | ✅ | ✅ |
| 5 campos de informação | ✅ | ✅ | ✅ |
| Exportação PNG | ✅ | ✅ | ✅ |
| Layout profissional | ⭐ | ⭐⭐ | ⭐⭐⭐ |

---

## 🆘 Troubleshooting

### QR Code não aparece
- ✓ Verifique se o link está correto (com https://)
- ✓ Clique novamente em "Gerar QR Code"
- ✓ Recarregue a página (F5)

### Foto não carrega
- ✓ Verifique o tamanho (máximo 5MB)
- ✓ Tente outro formato (JPG, PNG, WebP)
- ✓ Limpe o cache do navegador

### Informações cortadas
- ✓ Reduza o texto para menos de 40 caracteres
- ✓ Use abreviações (ex: "PRES." em vez de "PRESENCIAL")
- ✓ Divida em duas linhas se necessário

### Exportação não funciona
- ✓ Desative bloqueadores de pop-up
- ✓ Tente em outro navegador
- ✓ Verifique se JavaScript está habilitado

---

## 📞 Suporte

Para dúvidas ou sugestões, entre em contato com o SENAI de União da Vitória.

**Versão:** 3.0  
**Data:** Março de 2026  
**Status:** ✅ Pronto para produção  
**Última atualização:** 04/03/2026
