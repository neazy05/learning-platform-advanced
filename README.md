# Learning Platform — Course & Assignment Management

A role-based learning platform built with Laravel and Blade templates. The application was developed as a personal project and includes workflows for managing courses, lectures, assignments, and users, plus real-time chat functionality.

## Main features

- Authentication and user profile pages
- Role-oriented workflows for administrators, tutors, and students
- Course and category management
- Lecture creation and course content pages
- Assignment submission and attachment handling
- Course enrollment relationships
- Global messaging with Laravel broadcasting / WebSockets integration
- Admin screens for managing users, tutors, and course categories

> This repository documents an older project. It has not yet been upgraded to a currently supported Laravel/PHP stack, and it has not been verified as production-ready. Some integrations may require credentials and local configuration.

## Technology stack

- **Backend:** PHP, Laravel 7.x (see `composer.json`)
- **Views/UI:** Laravel Blade, HTML, CSS, JavaScript, Bootstrap
- **Frontend build:** Laravel Mix / Webpack, Vue 2 dependencies
- **Database:** relational database supported by Laravel; migrations define users, roles, courses, categories, lectures, assignments, attachments, and enrollments
- **Real-time messaging:** Laravel WebSockets, Laravel Echo, Pusher-compatible client

## Project structure

```text
app/                    Models, controllers, events, middleware
config/                 Laravel configuration
database/migrations/    Database schema migrations
public/                 Public assets and entry point
resources/views/        Blade templates
routes/web.php          Web routes
routes/channels.php     Broadcast channel definitions
```

## Local setup (legacy project)

This project uses older dependency versions. Run it in a compatible, isolated development environment and do not expose it publicly without reviewing dependencies and authorization rules.

1. Install a PHP version compatible with the Laravel version in `composer.json`, Composer, Node.js/npm compatible with the lockfile, and a database supported by Laravel.
2. Clone the repository and install dependencies:

   ```bash
   composer install
   npm install
   ```

3. Create a local environment file and generate an application key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   On Windows Command Prompt, use `copy .env.example .env` instead of `cp`.

4. Update `.env` with local database settings. Never commit `.env` or credentials.
5. Create the database and run migrations:

   ```bash
   php artisan migrate
   ```

6. Build frontend assets and start the local server:

   ```bash
   npm run development
   php artisan serve
   ```

Real-time chat may require additional WebSocket/Pusher configuration from the relevant files in `config/` and `.env.example`.

## Security notes

- Never commit `.env`, production credentials, API keys, database dumps, or user uploads.
- Review authorization checks and file-upload validation before deploying.
- This is a portfolio/learning project, not a production deployment template.

## Project status

The source is provided for portfolio review. Dependencies have intentionally been excluded from the archive; install them from `composer.lock` and `package-lock.json` as part of local setup. The project has not been freshly installed or run in this environment.
