# Health App - Testando o Repositório com Docker

Este guia fornece instruções sobre como configurar e testar o repositório **Health App** usando Docker.

## Pré-requisitos

Antes de começar, certifique-se de que você possui os seguintes itens instalados em sua máquina:

- [Docker](https://www.docker.com/) (versão 20.10 ou superior)
- [Docker Compose](https://docs.docker.com/compose/) (geralmente incluso na instalação do Docker)
- [Git](https://git-scm.com/) (para clonar o repositório)

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

### 3. Gerar a Chave do Aplicativo (APP_KEY)

O Laravel requer uma chave de aplicativo (`APP_KEY`) para criptografia e segurança. Para gerar a chave, execute o seguinte comando **dentro do contêiner** após iniciar o Docker (veja o próximo passo):

```bash
./vendor/bin/sail artisan key:generate
```

Isso atualizará automaticamente o arquivo `.env` com uma nova `APP_KEY`.

### 4. Construir e Executar os Contêineres Docker

Para construir e iniciar os contêineres, execute:

```bash
./vendor/bin/sail up
```

### 5. Acessar o Aplicativo

Após os contêineres estarem em execução, o aplicativo estará disponível no navegador através do endereço:

```
http://localhost
```

### 6. Parar os Contêineres

Para parar os contêineres, use o seguinte comando:

```bash
./vendor/bin/sail down
```

Isso encerrará e removerá os contêineres em execução.

---

Feito com ❤️ por [Mateus Reis](https://github.com/mateuskonige).


