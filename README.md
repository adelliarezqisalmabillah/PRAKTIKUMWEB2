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

---

**Status Proyek:** Selesai (Modul 1-5) ✅