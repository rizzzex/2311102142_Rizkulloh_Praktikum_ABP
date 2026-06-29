# Laporan Tugas Praktikum ABP
**Nama:** Rizkulloh Alpriyansah  
**Materi:** State Management dengan BLoC/Cubit (Modul 15)

---

## 1. Tampilan Daftar Produk

*(Silakan ganti teks ini dengan screenshot antarmuka daftar produk)*

**Penjelasan:**  
Halaman utama menampilkan daftar minimal 5 produk. Aplikasi dibungkus dengan `BlocProvider<CartCubit>` di tingkat `MaterialApp` sehingga instance `CartCubit` dapat diakses dari halaman manapun. Di pojok kanan atas terdapat ikon keranjang belanja yang menampilkan `totalItems` dari state Cubit.

## 2. Proses Menambahkan Produk ke Keranjang

*(Silakan ganti teks ini dengan screenshot saat tombol tambah keranjang ditekan, misalnya saat notifikasi snackbar muncul)*

**Penjelasan:**  
Saat tombol keranjang di sebelah produk ditekan, fungsi `addProduct(product)` pada `CartCubit` dipanggil menggunakan `context.read<CartCubit>().addProduct(product)`. Cubit akan mengambil state keranjang saat ini, menyalin listnya, menambahkan item baru, dan kemudian melakukan `emit` state terbaru yang secara otomatis diperbarui oleh `BlocBuilder`.

## 3. Tampilan Jumlah Item pada Keranjang Setelah Terjadi Perubahan State

*(Silakan ganti teks ini dengan screenshot halaman keranjang belanja yang memperlihatkan item yang sudah ditambahkan)*

**Penjelasan:**  
Pada halaman utama, ikon keranjang dibungkus dengan `BlocBuilder<CartCubit, CartState>`. Ketika ada perubahan state (`emit` dari Cubit), `BlocBuilder` hanya akan me-rebuild widget *badge* jumlah item, menampilkan jumlah produk secara real-time. Hal yang sama juga terjadi di dalam halaman `CartPage` dimana list keranjang dirender berdasarkan `state.cartItems`. Penghapusan item dari keranjang dilakukan dengan fungsi `removeProduct` yang juga memperbarui state.

---

## Repositori Publik

**Link GitHub Repo:** *(Silakan isi dengan link repositori GitHub publik Anda yang berisi folder proyek ini)*
