<?= $this->include('template/header'); ?> [cite: 83]

<div class="container mt-4">
    <h1>Data Artikel</h1> [cite: 84]
    <table class="table-data table table-striped" id="artikelTable"> [cite: 85]
        <thead>
            <tr>
                <th>ID</th> [cite: 88]
                <th>Judul</th> [cite: 89]
                <th>Status</th> [cite: 90]
                <th>Aksi</th> [cite: 91]
            </tr>
        </thead>
        <tbody>
            [cite: 94]
        </tbody>
    </table>
</div>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script> [cite: 96]

<script>
$(document).ready(function() { [cite: 97]
    
    // Panggil fungsi loadData saat halaman pertama kali dimuat [cite: 139]
    loadData();

    // Fungsi untuk menampilkan pesan loading saat data sedang diambil [cite: 98]
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center">Loading data...</td></tr>'); [cite: 99, 100]
    }

    // Fungsi utama untuk mengambil data artikel via AJAX [cite: 106, 107]
    function loadData() {
        showLoadingMessage(); // Tampilkan loading di awal [cite: 109]
        
        $.ajax({ [cite: 111]
            url: "<?= base_url('ajax/getData') ?>", // Mengarah ke fungsi getData di Controller [cite: 115]
            method: "GET", [cite: 116]
            dataType: "json", [cite: 117]
            success: function(data) { [cite: 118]
                var tableBody = ""; [cite: 120]
                
                // Looping data dari server dan memasukkannya ke elemen tabel [cite: 119, 121]
                for (var i = 0; i < data.length; i++) { [cite: 121]
                    var row = data[i]; [cite: 122]
                    
                    tableBody += '<tr>'; [cite: 123]
                    tableBody += '<td>' + row.id + '</td>'; [cite: 124]
                    tableBody += '<td>' + row.judul + '</td>'; [cite: 124]
                    tableBody += '<td><span class="status">---</span></td>'; // Placeholder status [cite: 112, 125, 126]
                    tableBody += '<td>'; [cite: 126]
                    tableBody += '<a href="<?= base_url('artikel/edit/') ?>' + row.id + '" class="btn btn-primary btn-sm me-2">Edit</a>'; [cite: 114, 128]
                    tableBody += '<a href="#" class="btn btn-danger btn-sm btn-delete" data-id="' + row.id + '">Delete</a>'; [cite: 129, 130]
                    tableBody += '<td>'; [cite: 126]
                    tableBody += '</td>'; [cite: 134]
                    tableBody += '</tr>'; [cite: 136]
                }
                
                // Masukkan susunan HTML ke dalam tbody tabel [cite: 137]
                $('#artikelTable tbody').html(tableBody);
            },
            error: function() {
                alert('Gagal memuat data artikel.');
            }
        });
    }

    // Handling event klik tombol Delete memanfaatkan event delegation [cite: 140, 141]
    $(document).on('click', '.btn-delete', function(e) { [cite: 141]
        e.preventDefault(); [cite: 142]
        
        var id = $(this).data('id'); [cite: 143]
        console.log('Delete button clicked for ID:', id); [cite: 161]
        
        // Munculkan dialog konfirmasi sebelum menghapus [cite: 144, 146]
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) { [cite: 146]
            $.ajax({ [cite: 150]
                url: "<?= base_url('ajax/delete/') ?>" + id, // URL delete pada AjaxController [cite: 151]
                method: "DELETE", [cite: 151]
                success: function(response) { [cite: 152]
                    loadData(); // Memuat ulang data tabel secara dinamis tanpa reload halaman [cite: 153]
                },
                error: function(jqXHR, textStatus, errorThrown) { [cite: 155]
                    alert('Error deleting article: ' + textStatus + ' - ' + errorThrown); [cite: 156, 157]
                }
            });
        }
    });
});
</script>

<?= $this->include('template/footer'); ?> [cite: 165]