<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <div style="background: linear-gradient(rgba(173, 216, 230, 0.8), rgba(70, 130, 180, 0.8)), url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1000&q=80'); 
                background-size: cover; background-position: center; padding: 80px 20px; color: white; border-radius: 15px; margin-bottom: 30px; text-align: center; box-shadow: 0 8px 20px rgba(70, 130, 180, 0.15);">
        
        <h1 style="font-size: 42px; margin-bottom: 15px; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">Selamat Datang di Portal Berita adelliarzz</h1>
        
        <p style="font-size: 18px; max-width: 800px; margin: 0 auto 25px; line-height: 1.6; color: #f0f8ff;">
            Menyajikan informasi paling hangat, akurat, dan terpercaya seputar dunia Teknologi, Pemrograman, dan Berita Kampus setiap harinya.
        </p>
        
        <a href="<?= base_url('/artikel'); ?>" style="display: inline-block; background-color: #fff; color: #4682b4; padding: 14px 32px; text-decoration: none; border-radius: 50px; font-weight: bold; transition: 0.3s; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            Jelajahi Artikel &rarr;
        </a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 30px;">
        
        <div style="background: #ffffff; padding: 30px; border-top: 6px solid #add8e6; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 12px; transition: 0.3s;">
            <h3 style="margin-top: 0; color: #4682b4; display: flex; align-items: center; gap: 10px;">📜 Berita Terkini</h3>
            <p style="color: #667a8a; font-size: 15px; line-height: 1.7;">Dapatkan update harian mengenai perkembangan teknologi web dan framework terbaru langsung dari sumbernya.</p>
        </div>

        <div style="background: #ffffff; padding: 30px; border-top: 6px solid #89cff0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 12px;">
            <h3 style="margin-top: 0; color: #4682b4; display: flex; align-items: center; gap: 10px;">💻 Tips & Tutorial</h3>
            <p style="color: #667a8a; font-size: 15px; line-height: 1.7;">Tersedia berbagai panduan pemrograman PHP, JavaScript, hingga manajemen database untuk mengasah skill Anda.</p>
        </div>

        <div style="background: #ffffff; padding: 30px; border-top: 6px solid #a2c2e1; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 12px;">
            <h3 style="margin-top: 0; color: #4682b4; display: flex; align-items: center; gap: 10px;">🎓 Seputar Kampus</h3>
            <p style="color: #667a8a; font-size: 15px; line-height: 1.7;">Informasi kegiatan akademik dan proyek mahasiswa Informatika Engineering untuk inspirasi belajar bersama.</p>
        </div>
    </div>

    <div style="padding: 35px; border-left: 8px solid #add8e6; background-color: #f0f9ff; border-radius: 0 15px 15px 0; border: 1px solid #d1e9ff; border-left-width: 8px;">
        <h2 style="margin-top: 0; color: #4682b4; font-size: 24px;">💡 Mengapa Membaca di Sini?</h2>
        <p style="color: #5a6b7d; margin-bottom: 0; line-height: 1.8;">
            Kami berdedikasi untuk memberikan konten berkualitas tinggi yang dikurasi khusus untuk mahasiswa dan pengembang software. Tetaplah terhubung untuk mendapatkan wawasan terbaru di dunia industri kreatif.
        </p>
    </div>

</div>

<?= $this->endSection() ?>