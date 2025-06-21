# 🚀 Mini CRM Lead Tracker

Um CRM simples e objetivo para gestão de leads.  
Desenvolvido com foco em clean code, escalabilidade, documentação e boas práticas.

![Laravel](https://img.shields.io/badge/framework-laravel-red)  
![Build](https://img.shields.io/badge/build-passing-brightgreen)  
![Tests](https://img.shields.io/badge/tests-passing-brightgreen)  
![License](https://img.shields.io/badge/license-MIT-blue)  
![Docs](https://img.shields.io/badge/docs-Swagger-brightgreen)

---

## 📚 Documentação

A documentação da API está disponível via Swagger:  
🔗 [Documentação Swagger](./docs/swagger.yaml)

---

## 🔧 Tecnologias Utilizadas
- Laravel (PHP 8.x)
- MySQL
- Swagger (OpenAPI)
- Futuramente: Vue.js 3 + Vite (front-end) e Python (automações)

---

## 🚀 Como rodar o projeto localmente

```bash
git clone https://github.com/tiagoluvizotoneves/mini-crm-lead-tracker.git
cd mini-crm-lead-tracker

# Instale as dependências
composer install

# Copie o arquivo de ambiente
cp .env.example .env

# Gere a key do projeto
php artisan key:generate

# Rode as migrations
php artisan migrate

# Inicie o servidor
php artisan serve

---

## 🚫 Importante

Este projeto é distribuído sob uma licença personalizada de **uso exclusivamente educacional e pessoal**.  
**É proibido qualquer uso comercial, revenda, SaaS ou qualquer forma de monetização.**  

Leia os detalhes no arquivo [LICENSE](./LICENSE).
