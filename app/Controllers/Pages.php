<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Models\ProductModel;

class Pages extends BaseController
{
    protected $brandModel;
    protected $productModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel->join('brand', 'brand.id_brand=product.id_brand');
        }

        $data = [
            'product' => $product->paginate(3, 'product'),
            'pager' => $this->productModel->join('brand', 'brand.id_brand=product.id_brand')->pager,
            'currentPage' => $currentPage
        ];

        return view('pages/home', $data);
    }
}
