<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use OrderHelper;

class OrderPage extends Controller
{

  public function index()
  {
    return view('content.pages.pages-order');
  }

  public function listOrder()
  {
    $dataPemesanan = OrderModel::orderBy('id', 'DESC')->get();
    $arrayPemesanan = [];
    $nomor = 1;
    foreach ($dataPemesanan as $pemesanan) {
        $haragaPemesanan = OrderHelper::jumTagihan($pemesanan);
        $arrayPemesanan[] = [
            'nomor' => $nomor++,
            'nama'  => $pemesanan->order_name,
            'hp'  => $pemesanan->order_hp,
            'tanggal'  => $pemesanan->order_date,
            'quantity'  => $pemesanan->order_quantity,
            'duration'  => $pemesanan->order_duration,
            'akomodasi' => ($pemesanan->order_penginapan) ? 'Y' : 'N',
            'transportasi' => ($pemesanan->order_transportasi) ? 'Y' : 'N',
            'makan' => ($pemesanan->order_makanan) ? 'Y' : 'N',
            'harga' => $haragaPemesanan,
            'totTagihan' => $haragaPemesanan * $pemesanan->order_quantity
        ];
    }
    return view('content.pages.pages-order-table', [
        'dataPemesanan' => $arrayPemesanan
    ]);
  }
}
