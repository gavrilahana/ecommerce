<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto', 'nama', 'harga', 'stok', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Optional: Custom validation rules for the model
    protected $validationRules = [
        'foto' => 'required|max_length[255]',
        'nama' => 'required|max_length[255]',
        'harga' => 'required|decimal',
        'stok' => 'required|integer'
    ];

    protected $validationMessages = [
        'foto' => [
            'required' => 'Foto is required',
            'max_length' => 'Foto cannot exceed 255 characters'
        ],
        'nama' => [
            'required' => 'Nama is required',
            'max_length' => 'Nama cannot exceed 255 characters'
        ],
        'harga' => [
            'required' => 'Harga is required',
            'decimal' => 'Harga must be a decimal value'
        ],
        'stok' => [
            'required' => 'Stok is required',
            'integer' => 'Stok must be an integer value'
        ]
    ];
}
