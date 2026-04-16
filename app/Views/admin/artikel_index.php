<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="content-admin">
    <h2 style="margin-top: 0; border-bottom: 2px solid #4285f4; padding-bottom: 10px;">Daftar Artikel</h2>
    
    <div style="margin-bottom: 15px; text-align: right;">
        <a href="<?= base_url('/admin/artikel/add'); ?>" class="btn btn-primary" style="background-color: #4285f4; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Tambah Artikel</a>
    </div>

    <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; border-collapse: collapse; background-color: white;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th width="50">ID</th>
                <th>Judul Artikel</th>
                <th width="100">Status</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if($artikel): foreach($artikel as $row): ?>
            <tr>
                <td style="text-align: center;"><?= $row['id']; ?></td>
                <td>
                    <strong><?= $row['judul']; ?></strong>
                    <p style="margin: 5px 0 0 0; font-size: 12px; color: #666;"><?= substr($row['isi'], 0, 100); ?>...</p>
                </td>
                <td style="text-align: center;">
                    <span style="padding: 3px 8px; border-radius: 3px; font-size: 12px; background-color: <?= $row['status'] == 1 ? '#d4edda' : '#fff3cd'; ?>; color: <?= $row['status'] == 1 ? '#155724' : '#856404'; ?>;">
                        <?= $row['status'] == 1 ? 'Published' : 'Draft'; ?>
                    </span>
                </td>
                <td style="text-align: center;">
                    <a href="<?= base_url('/admin/artikel/edit/' . $row['id']);?>" style="color: #4285f4; text-decoration: none; font-weight: bold;">Ubah</a> | 
                    <a onclick="return confirm('Yakin hapus data?')" href="<?= base_url('/admin/artikel/delete/' . $row['id']);?>" style="color: #dc3545; text-decoration: none; font-weight: bold;">Hapus</a>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr>
                <td colspan="4" style="text-align: center; padding: 20px;">Belum ada data artikel.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>