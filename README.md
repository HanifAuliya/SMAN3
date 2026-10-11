# SMAN 3 Barabai — School Website

The official-style website for SMAN 3 Barabai with a public profile site and an admin dashboard for managing content.

## Features

**Public site**
- Homepage with latest news, and individual news pages
- School profile: identity, history, vision & mission, organizational structure, staff, code of conduct
- Academics: curriculum and academic calendar
- Administration: SOPs and e-books
- Visitor counter

**Admin dashboard**
- News management (create, edit, delete, categories)
- School data management
- Profile management

## Tech

Laravel 11, Laravel Breeze, Tailwind CSS, Alpine.js, MySQL.

## Installation

```bash
git clone https://github.com/HanifAuliya/SMAN3.git
cd SMAN3
composer install
npm install
cp .env.example .env
php artisan key:generate
# set DB_* in .env
php artisan migrate --seed
php artisan storage:link
npm run dev
php artisan serve
```
