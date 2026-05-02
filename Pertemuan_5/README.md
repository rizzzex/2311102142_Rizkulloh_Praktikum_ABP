# 🏪 Inventory Management System - Pak Cokomi & Mas Wowo

Tugas Praktikum ABP Pertemuan 5. Sistem Informasi Inventaris Toko menggunakan Laravel, Breeze, dan MySQL.

## ✨ Fitur Utama
- **Authentication**: Menggunakan Laravel Breeze (Login, Register, Logout).
- **Dashboard**: Statistik ringkasan (Total Produk, Nilai Inventaris, Stok Rendah).
- **CRUD Produk**:
  - **Daftar**: Tabel data premium dengan hover effect.
  - **Tambah**: Form input dengan validasi.
  - **Edit**: Ubah data produk yang sudah ada.
  - **Hapus**: Konfirmasi modal menggunakan Alpine.js sebelum penghapusan.
- **Seeding**: Data otomatis menggunakan Factory & Seeder.

## 🚀 Persyaratan Sistem
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / MariaDB

## 🛠️ Cara Instalasi

1. **Clone Repository**
   ```bash
   git clone <link-repo-ini>
   cd <nama-folder>
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda.
   ```bash
   cp .env.example .env
   ```
   Pastikan `DB_DATABASE=inventory_db` atau sesuai keinginan Anda.

4. **Generate Key & Migrate**
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```
   *(Data dummy akan otomatis terisi termasuk akun tester)*

5. **Build Assets**
   ```bash
   npm run build
   ```

6. **Run Server**
   ```bash
   php artisan serve
   ```

## 🔐 Akun Login (Default Seeder)
- **Email**: `cokomi@toko.com` atau `wowo@toko.com`
- **Password**: `password`

## 📸 Dokumentasi (Screenshots)

### 1. Halaman Login
![Login Screen](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/512x128.png)
*(Ganti dengan screenshot asli saat program jalan)*

### 2. Dashboard Inventaris
![Dashboard](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/512x128.png)
*(Ganti dengan screenshot asli saat program jalan)*

### 3. Tabel Data Produk
![Index Product](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/512x128.png)
*(Ganti dengan screenshot asli saat program jalan)*

### 4. Form Tambah/Edit
![Forms](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/512x128.png)
*(Ganti dengan screenshot asli saat program jalan)*

### 5. Konfirmasi Modal Delete
![Delete Modal](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/512x128.png)
*(Ganti dengan screenshot asli saat program jalan)*

---
Dibuat oleh [Nama Anda] - NIM [NIM Anda]
