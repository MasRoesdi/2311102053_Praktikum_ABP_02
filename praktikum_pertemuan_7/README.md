# praktikum_pertemuan_7

Latihan Layout

## Penjelasan Widget


1. Scaffold
Pondasi halaman. menyediakan tempat untuk  appBar (judul di atas) dan body (isi utamanya).

2. Column
menyusun widget secara vertikal (dari atas ke bawah). Column jadi "wadah besar" yang menampung GridView dan ListView.

3. GridView
Widget yang menampilkan children (widget di dalam GridView) sebagai kotak dengan ukuran yang sama. Penggunaan shrinkwrap untuk mengatasi GridView yang memakan ruang pada layar.

4. ListView
Widget yang berisi daftar yang bisa di-scroll. pemakaian scrollDirection: Axis.horizontal membuat widget di-render ke samping (kanan-kiri), bukan atas-bawah.

5. Stack
Stack itu menumpuk (depan-belakang) widget.

Di kode, ada dua Container "Deadline". Satu menumpuk di atas yang lain. Karena pakai Alignment.centerRight, kotak yang di bawah kelihatan sedikit, jadi mirip efek bayangan.

6. ListView.builder
ListView.builder hanya render item yang kelihatan di layar aja. Lebih efisien dan hemat memori.

7. ListView.separated
Widget ini berguna jika setiap item memerlukan garis pembatas (Divider) atau spasi di antara tiap item supaya tidak terlalu berdekatan. Di kode, ada garis halus (Divider) di antara setiap "Permintaan".

8. Container & BoxDecoration
Memberi warna (color), padding, margin, untuk dekorasi dan penyesuaian layout.