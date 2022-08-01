<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use function PHPSTORM_META\map;

class Barang extends BaseController
{
    use ResponseTrait;
    protected $barangModel;
    public function __construct()
    {
        $this->session = session();
        $this->barangModel = new \App\Models\Barang();
    }
    public function index()
    {
        $tableName = 'Daftar Barang';
        $tableHead = ['id_barang', 'nama_barang','stok', 'harga'];
        $barang = $this->barangModel->findAll();
        $dataColumn = ['id_barang', 'nama_barang','stok', 'harga'];
        if ($barang) {
            
        $message = [
            'title' => 'Kelola Barang',
            'pageName' => 'Kelola data Barang',
            'menu' => 'manajemenbarang',
            'tambah' => 'barang',
            'tableName' => $tableName,
            'tableHead' => $tableHead,
            'tableData' => $barang,
            'dataColumn' => $dataColumn
        ];

        } else {
            $message = ['message' => 'Data Tidak Ditemukan', 'error' => $barang->error()];
        }
        
        return $this->setResponseFormat('json')->respond($message, 200);
        
    }

    public function store()
    {
        $barang = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga'    => $this->request->getPost('harga'),
            'stok'    => $this->request->getPost('stok')
        ];
        
        $result = $this->barangModel->insert($barang);
        if ($result) {
           $message = ['messasge' => 'Data Berhasil Ditambahkan', 'data' => $barang];
        } else {
            $message = ['message' => 'Data Tidak Berhasil Ditambahkan', 'error' => $result->error()];
        }
        return $this->setResponseFormat('json')->respond($message, 200);
    }

    public function update()
    {
        $data = [
            'id_barang' => $this->request->getPost('id_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga'    => $this->request->getPost('harga'),
            'stok'    => $this->request->getPost('stok')
        ];

        $result = $this->barangModel->update($this->request->getPost('id_barang'), $data);
        if ($result) {
        $message = ['messasge' => 'Data Berhasil Diupdate', 'data' => $data];
        } else {
            $message = ['message' => 'Data Tidak Berhasil DIupdate', 'error' => $barang->error()];

        }

        return $this->setResponseFormat('json')->respond($message, 200);
    }

    public function destroy()
    {
        $id_barang = $this->request->getPost('id_barang');
    try {
        $this->barangModel->delete($id_barang);
        $message = ['messasge' => 'Data Berhasil Dihapus', 'id_barang' => $id_barang];
        return $this->setResponseFormat('json')->respond($message, 200);
    } catch (\Exception $th) {
        $message = ['message' => 'Data Tidak Dihapus','id_barang' => $id_barang , 'error' => $barang->error() ,$th];
        return $this->setResponseFormat('json')->respond($message, 200);
    }
       
    }
}
