<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{protected $table      = 'barang';
    protected $primaryKey = 'id_barang';
    protected function initialize()
    {
        $this->allowedFields[] = 'id_barang';
        $this->allowedFields[] = 'nama_barang';
        $this->allowedFields[] = 'stok';
        $this->allowedFields[] = 'harga';
    }

}
