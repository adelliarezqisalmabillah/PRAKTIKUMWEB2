# Portal Berita - CodeIgniter 4 (Tugas Praktikum Pemrograman Web 2)

Laporan komprehensif pengerjaan **Modul 1 hingga Modul 5**. Proyek ini mendemonstrasikan transisi dari website statis menuju aplikasi web dinamis berbasis arsitektur **MVC (Model-View-Controller)** menggunakan Framework CodeIgniter 4.

---

## 👤 Identitas Pengembang
* **Nama:** Adellia Rezqi SalmaBillah
* **NIM:** 312410395
* **Kelas:** TI.24.A4 / I241D
* **Mata Kuliah:** Pemrograman Web 2

---

## 🛠️ Analisis Struktur Modul Praktikum

### 🟢 Modul 1: Fondasi MVC & Routing
Fokus pada migrasi paradigma PHP Native ke Framework.
* **Logika:** Pengguna meminta URL → `Routes.php` mengarahkan ke Controller → Controller memanggil View.
* **Implementasi:** Membuat `Page.php` untuk menangani halaman statis (Beranda, Tentang, Kontak).

### 🔵 Modul 2: Basis Data CRUD & Interaksi
Mengubah website menjadi dinamis dengan integrasi database MySQL.
* **Model:** Membuat `ArtikelModel.php` sebagai jembatan ke tabel `artikel`.
* **Fitur CRUD:** Implementasi Create (Tambah), Read (Tampil), Update (Ubah), dan Delete (Hapus).

### 🟡 Modul 3: Templating (View Layouts & View Cells)
Penerapan prinsip **DRY (Don't Repeat Yourself)**.
* **Layout:** Menggunakan `layout/main.php` sebagai template induk.
* **View Cell:** Komponen modular `ArtikelTerkini` yang efisien.

### 🔴 Modul 4: Otentikasi & Filter Keamanan
Melindungi area Dashboard Admin dari akses tanpa izin.
* **Auth System:** Validasi kredensial menggunakan Session.
* **Filter:** Implementasi `AuthFilter.php` untuk memproteksi route `/admin`.

### 🟣 Modul 5: Optimasi UX (Paginasi & Pencarian)
Penyempurnaan antarmuka untuk manajemen data skala besar.
* **Pagination:** Menggunakan `paginate(10)` untuk efisiensi loading.
* **Search:** Fitur pencarian judul artikel menggunakan query SQL `like()`.

---

## 💻 Cara Instalasi Proyek

1.  **Kloning Proyek:**
    ```bash
    git clone 
    cd Lab7Web
    ```

2.  **Konfigurasi Basis Data:**
    * Buat database baru bernama `lab_ci4`.
    * Impor file `.sql` dari folder `database/`.

3.  **Pengaturan Environment:**
    * Ubah nama file `env` menjadi `.env`.
    * Sesuaikan konfigurasi database sesuai pengaturan lokal Anda.

4.  **Jalankan Server:**
    ```bash
    php spark serve
    ```
Modul 6 & 7: Fondasi Database & Koneksi (PHP & MySQL)
Pada tahap awal ini, fokus utama adalah menghubungkan halaman web statis yang sudah kamu buat (HTML/CSS) agar bisa berkomunikasi dengan basis data.

Modul 6: Desain Database & Operasi Dasar SQL

Kamu akan belajar membuat database, membuat tabel (misal: tabel users, barang, atau mahasiswa), serta memahami tipe data di MySQL.

Mempelajari perintah dasar DDL dan DML (Create, Read, Update, Delete langsung di database).

Modul 7: Koneksi Database dengan PHP

Menghubungkan skrip PHP ke MySQL menggunakan ekstensi MySQLi atau PDO.

Membuat file konfigurasi (biasanya bernama koneksi.php atau config.php) yang akan dipanggil di setiap halaman web yang membutuhkan data dari database.

🖥️ Modul 8 & 9: Pembuatan Fitur CRUD (Create, Read, Update, Delete)
Ini adalah core atau jantung dari aplikasi web dinamis. Kamu belajar bagaimana memanipulasi data database langsung dari antarmuka (interface) browser.

Modul 8: Menampilkan Data (Read) & Menambah Data (Create)

Read: Mengambil data dari database menggunakan fungsi query (SELECT), lalu menampilkannya ke dalam bentuk tabel HTML di browser.

Create: Membuat form input HTML, menangkap data yang diinput user menggunakan metode POST atau GET di PHP, lalu menyimpannya ke database dengan perintah INSERT.

Modul 9: Mengubah Data (Update) & Menghapus Data (Delete)

Update: Membuat tombol "Edit" yang ketika diklik akan membawa ID data tersebut, menampilkan data lama ke dalam form, dan memperbaruinya menggunakan perintah UPDATE.

Delete: Membuat tombol "Hapus" yang mengirimkan ID spesifik ke skrip PHP untuk mengeksekusi perintah DELETE.

🔐 Modul 10 & 11: Autentikasi, Session, & Keamanan Web
Setelah aplikasi CRUD selesai, web harus diamankan agar tidak semua orang bisa memanipulasi data tanpa izin.

Modul 10: Sistem Login & Registrasi (Autentikasi)

Membuat fitur daftar akun baru (Registrasi) dengan enkripsi password (misal menggunakan password_hash() di PHP) agar password tidak tersimpan dalam bentuk teks biasa di database.

Membuat form Login untuk mencocokkan input user dengan data di database.

Modul 11: Manajemen Session & Validasi Hak Akses

Menggunakan fungsi session_start() untuk mengingat status user yang sudah login saat mereka berpindah-pindah halaman.

Membuat proteksi halaman (misal: jika user belum login, mereka otomatis ditendang/di-redirect kembali ke halaman login).

Membuat fitur Logout untuk menghancurkan (session_destroy()) data sesi aktif.

🚀 Modul 12: Pengenalan Framework Web (Modern Web Development)
Setelah menguasai konsep PHP Native (konsep dasar) dari Modul 6-11, kamu akan diperkenalkan pada cara kerja industri modern menggunakan Framework (seperti CodeIgniter atau Laravel).

Arsitektur MVC (Model-View-Controller):

Model: Bagian yang bertugas mengelola data dan berhubungan dengan database.

View: Bagian yang mengatur tampilan (HTML/CSS) yang dilihat oleh user.

Controller: Jembatan atau "otak" yang mengatur logika bisnis dan menghubungkan Model dengan View.

Routing & Migrasi: Belajar bagaimana mengatur URL web yang lebih rapi (clean URL) dan mengelola database lewat kode program tanpa perlu membuka phpMyAdmin manual.
---

**Status Proyek:** Selesai (Modul 1-12) ✅
