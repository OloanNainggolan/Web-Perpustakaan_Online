# 📚 BookZone - Platform Review Buku

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
</p>

<p align="center">
  <strong>Platform modern untuk review dan berbagi informasi buku dengan komunitas pecinta literasi</strong>
</p>

---

## 🎯 Tentang BookZone

BookZone adalah aplikasi web modern yang dibangun dengan Laravel 11 untuk memudahkan pecinta buku dalam berbagi review, mengelola koleksi buku, dan berinteraksi dengan komunitas pembaca lainnya.

## ✨ Fitur Utama

### 👤 Autentikasi & Autorisasi
- ✅ Sistem Login & Register yang aman
- ✅ Role-based Access Control (Admin & User)
- ✅ Session Management
- ✅ Password Hashing dengan Bcrypt

### 📚 Manajemen Buku (Admin Only)
- ✅ Create, Read, Update, Delete (CRUD) Buku
- ✅ Upload gambar cover buku
- ✅ Validasi form yang lengkap
- ✅ Kategorisasi berdasarkan genre
- ✅ Manajemen stok buku

### 🎭 Manajemen Genre (Admin Only)
- ✅ CRUD Genre buku
- ✅ Deskripsi genre yang detail
- ✅ Relasi genre dengan buku

### 💬 Sistem Komentar & Review
- ✅ User dapat memberikan komentar pada buku
- ✅ Display nama user dan timestamp
- ✅ Real-time comment updates
- ✅ User authentication required

### 👤 Profil User
- ✅ Create & Update profil
- ✅ Informasi umur dan alamat
- ✅ Terintegrasi dengan user account

### 🎨 User Interface
- ✅ Responsive Design (Mobile-first)
- ✅ Modern gradient colors
- ✅ Smooth animations & transitions
- ✅ Bootstrap Icons integration
- ✅ Professional card layouts
- ✅ Intuitive navigation

## 🛠️ Teknologi yang Digunakan

### Backend
- **Laravel 11** - PHP Framework
- **PHP 8.4** - Programming Language
- **MySQL 8.0** - Database Management
- **Eloquent ORM** - Database Operations

### Frontend
- **Bootstrap 5** - CSS Framework
- **Bootstrap Icons** - Icon Library
- **AOS** - Animation On Scroll
- **Blade Template** - Laravel Templating Engine

### Tools
- **Composer** - PHP Dependency Manager
- **NPM** - Node Package Manager
- **Git** - Version Control

## 📋 Prasyarat

Pastikan sistem Anda sudah terinstall:

- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM
- Git

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone <repository-url>
cd reviewbook-13
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Konfigurasi Environment

```bash
# Copy file .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=review_books
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi & Seeder

```bash
# Jalankan migrasi dan seeder
php artisan migrate:fresh --seed
```

### 6. Buat Storage Link

```bash
php artisan storage:link
```

### 7. Jalankan Aplikasi

```bash
# Development server
php artisan serve

# Akses aplikasi di: http://127.0.0.1:8000
```

## 🔑 Kredensial Login

### Admin Account
```
Email    : admin@bookzone.com
Password : admin123
Role     : admin
```

### User Account
```
Email    : user@bookzone.com
Password : user123
Role     : user
```

## 📁 Struktur Database

### Tables

1. **users**
   - Menyimpan data user (admin & regular user)
   - Fields: id, name, email, password, role

2. **profiles**
   - Menyimpan informasi profil user
   - Fields: id, user_id, age, address

3. **genres**
   - Menyimpan kategori/genre buku
   - Fields: id, name, description

4. **books**
   - Menyimpan data buku
   - Fields: id, title, summary, stok, genres_id, image

5. **comments**
   - Menyimpan komentar user pada buku
   - Fields: id, comments, user_id, book_id

6. **sessions**
   - Mengelola session user
   - Otomatis dibuat oleh Laravel

## 🎨 Fitur UI/UX

### Design System
- **Color Palette**: 
  - Primary: Green (#198754)
  - Secondary: Turquoise (#20c997)
  - Gradient: Linear gradient dari green ke turquoise

### Components
- **Cards**: Shadow-lg dengan rounded-4 corners
- **Buttons**: Gradient dengan hover effects
- **Forms**: Modern dengan icon labels
- **Navigation**: Sticky header dengan dropdown menu
- **Footer**: Multi-column dengan social links

### Responsiveness
- Mobile-first approach
- Breakpoints: sm, md, lg, xl
- Collapsible mobile navigation
- Responsive tables dan cards

## 📖 Cara Penggunaan

### Sebagai User
1. Register akun baru atau login
2. Browse koleksi buku yang tersedia
3. Baca detail dan review buku
4. Berikan komentar pada buku
5. Update profil pribadi

### Sebagai Admin
1. Login dengan akun admin
2. Kelola data buku (tambah, edit, hapus)
3. Kelola genre buku
4. Monitor komentar user
5. Manage user accounts

## 🔒 Keamanan

- ✅ Password hashing dengan Bcrypt
- ✅ CSRF Protection
- ✅ XSS Prevention
- ✅ SQL Injection Prevention (Eloquent ORM)
- ✅ Authentication Middleware
- ✅ Role-based Authorization
- ✅ Form Validation
- ✅ File Upload Validation

## 🧪 Testing

```bash
# Jalankan test
php artisan test
```

## 📝 API Routes

### Public Routes
- `GET /` - Welcome page
- `GET /welcome` - Dashboard
- `GET /books` - Daftar buku
- `GET /books/{id}` - Detail buku
- `GET /genres` - Daftar genre
- `GET /genres/{id}` - Detail genre

### Auth Routes
- `GET /login` - Halaman login
- `POST /login` - Proses login
- `GET /register` - Halaman register
- `POST /register` - Proses register
- `POST /logout` - Logout

### Protected Routes (Auth Required)
- `GET /profile` - Halaman profil
- `POST /profile` - Create profil
- `PUT /profile/{id}` - Update profil
- `POST /comment/{book_id}` - Tambah komentar

### Admin Only Routes
- `GET /books/create` - Form tambah buku
- `POST /books/store` - Simpan buku baru
- `GET /books/{id}/edit` - Form edit buku
- `PUT /books/{id}` - Update buku
- `DELETE /books/{id}` - Hapus buku
- `GET /genres/create` - Form tambah genre
- `POST /genres/store` - Simpan genre baru
- `GET /genres/{id}/edit` - Form edit genre
- `PUT /genres/{id}` - Update genre
- `DELETE /genres/{id}` - Hapus genre

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

**BookZone Team**

---

<p align="center">
  Made with ❤️ for book lovers
  <br>
  © 2025 BookZone. All Rights Reserved.
</p>
