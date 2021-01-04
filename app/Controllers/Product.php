<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Wildanfuady\WFcart\WFcart;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->cart = new WFcart();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel->join('brand', 'brand.id_brand=product.id_brand');
        }

        $data = [
            // 'product' => $this->productModel->findAll(),
            'product' => $product->paginate(8, 'product'),
            'pager' => $this->productModel->pager,
            'total' => $this->cart->totals()
        ];

        // cara connect db dengan model
        return view('product/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'product' => $this->productModel->getProduct($slug)
        ];

        // jika produk tidak ada di tabel
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' tidak ditemukan.');
        }

        return view('product/detail', $data);
    }
}
