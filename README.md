# Transport

Sistema de rastreamento de transportes desenvolvido com Laravel. O projeto permite o cadastro de pedidos com código de rastreio e consulta automática de status via integração com uma API externa, além de um painel administrativo com autenticação.

## 🔧 Tecnologias utilizadas

<div style="display: flex; gap: 10px; align-items: center;">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" alt="Laravel" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" alt="Bootstrap" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git" width="40" height="40"/>
</div>

- **PHP 8.x**
- **Laravel 10**
- **MySQL**
- **Blade**
- **Bootstrap**
- **Git**

## 📌 Funcionalidades

- Autenticação de administrador
- Cadastro de pedidos com código de rastreio
- Consulta de status via integração com API
- Validação de dados no backend
- Interface simples e funcional

## ▶️ Como executar

```bash
# Clone o repositório
git clone https://github.com/miguel2004silva/transport.git

# Acesse a pasta do projeto
cd transport

# Instale as dependências
composer install

# Copie o arquivo .env de exemplo
cp .env.example .env

# Gere a key da aplicação
php artisan key:generate

# Configure o banco de dados no .env e execute as migrations
php artisan migrate

# Inicie o servidor
php artisan serve
