# Laporan Tugas Praktikum ABP
**Nama:** Rizkulloh Alpriyansah  
**Materi:** State Management dengan BLoC/Cubit (Modul 15)

---

## 1. Tampilan Daftar Produk

![Daftar Produk](screenshot_produk.png)

Halaman utama ini isinya daftar 5 produk yang bisa dibeli. Aplikasinya dibungkus pake `BlocProvider` dari awal jalan supaya semua halaman bisa akses state keranjangnya. Di pojok kanan atas juga ada tombol keranjang yang nampilin jumlah barang secara real-time.

---

## 2. Proses Menambahkan Produk ke Keranjang

![Tambah ke Keranjang](screenshot_tambah_keranjang.png)

Kalo icon keranjang di sebelah harga barang diklik, produknya otomatis masuk ke keranjang. Proses ini manggil fungsi `addProduct` yang ada di dalem `CartCubit`. Begitu statenya berubah, otomatis nampilin notif (snackbar) ngasih tau kalo barang sukses ditambahin.

---

## 3. Tampilan Jumlah Item pada Keranjang (Real-time)

![Isi Keranjang](screenshot_isi_keranjang.png)

Jumlah angka yang ada di icon keranjang bakal langsung berubah real-time tiap kali kita nambahin atau ngurangin barang berkat `BlocBuilder`. Kalau icon keranjangnya di-klik, kita bakal masuk ke halaman detail keranjang buat liat barang apa aja yang udah di-list. Di situ juga bisa hapus barang dari keranjang pakai fungsi `removeProduct`.

---

## Repositori GitHub

**Link Repo:** https://github.com/rizzzex/2311102142_Rizkulloh_Praktikum_ABP
