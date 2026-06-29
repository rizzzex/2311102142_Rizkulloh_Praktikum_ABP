# Laporan Tugas Praktikum ABP
**Nama:** Rizkulloh Alpriyansah  
**Materi:** State Management Provider dan Firebase Cloud Messaging (FCM)

---

## 1. Tampilan Daftar Tugas (To-Do List)

![Tampilan Daftar Tugas](screenshot_list_tugas.png)

Pada halaman awal aplikasi, terdapat daftar tugas yang masih harus diselesaikan. Data list tugas ini diatur pake `Provider` agar statenya terpusat. Jadi ketika ada perubahan data, widget otomatis kerender ulang nampilin tugas terbaru.

---

## 2. Proses Penambahan Tugas

![Proses Penambahan Tugas](screenshot_tambah_tugas.png)

Untuk nambahin tugas, tinggal klik tombol floating button di pojok kanan bawah. Nanti bakal muncul pop-up dialog buat ngisi nama tugas. Waktu tombol simpan diklik, fungsi `addTodo` di `TodoProvider` bakal jalan buat masukin tugas ke list dan langsung nge-update tampilan.

---

## 3. Notifikasi FCM

![Notifikasi FCM](screenshot_notifikasi.png)

Aplikasi ini udah disambungin sama Firebase Cloud Messaging (FCM). Waktu aplikasi lagi dibuka terus dites kirim notifikasi dari Firebase Console, aplikasinya berhasil nangkep datanya dan nampilin notif via `SnackBar` di layar.

---

## Repositori GitHub

**Link Repo:** https://github.com/rizzzex/2311102142_Rizkulloh_Praktikum_ABP
