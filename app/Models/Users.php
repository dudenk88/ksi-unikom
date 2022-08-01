<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected function initialize()
    {
        $this->allowedFields[] = 'id';
        $this->allowedFields[] = 'username';
        $this->allowedFields[] = 'password';
    }
}
