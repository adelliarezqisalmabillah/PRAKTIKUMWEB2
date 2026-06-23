<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="row mb-3">
    <div class="col-md-8">
        <form id="search-form" class="form-inline d-flex gap-2">
            <input type="text" name="q" id="search-box" value="<?= $q; ?>"
                   placeholder="Cari judul artikel" class="form-control">

            <select name="kategori_id" id="category-filter" class="form-control">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="sort-filter" class="form-control">
                <option value="artikel.id-DESC">Terbaru</option>
                <option value="artikel.id-ASC">Terlama</option>
                <option value="artikel.judul-ASC">Judul (A-Z)</option>
                <option value="artikel.judul-DESC">Judul (Z-A)</option>
            </select>

            <input type="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
</div>

<div id="loading" style="display:none; text-align:center; padding:20px;">
    <div class="spinner-border text-primary" role="status"></div>
    <br><strong>Memuat data artikel...</strong>
</div>

<div id="article-container"></div>
<div id="pagination-container" class="mt-3"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');
    const sortFilter = $('#sort-filter');
    const loading = $('#loading');

    // Fungsi fetch data asynchronous via AJAX
    const fetchData = (url) => {
        loading.show();
        articleContainer.hide();
        paginationContainer.hide();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function(data) {
                loading.hide();
                articleContainer.show();
                paginationContainer.show();
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id, data.sort_by, data.sort_order);
            },
            error: function() {
                loading.hide();
                articleContainer.show();
                articleContainer.html('<div class="alert alert-danger">Gagal mengambil data dari server.</div>');
            }
        });
    };

    // Render data ke dalam bentuk tabel HTML
    const renderArticles = (articles) => {
        let html = `
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th>Judul & Ringkasan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>`;

        if (articles.length > 0) {
            articles.forEach(article => {
                let shortContent = article.isi ? article.isi.substring(0, 50) + '...' : '';
                html += `
                <tr>
                    <td>${article.id}</td>
                    <td>
                        <b>${article.judul}</b>
                        <p class="mb-0"><small class="text-muted">${shortContent}</small></p>
                    </td>
                    <td>${article.nama_kategori}</td>
                    <td><span class="badge bg-secondary">${article.status}</span></td>
                    <td>
                        <a class="btn btn-sm btn-info me-1" href="<?= base_url('admin/artikel/edit/'); ?>/${article.id}">Ubah</a>
                        <a class="btn btn-sm btn-danger btn-delete" href="<?= base_url('admin/artikel/delete/'); ?>/${article.id}">Hapus</a>
                    </td>
                </tr>`;
            });
        } else {
            html += '<tr><td colspan="5" class="text-center">Tidak ada data artikel.</td></tr>';
        }

        html += '</tbody></table>';
        articleContainer.html(html);
    };

    // Render komponen navigasi halaman secara konsisten
    const renderPagination = (pager, q, kategori_id, sort_by, sort_order) => {
        if (!pager || pager.pageCount <= 1) {
            paginationContainer.html('');
            return;
        }

        let html = '<nav><ul class="pagination">';

        for (let i = 1; i <= pager.pageCount; i++) {
            let url = `<?= base_url('admin/artikel'); ?>?page=${i}&q=${q || ''}&kategori_id=${kategori_id || ''}&sort_by=${sort_by || 'artikel.id'}&sort_order=${sort_order || 'DESC'}`;
            let activeClass = pager.currentPage == i ? 'active' : '';
            html += `<li class="page-item ${activeClass}">
                        <a class="page-link ajax-page" href="${url}">${i}</a>
                     </li>`;
        }

        html += '</ul></nav>';
        paginationContainer.html(html);
    };

    // Intersep perpindahan halaman melalui AJAX click event
    $(document).on('click', '.ajax-page', function(e) {
        e.preventDefault();
        let targetUrl = $(this).attr('href');
        if (targetUrl !== '#') {
            fetchData(targetUrl);
        }
    });

    // Validasi konfirmasi saat tombol hapus diklik
    $(document).on('click', '.btn-delete', function(e) {
        if (!confirm('Yakin ingin menghapus data artikel ini?')) {
            e.preventDefault();
        }
    });

    // Trigger pencarian utama
    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        const sortVal = sortFilter.val().split('-');
        const sortBy = sortVal[0];
        const sortOrder = sortVal[1];
        fetchData(`<?= base_url('admin/artikel'); ?>?q=${q}&kategori_id=${kategori_id}&sort_by=${sortBy}&sort_order=${sortOrder}`);
    });

    // Auto-submit saat dropdown kategori berganti nilai
    categoryFilter.on('change', function() {
        searchForm.trigger('submit');
    });

    // Auto-submit saat dropdown filter pengurutan berganti nilai
    sortFilter.on('change', function() {
        searchForm.trigger('submit');
    });

    // Inisialisasi pengambilan data pertama kali saat dokumen selesai dimuat
    fetchData('<?= base_url('admin/artikel'); ?>');
});
</script>

<?= $this->include('template/admin_footer'); ?>