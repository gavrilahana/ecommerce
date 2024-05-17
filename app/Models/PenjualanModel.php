<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table      = 'penjualan';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['nama', 'alamat', 'hp', 'kode_pos', 'total'];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
