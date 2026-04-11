# 🎨 Editor de Banners SENAI v2 - Guia de Uso

## ✨ Novidades da Versão 2

A versão 2 foi completamente redesenhada com **melhor aproveitamento de espaço**, seguindo o modelo que você criou no Photoshop!

### Principais Melhorias:

✅ **Foto em Destaque** - A imagem de fundo ocupa toda a área do banner
✅ **Overlay de Informações** - Caixa azul semi-transparente com as 5 informações
✅ **Layout Otimizado** - Melhor distribuição de elementos (título, info, QR code, CTA)
✅ **Novo Curso** - Auxiliar de Informática adicionado
✅ **Título Customizável** - Edite "GRATUITO" ou qualquer outro texto
✅ **Design Profissional** - Segue a identidade visual do SENAI

---

## 🚀 Como Usar

### 1. Abrir o Editor
Abra o arquivo **`index-v2.html`** em um navegador web.

### 2. Selecionar o Curso
Escolha entre:
- Técnico em Administração
- Desenvolvimento de Sistemas
- Eletromecânica
- Manutenção Automotiva
- **Auxiliar de Informática** (novo!)

### 3. Adicionar Foto de Fundo
- Clique em "Escolher Arquivo" ou arraste uma imagem
- A foto ocupará toda a área do banner
- Recomendação: 1240x1754px para melhor resultado

### 4. Customizar Título
- Digite "GRATUITO" ou outro texto no campo "Título"
- Aparecerá em destaque no topo do banner

### 5. Preencher as 5 Informações
Cada campo tem um ícone representativo:
- ⏰ Informação 1 (ex: Início 02/02/2026 - 160 horas)
- 📍 Informação 2 (ex: Modalidade: PRESENCIAL 13:30-17:30)
- 👤 Informação 3 (ex: Requisitos: 14 anos completos)
- 📊 Informação 4 (ex: Ensino fundamental incompleto)
- 📚 Informação 5 (ex: Contato: (42) 3521-3910)

### 6. Gerar QR Code
- Insira um link (ex: https://www.senaipr.org.br)
- Clique em "Gerar QR Code"
- O QR code aparecerá no canto inferior esquerdo

### 7. Exportar como PNG
- Clique em "Exportar como PNG"
- O banner será baixado em alta qualidade

---

## 📐 Estrutura do Layout v2

```
┌─────────────────────────────────────┐
│         GRATUITO                    │
│  Auxiliar de Informática            │
│                                     │
│  [FOTO DE FUNDO - DESTAQUE]        │
│                                     │
│        ┌─────────────────────┐      │
│        │ ⏰ Informação 1     │      │
│        │ 📍 Informação 2     │      │
│        │ 👤 Informação 3     │      │
│        │ 📊 Informação 4     │      │
│        │ 📚 Informação 5     │      │
│        └─────────────────────┘      │
│                                     │
│ ┌──────┐                 ┌────────┐ │
│ │ QR   │                 │INSCRIÇÕES
│ │CODE  │                 │ABERTAS │ │
│ └──────┘                 └────────┘ │
│                                     │
│                    Sistema Fiep     │
│                    SENAI            │
│                    União da Vitória │
└─────────────────────────────────────┘
```

---

## 🎨 Personalização Avançada

### Modificar Cores de um Curso
Abra `script-v2.js` e procure por `coursesData`:

```javascript
informatica: {
    title: 'Auxiliar de Informática',
    primaryColor: '#003d99',    // Azul primário
    accentColor: '#ff6b35',     // Laranja destaque
    icon: '💾'
}
```

### Adicionar Novo Curso
1. Em `script-v2.js`, adicione ao objeto `coursesData`:

```javascript
novoCurso: {
    title: 'Nome do Curso',
    description: 'Descrição',
    primaryColor: '#XXXXXX',
    accentColor: '#XXXXXX',
    icon: '🎓'
}
```

2. Em `index-v2.html`, adicione ao select:

```html
<option value="novoCurso">Nome do Curso</option>
```

---

## 💡 Dicas Profissionais

### Foto de Fundo
- **Melhor resultado**: Imagens com pessoas, laboratórios, computadores
- **Evitar**: Imagens muito claras ou com muito contraste
- **Tamanho ideal**: 1240x1754px (proporção A4)

### Informações
- **Seja conciso**: Máximo 40 caracteres por linha
- **Use ícones**: Cada informação tem um ícone representativo
- **Ordem lógica**: Coloque informações importantes primeiro

### QR Code
- **Teste antes**: Escaneie com seu smartphone
- **Link válido**: Certifique-se que o link funciona
- **Posicionamento**: Fica no canto inferior esquerdo

### Exportação
- **Qualidade**: PNG em 1240x1754px (300 DPI)
- **Impressão**: Pronto para imprimir em A4
- **Compatibilidade**: Funciona em qualquer programa

---

## 🔧 Requisitos Técnicos

- Navegador moderno (Chrome, Firefox, Edge, Safari)
- JavaScript habilitado
- Conexão com internet (para gerar QR codes)
- Nenhuma instalação necessária

---

## 📝 Comparação: v1 vs v2

| Recurso | v1 | v2 |
|---------|----|----|
| Foto em destaque | ❌ | ✅ |
| Overlay de informações | ❌ | ✅ |
| Melhor aproveitamento de espaço | ❌ | ✅ |
| Título customizável | ❌ | ✅ |
| Curso Auxiliar de Informática | ❌ | ✅ |
| QR Code | ✅ | ✅ |
| 5 campos de informação | ✅ | ✅ |
| Exportação PNG | ✅ | ✅ |

---

## 🆘 Troubleshooting

### QR Code não aparece
- Verifique se o link está correto
- Clique novamente em "Gerar QR Code"
- Recarregue a página (F5)

### Foto não carrega
- Verifique o tamanho do arquivo (máx 5MB)
- Tente outro formato (JPG, PNG, WebP)
- Limpe o cache do navegador

### Exportação não funciona
- Desative bloqueadores de pop-up
- Tente em outro navegador
- Verifique se JavaScript está habilitado

---

## 📞 Suporte

Para dúvidas ou sugestões, entre em contato com o SENAI de União da Vitória.

**Versão:** 2.0  
**Data:** Março de 2026  
**Status:** ✅ Pronto para produção
