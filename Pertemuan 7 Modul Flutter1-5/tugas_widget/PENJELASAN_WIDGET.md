# Penjelasan Singkat Tiap Widget

Berikut adalah penjelasan singkat untuk masing-masing widget yang digunakan pada tugas ini:

1. **Container**
   Widget Container digunakan sebagai wadah atau "kotak" yang dapat diberikan properti seperti `width` (lebar), `height` (tinggi), `color` (warna latar belakang), `padding`, `margin`, dan `decoration` lainnya. Pada contoh ini, Container digunakan untuk membuat sebuah kotak berwarna biru dengan teks di tengahnya.

2. **GridView**
   Widget GridView digunakan untuk menampilkan daftar item dalam bentuk grid (kisi-kisi) atau tabel dua dimensi (baris dan kolom). Pada contoh ini, digunakan `GridView.count` dengan `crossAxisCount: 3` yang artinya ada 3 item per baris. Total item yang ditampilkan adalah 6 kotak berwarna oranye.

3. **ListView**
   Widget ListView digunakan untuk menampilkan daftar item secara linear (bisa vertikal maupun horizontal) yang dapat di-scroll. Pada bagian ini, ListView diisi secara statis dengan 3 buah `ListTile` yang merepresentasikan Item A, B, dan C.

4. **ListView.builder**
   `ListView.builder` digunakan untuk membuat daftar list item secara dinamis dari sebuah array atau sumber data, di mana item-itemnya akan di-render saat terlihat di layar (lazy loading) sehingga lebih efisien untuk data berjumlah banyak. Pada contoh ini, ia membaca data dari variabel array `builderData`.

5. **ListView.separated**
   `ListView.separated` mirip dengan `ListView.builder`, namun widget ini memiliki tambahan properti `separatorBuilder` yang digunakan untuk memberikan pembatas (seperti garis atau spasi tambahan) di antara setiap item. Pada contoh ini, pembatas yang digunakan adalah widget `Divider` berwarna merah.

6. **Stack**
   Widget Stack digunakan untuk mengatur child widget saling bertumpuk (overlap) satu sama lain. Widget yang didefinisikan lebih dulu di dalam array `children` akan berada di lapisan paling bawah (background), sedangkan yang lebih akhir akan berada di lapisan atasnya. Pada contoh ini, terdapat sebuah kotak hijau di paling bawah, ditimpa dengan kotak kuning yang lebih kecil di tengahnya, dan ditimpa lagi dengan teks di lapisan paling atas.
