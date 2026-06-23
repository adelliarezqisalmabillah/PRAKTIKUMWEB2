<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="content-admin"
     style="
     background:#fffef7;
     padding:20px;
     border-radius:12px;
     ">

    <!-- JUDUL -->
    <h2 style="
        margin-top:0;
        border-bottom:3px solid #ffe082;
        padding-bottom:12px;
        color:#856404;
    ">
        Daftar Artikel
    </h2>

    <!-- FLASH MESSAGE -->
    <?php if(session()->getFlashdata('pesan')): ?>

        <div style="
            background:#fff3cd;
            color:#856404;
            padding:12px;
            margin-bottom:20px;
            border-radius:8px;
            border:1px solid #ffeeba;
        ">
            <?= session()->getFlashdata('pesan'); ?>
        </div>

    <?php endif; ?>

    <!-- SEARCH + FILTER -->
    <div style="
        margin-bottom:20px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:15px;
        flex-wrap:wrap;
    ">

        <!-- FORM SEARCH -->
        <form method="get"
              style="
              display:flex;
              gap:10px;
              flex-wrap:wrap;
              align-items:center;
              ">

            <!-- SEARCH -->
            <input type="text"
                   name="q"
                   value="<?= $q; ?>"
                   placeholder="Cari judul artikel..."

                   style="
                   padding:10px;
                   width:250px;
                   border:1px solid #ffe082;
                   border-radius:8px;
                   outline:none;
                   ">

            <!-- FILTER KATEGORI -->
            <select name="kategori_id"

                    style="
                    padding:10px;
                    border:1px solid #ffe082;
                    border-radius:8px;
                    background:white;
                    outline:none;
                    ">

                <option value="">
                    Semua Kategori
                </option>

                <?php foreach ($kategori as $k): ?>

                    <option value="<?= $k['id_kategori']; ?>"

                        <?= ($kategori_id == $k['id_kategori'])
                            ? 'selected'
                            : ''; ?>>

                        <?= $k['nama_kategori']; ?>

                    </option>

                <?php endforeach; ?>

            </select>

            <!-- BUTTON -->
            <button type="submit"

                    style="
                    padding:10px 18px;
                    background:#856404;
                    color:white;
                    border:none;
                    border-radius:8px;
                    cursor:pointer;
                    font-weight:bold;
                    ">

                Cari

            </button>
        </form>

        <!-- TAMBAH -->
        <a href="<?= base_url('/admin/artikel/add'); ?>"

           style="
           background:#856404;
           color:white;
           padding:10px 18px;
           text-decoration:none;
           border-radius:8px;
           font-weight:bold;
           box-shadow:0 3px 8px rgba(0,0,0,0.1);
           ">

            + Tambah Artikel

        </a>

    </div>

    <!-- TABLE -->
    <div style="overflow-x:auto;">

        <table border="1"
               cellspacing="0"
               cellpadding="12"

               style="
               width:100%;
               border-collapse:collapse;
               background:white;
               border:1px solid #f5d97b;
               ">

            <thead>

                <tr style="
                    background:#fff3cd;
                    color:#856404;
                ">

                    <th width="60">ID</th>

                    <th>Judul Artikel</th>

                    <th width="180">
                        Kategori
                    </th>

                    <th width="120">
                        Status
                    </th>

                    <th width="170">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

            <?php if(count($artikel) > 0): ?>

                <?php foreach($artikel as $row): ?>

                <tr>

                    <td style="text-align:center;">
                        <?= $row['id']; ?>
                    </td>

                    <!-- JUDUL -->
                    <td>

                        <strong style="
                            color:#5f4b00;
                            font-size:15px;
                        ">
                            <?= $row['judul']; ?>
                        </strong>

                        <p style="
                            margin:6px 0 0;
                            font-size:12px;
                            color:#777;
                            line-height:1.5;
                        ">
                            <?= substr(strip_tags($row['isi']), 0, 80); ?>...
                        </p>

                    </td>

                    <!-- KATEGORI -->
                    <td style="text-align:center;">

                        <span style="
                            background:#fff8dc;
                            color:#856404;
                            padding:5px 10px;
                            border-radius:20px;
                            font-size:12px;
                            font-weight:bold;
                        ">
                            <?= $row['nama_kategori']; ?>
                        </span>

                    </td>

                    <!-- STATUS -->
                    <td style="text-align:center;">

                        <span style="
                            padding:5px 10px;
                            border-radius:20px;
                            font-size:12px;
                            font-weight:bold;

                            background:
                            <?= $row['status'] == 1
                                ? '#d4edda'
                                : '#fff3cd'; ?>;

                            color:
                            <?= $row['status'] == 1
                                ? '#155724'
                                : '#856404'; ?>;
                        ">

                            <?= $row['status'] == 1
                                ? 'Published'
                                : 'Draft'; ?>

                        </span>

                    </td>

                    <!-- AKSI -->
                    <td style="text-align:center;">

                        <a href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>"

                           style="
                           color:#0d6efd;
                           text-decoration:none;
                           font-weight:bold;
                           margin-right:10px;
                           ">

                            Ubah

                        </a>

                        <a onclick="return confirm('Yakin hapus data?')"

                           href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>"

                           style="
                           color:#dc3545;
                           text-decoration:none;
                           font-weight:bold;
                           ">

                            Hapus

                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="5"

                        style="
                        text-align:center;
                        padding:25px;
                        color:#856404;
                        ">

                        Tidak ada data artikel.

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div style="
        margin-top:25px;
        text-align:center;
    ">

        <?= $pager->only(['q', 'kategori_id'])->links('artikel'); ?>

    </div>

</div>

<style>

table tr:hover {
    background:#fffdf5;
}

.pagination li {
    display:inline-block;
    margin:0 3px;
}

.pagination li a,
.pagination li span {

    padding:8px 14px;

    border-radius:8px;

    border:1px solid #ffe082;

    text-decoration:none;

    color:#856404;

    background:white;
}

.pagination .active span {

    background:#856404;

    color:white;

    border-color:#856404;
}

</style>

<?= $this->endSection(); ?>