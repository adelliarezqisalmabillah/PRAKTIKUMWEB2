<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="content-admin" style="background-color: #fffef7; padding: 20px; border-radius: 12px;">
    <!-- Judul dengan Aksen Kuning Salem Tua -->
    <h2 style="border-bottom: 3px solid #ffeeba; padding-bottom: 10px; margin-bottom: 25px; color: #856404; font-family: 'Segoe UI', sans-serif;">
        Tambah Artikel Baru
    </h2>

    <div style="background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(230, 190, 100, 0.1); border: 1px solid #f9e8b3;">
        <form action="<?= base_url('/admin/artikel/add'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <!-- Input Judul -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #856404;">Judul Artikel</label>
                <input type="text" name="judul" placeholder="Masukkan judul berita yang menarik..." 
                       style="width: 100%; padding: 12px; border: 1px solid #ffeeba; border-radius: 8px; font-size: 14px; background: #fffef7; outline: none;" 
                       onfocus="this.style.borderColor='#ffd966'; this.style.boxShadow='0 0 5px rgba(255,217,102,0.3)';"
                       onblur="this.style.borderColor='#ffeeba'; this.style.boxShadow='none';"
                       required autofocus>
            </div>

            <!-- Input Gambar -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #856404;">Gambar Unggulan</label>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <input type="file" name="gambar" id="gambar" accept="image/*" 
                           style="padding: 10px; border: 1px solid #ffeeba; border-radius: 8px; background: #fffdf2; font-size: 14px; cursor: pointer;"
                           onchange="previewImage()">
                    <small style="color: #9b8a5e;">Format: JPG, JPEG, PNG, atau WEBP (Maksimal 2MB)</small>
                    <img class="img-preview" style="max-width: 200px; border-radius: 8px; display: none; margin-top: 10px; border: 2px solid #fff5d6; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                </div>
            </div>

            <!-- Input Konten -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #856404;">Konten Berita</label>
                <textarea name="isi" rows="12" placeholder="Tuliskan isi berita di sini..." 
                          style="width: 100%; padding: 12px; border: 1px solid #ffeeba; border-radius: 8px; font-size: 14px; font-family: 'Segoe UI', sans-serif; line-height: 1.6; background: #fffef7; outline: none; resize: vertical;"
                          onfocus="this.style.borderColor='#ffd966'; this.style.boxShadow='0 0 5px rgba(255,217,102,0.3)';"
                          onblur="this.style.borderColor='#ffeeba'; this.style.boxShadow='none';"
                          required></textarea>
            </div>

            <!-- Pilih Status -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #856404;">Status</label>
                <select name="status" style="width: 100%; padding: 12px; border: 1px solid #ffeeba; border-radius: 8px; background: #fffef7; font-size: 14px; color: #5d543e; cursor: pointer; outline: none;">
                    <option value="1">Published (Terbitkan)</option>
                    <option value="0">Draft (Simpan Sementara)</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div style="display: flex; align-items: center; gap: 20px; border-top: 2px solid #fff5d6; padding-top: 25px;">
                <button type="submit" 
                        style="background-color: #856404; color: white; padding: 12px 30px; border: none; border-radius: 30px; font-weight: bold; cursor: pointer; transition: 0.3s; font-size: 14px; box-shadow: 0 4px 6px rgba(133, 100, 4, 0.2);"
                        onmouseover="this.style.background='#a17a06'; this.style.transform='translateY(-2px)';"
                        onmouseout="this.style.background='#856404'; this.style.transform='translateY(0)';">
                    🚀 Terbitkan Sekarang
                </button>
                <a href="<?= base_url('/admin/artikel'); ?>" 
                   style="text-decoration: none; color: #9b8a5e; font-size: 14px; font-weight: 600; transition: 0.3s;"
                   onmouseover="this.style.color='#856404';"
                   onmouseout="this.style.color='#9b8a5e';">
                   Batal & Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>