# 🚚 Transport

Sistema simples de rastreamento de transportes, desenvolvido com foco em boas práticas usando Laravel, PHP e MySQL. O projeto inclui autenticação administrativa, integração com APIs externas e validação robusta de dados.

## ⚙️ Tecnologias utilizadas

- PHP 8.x
- Laravel 10
- MySQL
- Blade (Laravel Views)
- Bootstrap (interface básica)
- API de rastreio de transportadoras

## 🧠 Funcionalidades

- Autenticação de usuário (painel administrativo)
- Cadastro de pedidos com código de rastreio
- Consulta automática dos dados via integração com API externa
- Validação de campos com mensagens de erro personalizadas
- Interface simples e funcional para gerenciamento

## 🛠️ Como rodar o projeto

```bash
# Clone o repositório
git clone https://github.com/miguel2004silva/transport.git

# Acesse o diretório
cd transport

# Instale as dependências
composer install

# Copie o arquivo .env de exemplo e configure suas variáveis
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Configure o banco de dados no .env e rode as migrations
php artisan migrate

# Rode o servidor local
php artisan serve
