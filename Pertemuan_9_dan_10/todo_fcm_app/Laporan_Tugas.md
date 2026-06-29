# Laporan Tugas Praktikum ABP

**Nama:** Rizkulloh Alpriyansah  
**Materi:** State Management Provider dan Firebase Cloud Messaging (FCM)

---

## 1. Tampilan Daftar Tugas (To-Do List)

*(Silakan ganti teks ini dengan screenshot antarmuka daftar tugas saat pertama kali dibuka atau setelah ada tugas. Anda bisa menyimpan gambar di folder proyek dan mengacu padanya, misal: `![Tampilan Daftar Tugas](screenshot1.png)`)*

**Penjelasan Singkat:**
Halaman ini dibangun menggunakan Flutter. Data tugas (To-Do) dikelola secara terpusat menggunakan library `provider`. State yang digunakan berisi list of objects `Todo` yang ditampilkan menggunakan `ListView.builder`. 

---

## 2. Proses Penambahan Tugas

*(Silakan ganti teks ini dengan screenshot saat dialog tambah tugas muncul atau saat mengetikkan tugas baru)*

**Penjelasan Singkat:**
Penambahan tugas dilakukan melalui method `addTodo` yang berada di dalam `TodoProvider`. Saat tombol "Simpan" ditekan, provider akan membuat objek tugas baru dengan id unik dan menyimpannya di dalam list. Setelah itu, `notifyListeners()` akan dipanggil sehingga UI `TodoListPage` akan ter-rebuild secara otomatis untuk menampilkan tugas terbaru.

---

## 3. Notifikasi FCM yang Berhasil Diterima

*(Silakan ganti teks ini dengan screenshot notifikasi yang masuk dari Firebase Console atau Postman. Bisa berupa notifikasi di background (system tray) maupun di foreground)*

**Penjelasan Singkat:**
Integrasi Firebase Cloud Messaging diatur di file `main.dart`. 
1. Pada fungsi `main()`, `FirebaseCore.initializeApp()` dipanggil untuk menghubungkan aplikasi dengan layanan Firebase.
2. `FirebaseMessaging.instance.getToken()` digunakan untuk mendapatkan token unik perangkat yang dapat digunakan untuk mengirimkan pesan pengujian.
3. Listener `FirebaseMessaging.onMessage` digunakan untuk menangani pesan yang masuk saat aplikasi berjalan di depan layar (foreground).
4. Fungsi top-level `_firebaseMessagingBackgroundHandler` disiapkan untuk menangani pesan saat aplikasi berjalan di latar belakang (background) atau mati (terminated).

---

## Repositori Publik

**Link GitHub Repo:** *(Silakan isi dengan link repositori GitHub publik Anda yang berisi folder proyek ini)*
