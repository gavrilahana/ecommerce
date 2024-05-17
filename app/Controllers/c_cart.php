<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangModel;
use App\Models\JualModel;

class c_cart extends Controller
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];

        $barangModel = new BarangModel();
        $data['barang'] = [];

        foreach ($barangModel->findAll() as $barang) {
            $id = $barang['id'];

            if (isset($cart[$id])) {
                $barang['quantity'] = $cart[$id]['quantity'];
                $barang['subtotal'] = $barang['harga'] * $cart[$id]['quantity'];
                $data['barang'][$id] = $barang;
            }
        }

        return view('v_cart', $data);
    }

    public function add($id)
    {
        $barangModel = new BarangModel();
        $item = $barangModel->find($id);

        if ($item) {
            if ($item['stok'] === 0) {
                return redirect()->back()->with('error', 'Stok barang habis');
            }

            $cart = session()->get('cart') ?? [];

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'nama' => $item['nama'],
                    'harga' => $item['harga'],
                    'quantity' => 1,
                ];
            }

            $item['stok']--;
            $barangModel->update($id, ['stok' => $item['stok']]);

            session()->set('cart', $cart);
            session()->setFlashdata('success', 'Item added to cart');
        }

        return redirect()->to('/v_cart');
    }
}
