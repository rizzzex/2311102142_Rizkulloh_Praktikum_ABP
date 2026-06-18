# Tugas Praktikum - Notifikasi & API Perangkat Keras

Aplikasi Flutter sederhana ini mendemonstrasikan cara menggunakan kamera perangkat, mengambil gambar dari galeri, dan menampilkan notifikasi lokal menggunakan plugin `image_picker` dan `flutter_local_notifications`.

## Kebutuhan Pengumpulan

- **Screenshot**: (Silakan letakkan screenshot hasil run aplikasi Anda pada folder ini)
- **Source Code**: Terdapat di dalam folder `lib/main.dart`
- **Penjelasan Widget**: Berikut adalah penjelasan singkat tentang widget utama yang digunakan:

### Penjelasan Singkat Tiap Widget

1. **`MaterialApp`**: Widget utama yang menjadi root aplikasi. Widget ini membungkus aplikasi dengan tema Material Design dan mengatur routing dasar.
2. **`Scaffold`**: Menyediakan struktur dasar untuk halaman aplikasi, seperti ruang untuk AppBar, Body, dan fitur layout lainnya.
3. **`AppBar`**: Menampilkan bar navigasi di bagian atas layar aplikasi dengan judul teks.
4. **`Center`**: Mengatur posisi child-nya (komponen di dalamnya) agar selalu berada di tengah secara vertikal maupun horizontal.
5. **`Column`**: Widget layout yang menyusun anak-anaknya secara vertikal (dari atas ke bawah).
6. **`Row`**: Widget layout yang menyusun anak-anaknya secara horizontal (dari kiri ke kanan), di sini digunakan untuk meletakkan kedua tombol berdampingan.
7. **`ElevatedButton.icon`**: Tombol bergaya Material Design yang memiliki elevasi (bayangan) dengan tambahan ikon. Saat ditekan, tombol ini akan memanggil fungsi pengambilan gambar.
8. **`Icon`**: Widget untuk menampilkan ikon grafis, seperti ikon kamera (`Icons.camera_alt`) atau galeri (`Icons.photo_library`).
9. **`Text`**: Widget untuk menampilkan teks sederhana di layar dengan gaya tertentu.
10. **`Image.file`**: Widget yang digunakan untuk menampilkan gambar dari suatu file (dalam hal ini, file gambar yang diambil dari kamera atau galeri).
11. **`SizedBox`**: Widget sederhana untuk memberikan jarak ruang kosong dengan tinggi (`height`) atau lebar (`width`) yang spesifik antara komponen-komponen di UI.
