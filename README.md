# LMC Store

## English

LMC Store is e-commerce application built with Laravel (PHP) for the backend and Livewire (for dynamic UI) + Tailwind CSS (for styling) on the frontend.

### Features

- User authentication
- Dynamic and responsive interface (Tailwind CSS)
- Real-time updates with Livewire
- Sorting and filtering (Spatie Eloquent Sortable)
- Localization (PT-BR support)

### Technologies

- **Backend:** Laravel 12, PHP 8.2, Livewire, Spatie Eloquent Sortable
- **Frontend:** Vite, Tailwind CSS, Axios
- **Dev Tools:** PHPUnit, Pint, Faker, Sail (Docker), Mockery

### Getting Started

1. **Clone the repository:**
   ```sh
   git clone https://github.com/yourusername/lmc_store.git
   cd lmc_store
   ```

2. **Install backend dependencies:**
   ```sh
   composer install
   ```

3. **Install frontend dependencies:**
   ```sh
   npm install
   ```

4. **Copy environment file and generate app key:**

   Copy the example environment file and generate the application key:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

   > **Attention:**  
   > - Configure the database connection variables (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) according to your local environment.
   > - For email sending, fill in `MAIL_USERNAME` and `MAIL_PASSWORD` with your credentials from [Mailtrap](https://mailtrap.io/) or another SMTP service.
   > - Make other adjustments as needed for your environment.

5. **Run migrations:**
   ```sh
   php artisan migrate
   ```

6. **Seed the database:**
   ```sh
   php artisan db:seed
   ```

7. **Start the development servers:**
   ```sh
   npm run dev
   php artisan serve
   ```

8. **Access the app:**  
   Open [http://localhost:8000](http://localhost:8000) in your browser.


9. **Default admin credentials:**  
   - Email: `admin@admin.com`  
   - Password: `123456`

---

## Português

LMC Store é uma aplicação de e-commerce construída com Laravel (PHP) no backend e Livewire (para interfaces dinâmicas) + Tailwind CSS (para estilização) no frontend.

### Funcionalidades

- Autenticação de usuários
- Interface dinâmica e responsiva (Tailwind CSS)
- Atualizações em tempo real com Livewire
- Ordenação e filtros (Spatie Eloquent Sortable)
- Suporte à localização (PT-BR)

### Tecnologias

- **Backend:** Laravel 12, PHP 8.2, Livewire, Spatie Eloquent Sortable
- **Frontend:** Vite, Tailwind CSS, Axios
- **Ferramentas de Dev:** PHPUnit, Pint, Faker, Sail (Docker), Mockery

### Como começar

1. **Clone o repositório:**
   ```sh
   git clone https://github.com/seunomeusuario/lmc_store.git
   cd lmc_store
   ```

2. **Instale as dependências do backend:**
   ```sh
   composer install
   ```

3. **Instale as dependências do frontend:**
   ```sh
   npm install
   ```

4. **Configure o arquivo de ambiente (.env):**

   Copie o arquivo de exemplo e gere a chave da aplicação:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

   > **Atenção:**  
   > - Configure as variáveis de conexão com o banco de dados (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) conforme seu ambiente local.
   > - Para envio de e-mails, preencha `MAIL_USERNAME` e `MAIL_PASSWORD` com suas credenciais do [Mailtrap](https://mailtrap.io/) ou outro serviço SMTP.
   > - Outros ajustes podem ser feitos conforme necessário para seu ambiente.

5. **Rode as migrações:**
   ```sh
   php artisan migrate
   ```

6. **Alimente o banco de dados:**
   ```sh
   php artisan db:seed
   ```

7. **Inicie os servidores de desenvolvimento:**
   ```sh
   npm run dev
   php artisan serve
   ```

8. **Acesse a aplicação:**  
   Abra [http://localhost:8000](http://localhost:8000) no seu navegador.
   

9. **Credenciais padrão do administrador:**  
   - Email: `admin@admin.com`  
   - Senha: `123456`

---
