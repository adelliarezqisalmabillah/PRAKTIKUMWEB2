<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    // ==========================================
    // BAGIAN USER (HALAMAN DEPAN)
    // ==========================================

    public function index()
    {
        $data = [
            'title'   => 'Daftar Artikel',
            'artikel' => $this->artikelModel->paginate(6, 'artikel'), 
            'pager'   => $this->artikelModel->pager,
        ];

        return view('artikel/index', $data);
    }

    public function view($slug)
    {
        $artikel = $this->artikelModel->where('slug', $slug)->first();

        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound("Artikel tidak ditemukan.");
        }

        $data = [
            'title'   => $artikel['judul'],
            'artikel' => $artikel
        ];

        return view('artikel/view', $data);
    }

    // ==========================================
    // BAGIAN ADMIN (CRUD)
    // ==========================================

    public function admin_index()
    {
        $data = [
            'title'   => 'Halaman Admin - Artikel',
            'artikel' => $this->artikelModel->paginate(10, 'artikel'),
            'pager'   => $this->artikelModel->pager
        ];

        return view('admin/artikel_index', $data);
    }

    /**
     * Tambah Artikel Baru dengan Upload Gambar
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = null;

            // Jika ada file yang diunggah
            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('uploads', $namaGambar);
            }

            $this->artikelModel->save([
                'judul'  => $this->request->getPost('judul'),
                'isi'    => $this->request->getPost('isi'),
                'status' => $this->request->getPost('status') ?? 1,
                'gambar' => $namaGambar,
                'slug'   => url_title($this->request->getPost('judul'), '-', true)
            ]);

            session()->setFlashdata('pesan', 'Artikel berhasil diterbitkan!');
            return redirect()->to('/admin/artikel');
        }

        return view('admin/artikel_add', ['title' => 'Tambah Artikel']);
    }

    /**
     * Edit Artikel dengan Update Gambar
     */
    public function edit($id)
    {
        $artikelLama = $this->artikelModel->find($id);

        if ($this->request->is('post')) {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $artikelLama['gambar']; // Default pakai nama lama

            // Jika user mengunggah gambar baru
            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('uploads', $namaGambar);

                // Hapus gambar lama dari folder jika ada
                if ($artikelLama['gambar'] && file_exists('uploads/' . $artikelLama['gambar'])) {
                    unlink('uploads/' . $artikelLama['gambar']);
                }
            }

            $this->artikelModel->update($id, [
                'judul'  => $this->request->getPost('judul'),
                'isi'    => $this->request->getPost('isi'),
                'status' => $this->request->getPost('status'),
                'gambar' => $namaGambar,
                'slug'   => url_title($this->request->getPost('judul'), '-', true)
            ]);

            session()->setFlashdata('pesan', 'Artikel berhasil diperbarui!');
            return redirect()->to('/admin/artikel');
        }

        if (!$artikelLama) {
            throw PageNotFoundException::forPageNotFound("Data tidak ditemukan.");
        }

        return view('admin/artikel_edit', [
            'title'   => 'Edit Artikel',
            'artikel' => $artikelLama
        ]);
    }

    /**
     * Hapus Artikel dan File Gambarnya
     */
    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);

        if ($artikel) {
            // Hapus file gambar dari folder uploads
            if ($artikel['gambar'] && file_exists('uploads/' . $artikel['gambar'])) {
                unlink('uploads/' . $artikel['gambar']);
            }
            
            $this->artikelModel->delete($id);
            session()->setFlashdata('pesan', 'Artikel telah dihapus.');
        }

        return redirect()->to('/admin/artikel');
    }
}