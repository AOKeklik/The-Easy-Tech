# The-Easy-Tech

## Overview
This project is a web application built with a **Next.js** frontend and a **Laravel** backend. It utilizes **Sass** for styling and **Tailwind CSS** for utility-first design.

## Tech Stack
- **Frontend**: Next.js, Tailwind CSS, Sass
- **Backend**: Laravel
- **Database**: MySQL
- **API Communication**: RESTful API

## Features
- [✔] User authentication
- [✔] Dynamic dashboard
- [✔] API integration

## Installation
### Prerequisites
Ensure you have the following installed on your system:
- Node.js & npm (or Yarn)
- PHP & Composer
- MySQL

### Setup
#### Clone the repository
```bash
git clone https://github.com/AOKeklik/The-Easy-Tech
cd The-Easy-Tech
```

#### Backend Setup (Laravel)
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

#### Frontend Setup (Next.js)
```bash
cd frontend
npm install # or yarn install
npm run dev # or yarn dev
```

## Environment Variables
Create a `.env` file in the root directories of both backend and frontend. The important environment variables include:
```
# Backend (Laravel)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=the_easy_tech
DB_USERNAME=root
DB_PASSWORD=

# Frontend (Next.js)
NEXT_PUBLIC_API_URL=http://localhost:8000/api
```

## Usage
Start the Laravel backend:
```bash
php artisan serve
```
Start the Next.js frontend:
```bash
npm run dev
```
Access the application at `http://localhost:3000`.

## Contributing
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Added new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a Pull Request.

## License
This project is licensed under the MIT License.

## Contact
For any issues or inquiries, reach out to **Me** at ao_keklik@hotmail.com.
