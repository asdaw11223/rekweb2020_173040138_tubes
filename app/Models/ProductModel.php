<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $allowedFields = ['type', 'slug', 'price', 'os', 'storage', 'cpu', 'ram', 'image', 'id_brand'];

    public function search($keyword)
    {
        return $this->table('product')->join('brand', 'brand.id_brand=product.id_brand')->like('brand.nama_brand', $keyword)->orLike('product.type', $keyword);
    }

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->join('brand', 'brand.id_brand=product.id_brand')->findAll();
        }

        return $this->join('brand', 'brand.id_brand=product.id_brand')->where(['slug' => $slug])->first();
    }

    public function getProductId($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }
}
