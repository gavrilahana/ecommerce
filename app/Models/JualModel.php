<?php

namespace App\Models;

use CodeIgniter\Model;

class JualModel extends Model
{
    protected $table      = 'jual';
    protected $primaryKey = 'id';
    protected $allowedFields = ['penjualan_id', 'barang_id', 'jumlah', 'harga_brg'];
    protected $useTimestamps = true;
}
