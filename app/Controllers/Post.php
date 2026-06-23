<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use ResponseTrait;

    // GET: Menampilkan semua data artikel
    public function index()
    {
        $model = new ArtikelModel();
        // Mengurutkan berdasarkan ID terbaru agar sinkron dengan visualisasi tabel frontend
        $data['artikel'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // GET: Menampilkan satu data artikel berdasarkan ID
    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->where('id', $id)->first();
        
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    // POST: Menambah data artikel baru (Sinkron dengan tombol Simpan di VueJS)
    public function create()
    {
        $model = new ArtikelModel();
        $data = [
            'judul'  => $this->request->getVar('judul'),
            'isi'    => $this->request->getVar('isi'),
            'status' => $this->request->getVar('status') ?? 0, // Ditambahkan agar status Draft/Publish tersimpan
        ];
        
        $model->insert($data);
        
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data artikel berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }

    // PUT: Mengubah data artikel berdasarkan ID dari parameter URL
    public function update($id = null)
    {
        $model = new ArtikelModel();
        
        // Cek validasi eksistensi data sebelum diubah
        $cekData = $model->find($id);
        if (!$cekData) {
            return $this->failNotFound('Data tidak ditemukan.');
        }

        // Membaca Raw Input JSON / URL-Encoded dari Axios.put() frontend
        $input = $this->request->getRawInput();
        $data = [
            'judul'  => $input['judul'] ?? $cekData['judul'],
            'isi'    => $input['isi'] ?? $cekData['isi'],
            'status' => $input['status'] ?? $cekData['status'], // Menjaga nilai status ter-update dengan benar
        ];

        $model->update($id, $data);
        
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data artikel berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }

    // DELETE: Menghapus data artikel berdasarkan ID
    public function delete($id = null)
    {
        $model = new ArtikelModel();
        $cekData = $model->find($id);
        
        if ($cekData) {
            $model->delete($id); // Eksekusi penghapusan tunggal aman
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data artikel berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}