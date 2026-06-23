<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    // Method untuk halaman publik (pengunjung biasa)
    public function index()
    {
        $model = new ArtikelModel();
        $data = [
            'title'   => 'Daftar Artikel',
            'artikel' => $model->findAll()
        ];
        return view('artikel/index', $data);
    }
    
    // Method untuk halaman manajemen data (Admin) berteknologi AJAX
    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();
        
        // Mengambil query pencarian, filter kategori, sorting, dan halaman aktif
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page = $this->request->getVar('page') ?? 1;
        
        // Fitur Tambahan: Mengambil parameter sorting dari request AJAX/Form
        $sortBy = $this->request->getVar('sort_by') ?? 'artikel.id';
        $sortOrder = $this->request->getVar('sort_order') ?? 'DESC';

        // Mengatur Builder Query untuk join tabel artikel dengan kategori
        $builder = $model->table('artikel')
                         ->select('artikel.*, kategori.nama_kategori')
                         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

        // Filter Pencarian Judul
        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }

        // Filter Berdasarkan Kategori
        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }
        
        // Menerapkan fitur pengurutan (Sorting) pada Query Builder
        $builder->orderBy($sortBy, $sortOrder);

        // Eksekusi pagination (10 data per halaman)
        $artikel = $builder->paginate(10, 'default', $page);
        $pager = $model->pager;

        // Menyiapkan struktur data Pager yang aman untuk dikonversi ke JSON (Mencegah Error Maksimal Stack)
        $pagerData = [
            'currentPage' => $pager->getCurrentPage('default'),
            'pageCount'   => $pager->getPageCount('default'),
            // Memetakan links pagination bawaan CI4 agar mudah di-render oleh JavaScript
            'links'       => $pager->links('default', 'default_full') 
        ];

        // Menyiapkan data array untuk dikirim
        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'sort_by'     => $sortBy,
            'sort_order'  => $sortOrder,
            'artikel'     => $artikel,
            'pager'       => $pagerData 
        ];

        // Cek jika request datang dari AJAX
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
            // Jika diakses manual lewat browser, muat halaman beserta daftar kategorinya
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            return view('artikel/admin_index', $data);
        }
    }
}