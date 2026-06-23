<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="content-admin"
     style="
     background-color:#fffef7;
     padding:20px;
     border-radius:12px;
     ">

    <!-- JUDUL -->
    <h2 style="
        margin-top:0;
        border-bottom:3px solid #4285f4;
        padding-bottom:10px;
        margin-bottom:25px;
        color:#856404;
        font-family:'Segoe UI', sans-serif;
    ">
        <?= $title; ?>
    </h2>

    <!-- CARD FORM -->
    <div style="
        background:#f9f9f9;
        padding:25px;
        border:1px solid #ddd;
        border-radius:10px;
        box-shadow:0 4px 12px rgba(0,0,0,0.05);
    ">

        <form action=""
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field(); ?>

            <!-- JUDUL -->
            <div style="margin-bottom:20px;">

                <label for="judul"

                       style="
                       display:block;
                       font-weight:bold;
                       margin-bottom:8px;
                       color:#333;
                       ">

                    Judul Artikel

                </label>

                <input type="text"
                       name="judul"
                       id="judul"
                       required

                       value="<?= $artikel['judul']; ?>"

                       style="
                       width:100%;
                       padding:12px;
                       border:1px solid #ccc;
                       border-radius:6px;
                       font-size:14px;
                       outline:none;
                       ">
            </div>

            <!-- KATEGORI -->
            <div style="margin-bottom:20px;">

                <label for="id_kategori"

                       style="
                       display:block;
                       font-weight:bold;
                       margin-bottom:8px;
                       color:#333;
                       ">

                    Kategori

                </label>

                <select name="id_kategori"
                        id="id_kategori"
                        required

                        style="
                        width:100%;
                        padding:12px;
                        border:1px solid #ccc;
                        border-radius:6px;
                        font-size:14px;
                        ">

                    <?php foreach($kategori as $k): ?>

                        <option value="<?= $k['id_kategori']; ?>"
                            <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>

                            <?= $k['nama_kategori']; ?>

                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <!-- ISI -->
            <div style="margin-bottom:20px;">

                <label for="isi"

                       style="
                       display:block;
                       font-weight:bold;
                       margin-bottom:8px;
                       color:#333;
                       ">

                    Isi Artikel

                </label>

                <textarea name="isi"
                          id="isi"
                          cols="50"
                          rows="10"
                          required

                          style="
                          width:100%;
                          padding:12px;
                          border:1px solid #ccc;
                          border-radius:6px;
                          font-size:14px;
                          font-family:sans-serif;
                          resize:vertical;
                          "><?= $artikel['isi']; ?></textarea>
            </div>

            <!-- STATUS -->
            <div style="margin-bottom:20px;">

                <label style="
                    display:block;
                    font-weight:bold;
                    margin-bottom:8px;
                    color:#333;
                ">
                    Status
                </label>

                <select name="status"

                        style="
                        width:100%;
                        padding:12px;
                        border:1px solid #ccc;
                        border-radius:6px;
                        font-size:14px;
                        ">

                    <option value="1"
                        <?= $artikel['status'] == 1 ? 'selected' : ''; ?>>
                        Published
                    </option>

                    <option value="0"
                        <?= $artikel['status'] == 0 ? 'selected' : ''; ?>>
                        Draft
                    </option>

                </select>
            </div>

            <!-- GAMBAR -->
            <div style="margin-bottom:20px;">

                <label for="gambar"

                       style="
                       display:block;
                       font-weight:bold;
                       margin-bottom:8px;
                       color:#333;
                       ">

                    Gambar Artikel

                </label>

                <?php if(!empty($artikel['gambar'])): ?>

                    <img src="<?= base_url('uploads/' . $artikel['gambar']); ?>"
                         class="img-preview"

                         style="
                         width:200px;
                         margin-bottom:15px;
                         border-radius:8px;
                         border:1px solid #ddd;
                         display:block;
                         ">

                <?php else: ?>

                    <img class="img-preview"

                         style="
                         width:200px;
                         margin-bottom:15px;
                         border-radius:8px;
                         border:1px solid #ddd;
                         display:none;
                         ">

                <?php endif; ?>

                <input type="file"
                       name="gambar"
                       id="gambar"
                       accept="image/*"

                       onchange="previewImage()"

                       style="
                       width:100%;
                       padding:10px;
                       border:1px solid #ccc;
                       border-radius:6px;
                       background:#fff;
                       ">

                <small style="color:#777;">
                    Kosongkan jika tidak ingin mengganti gambar.
                </small>
            </div>

            <!-- BUTTON -->
            <div style="
                margin-top:25px;
                display:flex;
                align-items:center;
                gap:15px;
            ">

                <button type="submit"

                        class="btn-submit"

                        style="
                        background-color:#4285f4;
                        color:white;
                        padding:12px 20px;
                        border:none;
                        border-radius:6px;
                        cursor:pointer;
                        font-weight:bold;
                        ">

                    💾 Simpan Perubahan

                </button>

                <a href="<?= base_url('/admin/artikel'); ?>"

                   style="
                   text-decoration:none;
                   color:#666;
                   font-size:14px;
                   ">

                    Batal

                </a>
            </div>

        </form>
    </div>
</div>

<!-- PREVIEW IMAGE -->
<script>

function previewImage() {

    const image =
        document.querySelector('#gambar');

    const imgPreview =
        document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {

        imgPreview.src =
            oFREvent.target.result;
    }
}

</script>

<?= $this->endSection(); ?>