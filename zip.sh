#!/bin/bash

THEME_NAME="tutor-alternativa-hub"

THEME_DIR=$(pwd)

BUILD_DIR="/tmp/${THEME_NAME}_build"

ZIP_DIR=$(dirname "$THEME_DIR")
ZIP_FILE="${ZIP_DIR}/${THEME_NAME}.zip"

error_exit() {
    echo "$1" 1>&2
    exit 1
}

if [ -d "$BUILD_DIR" ]; then
    sudo rm -rf "$BUILD_DIR" || error_exit "Falha ao remover o diretório temporário."
fi

mkdir -p "$BUILD_DIR" || error_exit "Falha ao criar o diretório temporário."
chmod 777 "$BUILD_DIR" || error_exit "Falha ao ajustar permissões do diretório temporário."

echo "Instalando dependências..."
npm install || error_exit "Falha ao instalar dependências."

echo "Rodando build de produção..."
npx mix --production || error_exit "Build de produção falhou."

echo "Copiando arquivos do tema..."
rsync -av --exclude='node_modules' --exclude='.git' --exclude='*.zip' --exclude='zip.sh' "$THEME_DIR/" "$BUILD_DIR/" || error_exit "Falha ao copiar arquivos do tema."

echo "Criando arquivo zip..."
cd "$BUILD_DIR" || error_exit "Falha ao mudar para o diretório temporário."
zip -r "$ZIP_FILE" ./* || error_exit "Falha ao criar o arquivo zip."

cd "$THEME_DIR" || error_exit "Falha ao voltar para o diretório do tema."

sudo rm -rf "$BUILD_DIR" || error_exit "Falha ao remover o diretório temporário."

echo "Build e arquivo zip criados com sucesso:"
echo "$ZIP_FILE"
