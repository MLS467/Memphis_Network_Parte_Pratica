# Sistema de Gerenciamento de Produtos

Sistema para gerenciamento de produtos desenvolvido em Laravel 12 com interface moderna usando Bootstrap 5.

## Funcionalidades

-   CRUD completo de produtos (criar, listar, editar, excluir)
-   Upload de imagens para produtos
-   Validação de formulários
-   Interface responsiva
-   Sistema de alertas
-   Preview de imagens

## Requisitos

-   PHP 8.2 ou superior
-   Composer
-   MySQL ou PostgreSQL
-   Servidor web (Apache/Nginx) ou PHP built-in server

## Instalação

### 1. Preparar o ambiente

```bash
# Navegar para o diretório do projeto
cd desafio_memphis_network

# Instalar dependências PHP
composer install

```

### 2. Configurar ambiente

```bash
# Copiar arquivo de configuração
copy .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### 3. Configurar banco de dados

Editar o arquivo `.env` com suas configurações de banco:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Preparar banco de dados

```bash
# Executar migrações
php artisan migrate

# Popular com dados de exemplo (opcional)
php artisan db:seed --class=productsSeeder
```

### 5. Configurar storage

```bash
# Criar link simbólico para upload de imagens
php artisan storage:link
```

### 6. Executar aplicação

```bash
# Iniciar servidor de desenvolvimento
php artisan serve
```

A aplicação estará disponível em: http://localhost:8000

## Estrutura do projeto

```
app/Http/Controllers/Products/  # Controladores do sistema
app/Http/Requests/             # Validações de formulário
app/Http/Service/              # Serviços auxiliares
app/Models/                    # Models do banco de dados
resources/views/               # Templates Blade
resources/views/components/    # Componentes reutilizáveis
database/migrations/           # Migrações do banco
database/seeders/              # Populadores de dados
public/assets/                 # Arquivos estáticos
storage/app/public/photos/     # Upload de imagens
```

## Como usar

### Acessar sistema

-   Abra http://localhost:8000 no navegador
-   Será redirecionado para a lista de produtos

### Gerenciar produtos

-   Clique em "novo produto" para adicionar
-   Preencha nome, preço, descrição e imagem
-   Use os botões "Editar" e "Excluir" para gerenciar

### Upload de imagens

-   Selecione arquivo de imagem no formulário
-   Preview será exibido automaticamente
-   Formatos aceitos: PNG, JPG, JPEG, GIF

## Rotas disponíveis

```
GET     /                       # Redireciona para lista de produtos
GET     /products               # Lista todos os produtos
GET     /products/create        # Formulário para novo produto
POST    /products               # Salvar novo produto
GET     /products/{id}          # Detalhes do produto
GET     /products/{id}/edit     # Formulário para editar
PUT     /products/{id}          # Atualizar produto
GET     /products/{id}/confirm-delete  # Confirmação de exclusão
DELETE  /products/{id}          # Excluir produto
```

## Comandos úteis

```bash
# Limpar cache da aplicação
php artisan cache:clear

# Limpar cache de configuração
php artisan config:clear

# Limpar cache de views
php artisan view:clear

# Recriar banco de dados (apaga todos os dados)
php artisan migrate:fresh --seed

# Ver todas as rotas
php artisan route:list
```

## Solução de problemas

**Erro ao fazer upload de imagem:**

```bash
php artisan storage:link
```

**Erro de permissão:**

```bash
# Windows (no PowerShell como administrador)
icacls storage /grant Everyone:F /T
icacls bootstrap/cache /grant Everyone:F /T

# Linux/Mac
chmod -R 775 storage/ bootstrap/cache/
```

**Imagens não aparecem:**

-   Verificar se existe a pasta public/storage
-   Executar novamente: php artisan storage:link

**Erro 500 interno:**

-   Verificar logs em storage/logs/laravel.log
-   Verificar configurações do .env
-   Executar: php artisan config:cache

## Tecnologias utilizadas

-   Laravel 12
-   PHP 8.2+
-   Bootstrap 5
-   MySQL
-   Vite (build assets)
-   Blade Templates

Edite o arquivo `.env` com suas configurações:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5. Execute as Migrações

```bash
# Criar tabelas
php artisan migrate

# Popular com dados de exemplo (opcional)
php artisan db:seed
```

### 6. Configure o Storage

```bash
# Criar link simbólico para uploads
php artisan storage:link
```

### 7. Inicie o Servidor

```bash
# Terminal 1 - Servidor Laravel
php artisan serve

```

## 🌐 Acesso

Abra seu navegador em: **http://localhost:8000**

## 📁 Estrutura Principal

```
app/
├── Http/Controllers/Products/    # Controllers do sistema
├── Http/Requests/               # Validações de formulário
├── Http/Service/                # Serviços auxiliares
└── Models/                      # Models Eloquent

resources/views/
├── components/                  # Componentes Blade
│   ├── alert/                  # Alertas do sistema
│   ├── form/                   # Formulários
│   └── home/                   # Componentes da home
└── [páginas principais]

public/assets/                   # Assets estáticos
storage/app/public/photos/       # Upload de imagens
```

## 🛠️ Funcionalidades

### Gerenciamento de Produtos

-   **Listar** todos os produtos
-   **Criar** novo produto com imagem
-   **Editar** produto existente
-   **Excluir** produto com confirmação
-   **Visualizar** detalhes do produto

### Sistema de Upload

-   Upload de imagens para produtos
-   Preview automático das imagens
-   Validação de formatos (PNG, JPG, JPEG, GIF)
-   Fallback para imagem padrão

## 🎨 Design System

-   **Cores Principais:** #6366f1, #8b5cf6
-   **Efeitos:** Glassmorphism e gradientes
-   **Tipografia:** Bootstrap 5 padrão
-   **Componentes:** Cards, formulários e alertas modernos

## 🔧 Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco (cuidado!)
php artisan migrate:fresh --seed

# Verificar rotas
php artisan route:list
```

## 📝 Observações

-   As imagens são armazenadas em `storage/app/public/photos/`
-   O sistema usa criptografia para IDs nas URLs
-   Validação completa em todos os formulários
-   Interface otimizada para mobile e desktop

## 🐛 Problemas Comuns

**Erro 500 ao fazer upload:**

```bash
php artisan storage:link
chmod -R 755 storage/
```

**Imagens não aparecem:**

```bash
php artisan storage:link
```

**Erro de permissão:**

```bash
chmod -R 775 storage/ bootstrap/cache/
```

---

**Desenvolvido com Laravel 11 + Bootstrap 5**
