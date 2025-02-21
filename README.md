# Health App

Este guia fornece instruções sobre como configurar e testar o repositório **Health App** usando Docker.

## Pré-requisitos

Antes de começar, certifique-se de que você possui os seguintes itens instalados em sua máquina:

- [Docker](https://www.docker.com/) (versão 20.10 ou superior)
- [Docker Compose](https://docs.docker.com/compose/) (geralmente incluso na instalação do Docker)
- [Git](https://git-scm.com/) (para clonar o repositório)
- [Node.js](https://nodejs.org/) e npm (para gerenciar pacotes front-end)
- [Composer](https://getcomposer.org/) (para gerenciar dependências do PHP)

## Passo a Passo para Testar o Repositório com Docker

### 1. Clonar o Repositório

Primeiro, clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/mateuskonige/health-app.git
cd health-app
```

### 2. Configurar Variáveis de Ambiente

Exemplo:

```bash
cp .env.example .env
```

Edite o arquivo `.env` com as credenciais e configurações apropriadas.

Isso atualizará automaticamente o arquivo `.env` com uma nova `APP_KEY`.

### 3. Instalar Dependências

Antes de iniciar os contêineres, instale as dependências do projeto.

#### 3.1 Instalar Dependências PHP com Composer

Execute o seguinte comando para instalar as dependências do Laravel:

```bash
composer install
```

#### 3.2 Instalar Dependências Front-end com npm

Se o projeto contiver arquivos front-end, instale os pacotes necessários com:

```bash
npm install
```

### 4. Construir e Executar os Contêineres Docker

Para construir e iniciar os contêineres, execute:

```bash
./vendor/bin/sail up
```

### 5. Gerar a Chave do Aplicativo (APP_KEY)

O Laravel requer uma chave de aplicativo (`APP_KEY`) para criptografia e segurança. Para gerar a chave, execute o seguinte comando **dentro do contêiner** após iniciar o Docker:

```bash
./vendor/bin/sail artisan key:generate
```

### 6. Executar Migrações (Migrations)

Certifique-se de que o banco de dados está em execução.
Execute as migrações com o seguinte comando:

```bash
./vendor/bin/sail artisan migrate
```

Isso criará as tabelas necessárias no banco de dados.

### 7. Executar Seeders (Opcional)

Caso queira popular o banco de dados com dados fictícios, execute:

```bash
./vendor/bin/sail artisan migrate db:seed
```

### 8. Compilar os Arquivos Front-end (Opcional)

Se o projeto tiver uma interface web, compile os arquivos front-end:

```bash
npm run dev
```

Ou para um ambiente de produção:

```bash
npm run build
```

### 9. Acessar o Aplicativo

Após os contêineres estarem em execução, o aplicativo estará disponível no navegador através do endereço:

```
http://localhost
```

### 10. Parar os Contêineres

Para parar os contêineres, use o seguinte comando:

```bash
./vendor/bin/sail down
```

Isso encerrará os contêineres em execução.

---

Feito com ❤️ por [Mateus Reis](https://github.com/mateuskonige).

