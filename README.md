# API de Colaboradores

Esta é uma API RESTful desenvolvida em Laravel para um sistema de gerenciamento de colaboradores.

## Requisitos

-   Docker
-   Docker Compose

## Configuração do Projeto

1. Clone o repositório:

```bash
git clone https://github.com/NEVI0/bruning-test-backend.git
cd bruning-test-backend
```

2. Configure as variáveis de ambiente:

```bash
cp .env.example .env
```

3. Inicie os containers Docker:

```bash
docker-compose up -d
```

4. Instale as dependências do projeto:

```bash
docker-compose exec app composer install
```

5. Gere a chave da aplicação:

```bash
docker-compose exec app php artisan key:generate
```

6. Execute as migrações do banco de dados:

```bash
docker-compose exec app php artisan migrate
```

## Executando o Projeto

O projeto estará disponível em `http://localhost:8000`

### Endpoints da API

#### Listar Colaboradores

-   **GET** `/api/employee`
-   Retorna a lista de todos os colaboradores

#### Criar Colaborador

-   **POST** `/api/employee`
-   Body:

```json
{
    "id": "string",
    "name": "string",
    "nickname": "string",
    "father": "string",
    "mother": "string",
    "document": "string",
    "birthdate": "string",
    "jobDate": "string"
}
```

#### Atualizar Colaborador

-   **PUT** `/api/employee/{id}`
-   Body:

```json
{
    "name": "string",
    "nickname": "string",
    "father": "string",
    "mother": "string",
    "document": "string",
    "birthdate": "string",
    "jobDate": "string"
}
```

#### Deletar Colaborador

-   **DELETE** `/api/employee/{id}`

## Estrutura do Projeto

-   `app/Http/Controllers/EmployeeController.php` - Controlador principal da API
-   `routes/api.php` - Definição das rotas da API
-   `database/migrations` - Migrações do banco de dados

## Banco de Dados

O projeto utiliza PostgreSQL como banco de dados. As configurações de conexão podem ser encontradas no arquivo `.env`.
