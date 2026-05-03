# Laporan Praktikum ABP - Pertemuan 5
## Sistem Informasi Inventaris Toko Pak Cokomi & Mas Wowo

Berikut adalah laporan hasil pengerjaan tugas Praktikum Aplikasi Berbasis Platform (ABP) Pertemuan 5. Pada tugas ini, saya telah membangun sistem inventaris dengan tema **Dark Mode (Background Hitam)** dengan aksen **Merah (Primary Red)** untuk memberikan kesan modern, berani, dan profesional.

Sesuai dengan instruksi tugas, kriteria yang sudah saya kerjakan meliputi:
- Pembuatan web inventaris untuk toko "Pak Cokomi" dan "Mas Wowo"
- Fitur CRUD lengkap (Create, Read, Update, Delete) untuk mengelola data produk
- Tampilan UI Premium dengan tema **Black & Red** mencakup Data Table, Form Create, Form Edit, dan Konfirmasi Delete dengan Modal
- Penggunaan Database Seeder dan Factory agar data awal produk tidak kosong
- Implementasi sistem login/autentikasi menggunakan Laravel Breeze dengan custom styling yang senada dengan tema utama
- Optimasi visual menggunakan TailwindCSS dan font Outfit

Di bawah ini adalah dokumentasi berupa screenshot ketika program dijalankan di server lokal:

### 1. Halaman Login
Halaman login dibuat menggunakan fitur autentikasi bawaan dari Laravel Breeze yang telah di-styling ulang. Pengguna dapat login menggunakan akun `cokomi@toko.com` atau `wowo@toko.com` dengan password `password`.

![Halaman Login](public/screenshots/1-login.png)

### 2. Dashboard
Halaman dashboard merupakan pusat informasi utama setelah login. Menampilkan ringkasan data produk, stok rendah, dan total valuasi inventaris toko.

![Dashboard Inventaris](public/screenshots/2-dashboard.png)

### 3. Data Produk (Inventory Index)
Halaman utama yang menampilkan daftar produk dalam bentuk tabel (Data Table). Data yang ada di tabel ini otomatis digenerate dari Seeder. Terdapat indikator stok (progress bar) yang berubah warna menjadi merah jika stok menipis (< 10).

![Tabel Produk](public/screenshots/3-products-index.png)

### 4. Form Tambah Produk (Create)
Halaman form untuk memasukkan data produk baru ke dalam sistem. Form ini dilengkapi dengan validasi input untuk memastikan data yang masuk akurat.

![Form Tambah](public/screenshots/4-product-create.png)

### 5. Form Edit Produk (Edit)
Halaman form yang berfungsi untuk memperbarui informasi produk yang sudah ada. Menggunakan desain yang konsisten dengan form tambah.

![Form Edit](public/screenshots/5-product-edit.png)

### 6. Modal Konfirmasi Hapus (Delete Modal)
Ketika tombol hapus ditekan, akan muncul pop-up modal konfirmasi sebelum data benar-benar dihapus untuk mencegah penghapusan data secara tidak sengaja.

![Modal Delete](public/screenshots/6-delete-modal.png)
