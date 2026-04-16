<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="artikel-container" style="background-color: #fffef7; padding: 20px; border-radius: 12px;">
    
    <h2 style="border-bottom: 3px solid #ffeeba; padding-bottom: 10px; margin-bottom: 25px; color: #856404; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        Eksplorasi Artikel Terbaru di Portal Adellia
    </h2>

    <?php if(session()->getFlashdata('pesan')): ?>
        <div style="background: #fff3cd; color: #856404; padding: 15px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #ffeeba;">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php if($artikel): ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
            <?php foreach($artikel as $row): ?>
                <article style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(230, 190, 100, 0.15); border: 1px solid #f9e8b3; display: flex; flex-direction: column; transition: transform 0.3s ease;">
                    
                    <div style="width: 100%; height: 180px; background: #fff9e6; display: flex; align-items: center; justify-content: center; color: #d4a017; overflow: hidden;">
                        <?php if(!empty($row['gambar'])): ?>
                            <img src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <span style="font-size: 50px;">📜</span>
                        <?php endif; ?>
                    </div>

                    <div style="padding: 20px; flex-grow: 1;">
                        <h3 style="margin: 0 0 10px 0; font-size: 18px; line-height: 1.4; height: 50px; overflow: hidden;">
                            <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="text-decoration: none; color: #856404; transition: 0.2s;" onmouseover="this.style.color='#b08d23'" onmouseout="this.style.color='#856404'">
                                <?= $row['judul']; ?>
                            </a>
                        </h3>
                        <p style="color: #6d644d; font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                            <?= substr(strip_tags($row['isi']), 0, 100); ?>...
                        </p>
                    </div>

                    <div style="padding: 15px 20px; background: #fffdf2; border-top: 1px solid #f9e8b3; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 12px; color: #9b8a5e;">👤 Redaksi Adellia</span>
                        <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="color: #b08d23; font-weight: bold; text-decoration: none; font-size: 14px; transition: 0.3s;" onmouseover="this.style.letterSpacing='0.5px'" onmouseout="this.style.letterSpacing='0'">
                            Baca Selengkapnya &raquo;
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 50px; background: #fff9e6; border-radius: 12px; border: 1px dashed #ffeeba;">
            <h3 style="color: #856404;">Belum ada artikel di Portal Adellia.</h3>
            <p style="color: #9b8a5e;">Silakan kembali lagi nanti untuk update berita terbaru kami.</p>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($pager)): ?>
    <div style="margin-top: 40px; text-align: center;" class="pagination-container">
        <?= $pager->links('artikel', 'default_full'); ?>
    </div>
<?php endif; ?>

<style>
    article:hover {
        transform: translateY(-5px);
        border-color: #ffd966 !important;
    }
</style>

<?= $this->endSection(); ?>