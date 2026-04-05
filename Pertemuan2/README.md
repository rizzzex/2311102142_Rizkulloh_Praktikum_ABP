# Studify - Student Management System

Sebuah aplikasi web sederhana untuk mengelola data mahasiswa (CRUD) yang dibangun menggunakan **NodeJS**, **Express**, **EJS**, **Bootstrap 5**, **jQuery**, dan **DataTables**.

## 🚀 Fitur Utama

- **Create**: Menambahkan data mahasiswa baru melalui form yang elegan.
- **Read**: Menampilkan daftar mahasiswa menggunakan jQuery DataTables dengan fitur pencarian dan paginasi yang responsif.
- **Update**: Memperbarui informasi mahasiswa melalui modal AJAX yang cepat.
- **Delete**: Menghapus data mahasiswa dengan konfirmasi SweetAlert2 yang aman.
- **Minimalist UI**: Desain premium bertema *dark mode* dengan navigasi yang bersih.

## 🛠️ Persyaratan Sistem

- **Node.js** (versi 14 ke atas disarankan)
- **NPM** (termasuk saat install Node.js)

## 📦 Instalasi

1.  Clone repository ini:
    ```bash
    git clone [url-repository]
    ```
2.  Masuk ke direktori proyek:
    ```bash
    cd Pertemuan2
    ```
3.  Instal dependensi yang diperlukan:
    ```bash
    npm install
    ```

## 🏃 Cara Menjalankan

1.  Pastikan tidak ada proses lain di port 3000.
2.  Jalankan server:
    ```bash
    npm start
    ```
3.  Akses aplikasi melalui browser di: `http://localhost:3000`

## 📁 Struktur Folder

- `app.js`: Entry point aplikasi (Express Server & API).
- `data/`: Penyimpanan data fiktif (JSON).
- `views/`: Template halaman (EJS).
- `public/`: File statis (CSS, JS, Gambar).
- `.gitignore`: Mengabaikan file yang tidak perlu diunggah ke GitHub (seperti `node_modules`).

## ✍️ Penulis

- **Nama**: Rizkulloh Alpriyansah
- **NIM**: 2311102142
- **Tugas**: Praktikum ABP Pertemuan 2

---