<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<article class="entry" style="background: #fffdf2; padding: 25px; border-radius: 12px; border: 1px solid #f9e8b3; box-shadow: 0 4px 15px rgba(230, 190, 100, 0.1);">
    
    <!-- Judul dengan aksen Kuning Salem Tua -->
    <h2 style="color: #856404; border-bottom: 3px solid #ffeeba; padding-bottom: 15px; margin-bottom: 20px; font-size: 28px; line-height: 1.3;">
        <?= $artikel['judul']; ?>
    </h2>
    
    <?php if (!empty($artikel['gambar'])): ?>
        <div style="width: 100%; border-radius: 10px; overflow: hidden; margin-bottom: 25px; border: 2px solid #fff5d6; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <img src="<?= base_url('uploads/' . $artikel['gambar']); ?>" 
                 alt="<?= $artikel['judul']; ?>" 
                 style="width: 100%; max-height: 450px; object-fit: cover; display: block;">
        </div>
    <?php endif; ?>

    <!-- Meta section dengan warna pastel -->
    <div class="meta" style="margin-bottom: 25px; font-size: 13px; color: #9b8a5e; display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
        <span style="background: #ffeeba; color: #856404; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
            Status: <span style="color: <?= $artikel['status'] == 1 ? '#2d5a27' : '#a94442'; ?>;">
                <?= $artikel['status'] == 1 ? 'Published' : 'Draft'; ?>
            </span>
        </span>
        <span style="display: flex; align-items: center; gap: 4px;">📅 <?= date('d M Y', strtotime($artikel['created_at'] ?? 'now')); ?></span>
        <span style="display: flex; align-items: center; gap: 4px;">👤 Oleh: Admin</span>
    </div>

    <!-- Konten dengan font yang nyaman -->
    <div class="content" style="line-height: 1.8; font-size: 16px; text-align: justify; color: #5d543e; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
        <?= nl2br($artikel['isi']); ?>
    </div>

    <!-- Tombol Kembali dengan tema Kuning Salem -->
    <div style="margin-top: 50px; border-top: 2px solid #fff5d6; padding-top: 25px;">
        <a href="<?= base_url('/artikel'); ?>" 
           style="text-decoration: none; color: #856404; background: #ffeeba; padding: 10px 20px; border-radius: 8px; font-weight: bold; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease-in-out;"
           onmouseover="this.style.background='#f9e8b3'; this.style.transform='translateX(-5px)';"
           onmouseout="this.style.background='#ffeeba'; this.style.transform='translateX(0)';">
            &larr; Kembali ke Daftar Artikel
        </a>
    </div>
</article>
<?= $this->endSection(); ?>