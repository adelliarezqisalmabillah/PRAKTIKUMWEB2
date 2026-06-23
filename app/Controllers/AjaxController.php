<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel; 

class AjaxController extends Controller
{
    // Menampilkan halaman utama AJAX
    public function index()
    {
        return view('ajax/index'); 
    }

    // Mengambil semua data artikel dan dikembalikan dalam format JSON
    public function getData()
    {
        $model = new ArtikelModel(); 
        $data = $model->findAll(); 
        
        return $this->response->setJSON($data); 
    }

    // Menghapus data artikel berdasarkan ID melalui request AJAX
    public function delete($id)
    {
        $model = new ArtikelModel(); 
        $model->delete($id); 
        
        $data = [
            'status' => 'OK' 
        ];
        
        return $this->response->setJSON($data); 
    }
}