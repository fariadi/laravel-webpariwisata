<?php

namespace App\Helpers;

use Config;
use Illuminate\Support\Str;

class OrderHelpers
{
    /**
     * Fungsi untuk menghitung jumlahTagihan.
     *
     * @param object $data
     * @return int Hasil
     */
    public static function jumTagihan($data)
    {
        $hargaPenginapan = ($data->order_penginapan) ? $data->order_penginapan : 0;
        $hargaTransportasi = ($data->order_transportasi) ? $data->order_transportasi : 0;
        $hargaMakanan = ($data->order_makanan) ? $data->order_makanan : 0;
        
        return $hargaPenginapan + $hargaTransportasi + $hargaMakanan;
    }
}