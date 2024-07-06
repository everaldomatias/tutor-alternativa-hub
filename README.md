# Tema WordPress - Tutor Alternativa Hub

Este tema WordPress utiliza Laravel Mix para compilar SCSS e gerenciar assets. Siga as instruções abaixo para configurar o ambiente de desenvolvimento e começar a trabalhar com SCSS.

## Requisitos

- Node.js (versão LTS recomendada)
- npm (geralmente vem com o Node.js)
- WordPress instalado e configurado

## Instalação

1. Instale as dependências do projeto:

```bash
npm install
```

## Estrutura do Diretório

A estrutura do diretório do tema é a seguinte:

```
tutor-alternativa-hub/
│
├── src/
│   ├── scss/
│   │   └── style.scss
│   └── js/
│       └── main.js
│
├── dist/
│   └── (arquivos compilados serão gerados aqui)
│
├── webpack.mix.js
├── package.json
├── functions.php
└── style.css
```

## Scripts npm

### Desenvolvimento

Para compilar os arquivos e assistir as mudanças durante o desenvolvimento, use:

```bash
npm run dev
```

### Gerando o zip com os assets compilados

Para o zip do tema, use o script `zip.sh`:

Torne o arquivo executável com o comando:

```bash
sudo chmod +x zip.sh
```

Na raiz do tem,rode o comando:

```bash
sudo ./zip.sh
```

## Uso do SCSS

Coloque seus arquivos SCSS no diretório `src/scss/`. O arquivo principal é `style.scss`. Você pode importar outros arquivos SCSS neste arquivo principal.

Exemplo de importação no `style.scss`:

```scss
@import "partials/_variables";
@import "partials/_mixins";
@import "partials/_reset";

// Seus estilos
body {
  font-family: 'Arial', sans-serif;
}
```
