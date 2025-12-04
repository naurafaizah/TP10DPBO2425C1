Naura Nur Faizah 
2408352 
Ilmu Komputer C1

Saya Naura Nur Faizah dengan NIM 2408352 mengerjakan TP 10 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

# desain program
program ini dirancang menggunakan pola mvvm sederhana untuk memisahkan logika data, tampilan, dan pengaturan alur aplikasi. pada bagian model/viewmodel, setiap entitas seperti kategori, produk, pelanggan, dan transaksi memiliki kelas viewmodel masing-masing yang bertugas menangani operasi basis data seperti mengambil seluruh data, mengambil data berdasarkan id, menambah, memperbarui, dan menghapus. koneksi database dibuat melalui kelas khusus bernama database sehingga seluruh viewmodel dapat menggunakan koneksi yang sama tanpa duplikasi kode. 

bagian tampilan (view) dibuat dalam folder terpisah berisi file-file php yang hanya berfungsi menampilkan form input dan tabel data, tanpa melakukan query atau logika program yang kompleks. routing aplikasi dilakukan oleh index.php yang membaca parameter view pada url untuk menentukan halaman mana yang harus ditampilkan. 

index ini juga berfungsi menangani aksi delete secara sederhana melalui query parameter sebelum melakukan redirect kembali ke list. 
alur ini membuat aplikasi lebih terstruktur: 
- view tidak perlu mengetahui detail database, 
- viewmodel bertanggung jawab penuh terhadap data,
- dan index.php menjadi pengendali navigasi.

# alur program
alur program dimulai dari index.php yang membaca parameter view untuk menentukan halaman yang ditampilkan. setelah koneksi database dibuat, aplikasi menyiapkan semua viewmodel lalu memeriksa apakah ada permintaan hapus data melalui query parameter. jika ada, data dihapus dan halaman dialihkan kembali ke list. 

proses routing kemudian berjalan untuk halaman list, viewmodel mengambil seluruh data dan mengirimkannya ke file tampilan untuk halaman create dan edit, program menampilkan form, menerima input melalui post, lalu memanggil fungsi create atau update di viewmodel sebelum mengarahkan kembali ke halaman utama entitas tersebut. 

khusus transaksi, sistem juga mengambil daftar produk dan pelanggan untuk dropdown dan menghitung total harga sebelum menyimpan. alur ini membuat semua proses tampil, tambah, ubah, hapus berjalan rapi dan konsisten dalam struktur mvvm sederhana.

# dokumentasi
bagian kategori 
https://github.com/user-attachments/assets/569fe2b0-cde7-4884-ad7c-10ad10b24fd0

https://github.com/user-attachments/assets/91a38860-f01d-4649-8d09-277b61130ea5


bagian produk
https://github.com/user-attachments/assets/b98c453f-10b1-4689-ba7d-11006a349e56

https://github.com/user-attachments/assets/95465a1e-3c71-452f-9e29-580b01e35174


bagian pelanggan
https://github.com/user-attachments/assets/8f3e11dc-7ab8-4d3e-af71-08e05703725f

https://github.com/user-attachments/assets/b4bb8af4-ce09-45ca-866c-526fb52fe868


bagian transaksi
https://github.com/user-attachments/assets/017c65c2-7fa9-4394-ab96-747a3e6322b0

https://github.com/user-attachments/assets/ea075017-b100-4013-afaf-4dc13eb21d92













