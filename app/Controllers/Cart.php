<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Wildanfuady\WFcart\WFcart;

class Cart extends BaseController
{
    public function __construct()
    {
        // memanggil product model
        $this->product = new ProductModel;
        // membuat variabel untuk menampung class WFcart
        $this->cart = new WFcart();
        // memanggil form helper
        helper('form');
    }

    public function index()
    {
        $data = [
            // membuat variabel untuk menampung total keranjang belanja
            'items' => $this->cart->totals(),
            // menampilkan total belanja dari semua pembelian
            'total' => $this->cart->count_totals()
        ];

        // menampilkan halaman view cart
        return view('cart/index', $data);
    }

    public function beli($id = null)
    {
        // cari product berdasarkan id
        $product = $this->product->getProductId($id);
        // cek data product
        if ($product != null) { // jika product tidak kosong

            // buat variabel array untuk menampung data product
            $item = [
                'id'            => $product['id'],
                'type'          => $product['type'],
                'price'         => $product['price'],
                'image'         => $product['image'],
                'quantity'      => 1
            ];
            // tambahkan product ke dalam cart
            $this->cart->add_cart($id, $item);
            // tampilkan nama product yang ditambahkan
            $product = $item['type'];
            // success flashdata
            session()->setFlashdata('success', "Berhasil menambahkan {$product} ke keranjang");
        } else {
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data produk");
        }

        return redirect()->to('/product');
    }

    // function untuk update cart berdasarkan id dan quantity
    public function update()
    {
        // update cart
        $this->cart->update();
        return redirect()->to('/cart');
    }

    // function untuk menghapus cart berdasarkan id
    public function remove($id = null)
    {

        // cari product berdasarkan id
        $product = $this->product->getProductId($id);
        // cek data product
        if ($product != null) { // jika product tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($id);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus product dari keranjang");
        } else { // product tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data produk");
        }
        return redirect()->to('/cart');
    }
}
