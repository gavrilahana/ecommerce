<?php
namespace App\Models;

use CodeIgniter\Model;

class Jual extends Model
{
    protected $table = 'penjualan_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'jumlah', 'harga'];
    
    // Method to add cart data to the database
    public function addCartData($cartData)
    {
        return $this->insert($cartData);
    }
}
