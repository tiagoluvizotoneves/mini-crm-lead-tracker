# 📝 CHANGELOG

Todas as alterações rastreáveis no projeto Mini CRM Lead Tracker.

---

## [Dia 6] - 2025-07-12

### Adicionado

-   Login via Laravel Sanctum (`/api/v1/login`)
-   Middleware `EnsureCompanyIsValid` para multitenancy
-   Middleware `role:{slug}` para controle de acesso por perfil
-   Seeder de roles, companies e usuários de teste
-   Campo `is_active` com migration incremental
-   Swagger funcional com autenticação via Bearer Token
-   Atualização do README com instruções de autenticação e dados de seed

### Corrigido

-   Importação incorreta de `HasApiTokens` no `User.php`

---

## [Dia 5] - 2025-07-11

### Adicionado

-   CRUD de estágios do Kanban (`KanbanStage`)
-   Endpoint para mover lead entre estágios
-   Visualização de histórico via `ActivityLog`

---
