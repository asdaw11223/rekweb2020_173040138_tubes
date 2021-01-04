<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use Wildanfuady\WFcart\WFcart;

class Transaction extends BaseController
{
    protected $productModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        // membuat variabel untuk menampung class WFcart
        $this->cart = new WFcart();
    }

    public function index()
    {
        // $data = [
        //     'product' => $this->productModel->getProduct($slug)
        // ];

        $data = [
            'items' => $this->cart->totals(),
            'total' => $this->cart->count_totals()
        ];

        // cara connect db dengan model
        return view('transaction/index', $data);
    }

    public function getCity()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: d9feda8a4866dd14b8ed8454e5985ec5"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);

            echo "<option>Pilih Kota</option>";
            // $data_pengirim = $response['rajaongkir']['results'];
            // return $data_pengirim;
            for ($i = 0; $i < count($response['rajaongkir']['results']); $i++) {
                echo "<option value='" . $response['rajaongkir']['results'][$i]['city_name'] . "'>" . $response['rajaongkir']['results'][$i]['city_name'] . "</option>";
            }
        }
    }

    public function saveTransaction($id)
    {
        $this->productModel->join('transaction', 'transaction.id_product=product.id');
        $this->transactionModel->save([
            'id_transaction' => $this->request->getVar('id_transaction'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'alamat' => $this->request->getVar('alamat'),
            'kota_tujuan' => $this->request->getVar('kota_tujuan'),
            'kurir' => $this->request->getVar('kurir'),
            'pembayaran' => $this->request->getVar('pembayaran'),
            'id_product' => $id
        ]);

        $this->cart->remove($id);
        session()->setFlashdata('pesan', 'Transaksi berhasil.');

        return redirect()->to('/product');
    }
}
