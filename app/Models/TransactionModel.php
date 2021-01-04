<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $allowedFields = ['nama_lengkap', 'alamat', 'kota_tujuan', 'kurir', 'pembayaran', 'id_product'];
}
