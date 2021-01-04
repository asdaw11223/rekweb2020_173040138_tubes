<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table = 'brand';
    protected $allowedFields = ['id_brand', 'nama_brand'];
}
