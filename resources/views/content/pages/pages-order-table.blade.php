@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pendaftaran')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>

<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
<script src="{{asset('assets/js/lib/page-order-table.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda/</span> Daftar Pemesanan</h4>

<div class="card mt-3">
    <h5 class="card-header">Pemesanan Wisata</h5>
    <div class="card-datatable table-responsive text-nowrap">
        <table class="dt-table-order table">
          <thead class="border-top table-light">
            <tr>
              <th>#</th>
              <th>NAMA</th>
              <th>NO HP/TELP</th>
              <th>TANGGAL PESANAN</th>
              <th>JUMLAH HARI</th>
              <th>JUMLAH PESERTA</th>
              <th>AKOMODASI</th>
              <th>TRANSPORTASI</th>
              <th>MAKANAN</th>
              <th>HARGA PAKET</th>
              <th>TOTAL TAGIHAN</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dataPemesanan as $pemesanan)
                <tr>
                    <td>{{ $pemesanan['nomor'] }}</td>
                    <td>{{ $pemesanan['nama'] }}</td>
                    <td>{{ $pemesanan['hp'] }}</td>
                    <td>{{ $pemesanan['tanggal'] }}</td>
                    <td>{{ $pemesanan['duration'] }}</td>
                    <td>{{ $pemesanan['quantity'] }}</td>
                   
                    <td>{{ $pemesanan['akomodasi'] }}</td>
                    <td>{{ $pemesanan['transportasi'] }}</td>
                    <td>{{ $pemesanan['makan'] }}</td>
                    <td>{{ $pemesanan['harga'] }}</td>
                    <td>{{ $pemesanan['totTagihan'] }}</td>
                    <td>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-danger ti ti-trash"></i></a>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-warning ti ti-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
        <!-- / table -->
    </div>
    <!-- / card-datatable -->
</div>
<!-- / card -->

@endsection
