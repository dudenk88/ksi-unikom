<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new \App\Models\Barang();
    }
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
        $data = [
            'nama_barang' => static::faker()->word(),
            'stok'         => static::faker()->randomNumber(2, true),
            'harga'       => static::faker()->randomNumber(5, true),
        ];

        $this->barangModel->insert($data);
    }

    }
}
