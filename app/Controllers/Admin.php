<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use \Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    protected $productModel;
    protected $brandModel;
    protected $transactionModel;
    protected $userModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->brandModel = new BrandModel();
        $this->transactionModel = new TransactionModel();
        $this->userModel = new UserModel();
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
            // 'product' => $this->productModel->findAll(),
            'product' => $product->paginate(5, 'product'),
            'pager' => $this->productModel->join('brand', 'brand.id_brand=product.id_brand')->pager,
            'currentPage' => $currentPage
        ];

        // cara connect db dengan model
        return view('admin/product/product', $data);
    }

    public function addProduct()
    {
        // session();
        $data = [
            'brand' => $this->brandModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('/admin/product/addProduct', $data);
    }

    public function saveProduct()
    {
        // validasi input
        if (!$this->validate([
            'type' => [
                'rules' => 'required|is_unique[product.type]',
                'errors' => [
                    'required' => '{field} tipe harus diisi.',
                    'is_unique' => '{field} tipe sudah terdaftar.'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/addProduct')->withInput()->with('validation', $validation);
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('image');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'sampul_default.jpg';
        } else {
            // generate nama sampul random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        }

        $slug = url_title($this->request->getVar('type'), '-', true);
        $this->productModel->save([
            'id_brand' => $this->request->getVar('id_brand'),
            'type' => $this->request->getVar('type'),
            'slug' => $slug,
            'price' => $this->request->getVar('price'),
            'os' => $this->request->getVar('os'),
            'storage' => $this->request->getVar('storage'),
            'cpu' => $this->request->getVar('cpu'),
            'ram' => $this->request->getVar('ram'),
            'image' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Produk berhasil ditambahkan.');

        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'brand' => $this->brandModel->findAll(),
            'product' => $this->productModel->getProduct($slug)
        ];

        return view('admin/product/editProduct', $data);
    }

    public function delete($id)
    {
        //cari berdasarkan id
        $product = $this->productModel->find($id);

        //cek jika file gambarnya default
        if ($product['image'] != 'sampul_default.jpg') {
            //hapus gambar
            unlink('img/' . $product['image']);
        }

        $this->productModel->delete($id);
        session()->setFlashdata('pesan', 'Produk berhasil dihapus');
        return redirect()->to('/admin');
    }

    public function update($id)
    {
        // cek judul
        $tipeLama = $this->productModel->getProduct($this->request->getVar('slug'));
        if ($tipeLama['type'] == $this->request->getVar('type')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[product.type]';
        }

        if (!$this->validate([
            'type' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} tipe harus diisi.',
                    'is_unique' => '{field} tipe sudah terdaftar.'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'id_brand' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => '{field} pilih kembali brand product ini.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/edit-product/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $fileGambar = $this->request->getFile('image');

        // cek gambar, apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan gambar
            $fileGambar->move('img', $namaGambar);
            // hapus file yang lama
            if ($this->request->getVar('gambarLama') != 'sampul_default.jpg') {
                unlink('img/' . $this->request->getVar('gambarLama'));
            }
        }

        // agar sampul_default.jpg tidak terhapus
        $slug = url_title($this->request->getVar('type'), '-', true);
        $this->productModel->save([
            'id' => $id,
            'id_brand' => $this->request->getVar('id_brand'),
            'type' => $this->request->getVar('type'),
            'slug' => $slug,
            'price' => $this->request->getVar('price'),
            'os' => $this->request->getVar('os'),
            'storage' => $this->request->getVar('storage'),
            'cpu' => $this->request->getVar('cpu'),
            'ram' => $this->request->getVar('ram'),
            'image' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Produk berhasil diubah.');

        return redirect()->to('/admin');
    }

    public function users()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        // $data = [
        //     'users' => $this->userModel->findAll()
        // ];

        $data['users'] = $query->getResult();

        // cara connect db dengan model
        return view('admin/users/users', $data);
    }

    public function brand()
    {
        $data = [
            'brand' => $this->brandModel->findAll()
        ];

        // cara connect db dengan model
        return view('admin/brand/brand', $data);
    }

    public function order()
    {
        $transaction = $this->transactionModel->join('product', 'product.id = transaction.id_product');

        $data = [
            'transaction' => $transaction->findAll()
        ];

        // cara connect db dengan model
        return view('admin/order/order', $data);
    }
}
