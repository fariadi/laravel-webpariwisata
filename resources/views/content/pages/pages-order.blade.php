@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pendaftaran')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/form-layouts.js')}}"></script>
<script src="{{asset('assets/js/lib/page-order-form.js')}}"></script>
@endsection


@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Beranda/</span> Pendaftaran Wisata</h4>
<div class="row g-3">
    <div class="col-md-9">
        <div class="card mb-4">
            <h5 class="card-header">Form Pemesanan Paket Wisata</h5>
             <!-- / card-header -->
            <form class="card-body" id="form-order" onsubmit="return false">
                <h6>1. Pemesanan</h6>
                <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="order-name">Nama Pemesan</label>
                    <input type="text" name="order_name" id="order-name" class="form-control" placeholder="john.doe" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="order-hp">Nomor HP</label>
                    <input type="text" name="order_hp" id="order-hp" class="form-control phone-mask" placeholder="0800 0000 0000" aria-label="0800 0000 0000" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="order-date">Tanggal Pemesanan</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="order_date" id="order-date" class="form-control" placeholder="" aria-describedby="" />
                        <span class="input-group-text cursor-pointer" id=""><i class="ti ti-calendar"></i></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="">Durasi Perjalanan</label>
                    <div class="input-group input-group-merge">
                    <input type="text" name="order_duration" id="" class="form-control" placeholder="1" aria-label="1" aria-describedby="" />
                    <span class="input-group-text" id="">Hari</span>
                    </div>
                </div>
                </div>
                <hr class="my-4 mx-n4" />
                <h6>2. Pilih Layanan Paket Perjalan</h6>
                <div class="row g-3 mb-2">
                <div class="col-md-4">
                    <label class="form-label" for="">Jumlah Peserta</label>
                    <div class="input-group input-group-merge">
                    <input type="text" name="order_quantity" id="jumlahPeserta" class="form-control" placeholder="1" aria-label="1" aria-describedby="" />
                    <span class="input-group-text" id="">Orang</span>
                    </div>
                </div>
                </div>
                <label class="form-label" for="">Pelayanan Paket Perjalanan</label>
                <div class="row">
                    <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="hargaPenginapan">
                            <input class="form-check-input" name="order_penginapan" type="checkbox" value="1000000" id="hargaPenginapan"/>
                            <span class="custom-option-header">
                            <span class="h6 mb-0">Penginapan</span>
                            <span class="text-muted">Rp. 1.000.0000</span>
                            </span>
                            <span class="custom-option-body">
                            <small class="option-text">Diskon 20% !</small>
                            </span>
                        </label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="hargaTransportasi">
                            <input class="form-check-input" name="order_transportasi" type="checkbox" value="1200000" id="hargaTransportasi" />
                            <span class="custom-option-header">
                            <span class="h6 mb-0">Transportasi</span>
                            <span class="text-muted">Rp. 1.200.000</span>
                            </span>
                            <span class="custom-option-body">
                            <small>-</small>
                            </span>
                        </label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="hargaMakan">
                            <input class="form-check-input" name="order_makanan" type="checkbox" value="500000" id="hargaMakan" />
                            <span class="custom-option-header">
                            <span class="h6 mb-0">Makanan</span>
                            <span class="text-muted">Rp. 500.000</span>
                            </span>
                            <span class="custom-option-body">
                            <small>-</small>
                            </span>
                        </label>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-4">
                        <label class="form-label" for="">Harga Paket</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" class="form-control" name="harga_paket" placeholder="100" aria-label="Amount (to the nearest dollar)" />
                            <span class="input-group-text"></span>
                        </div>
                        <div class="row g-3 mb-2 mt-1">
                            <div class="d-grid gap-2 col-lg-12 mx-auto">
                                <button type="button" id="btnHitungTagihan" class="btn btn-warning  waves-effect waves-light me-sm-3 me-1">Hitung Tagihan</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row g-3 mb-2">
                    <div class="col-md-4">
                        <label class="form-label" for="">Jumlah Tagihan</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" class="form-control" name="jumlah_tagihan" placeholder="100" aria-label="Amount (to the nearest dollar)" />
                        </div>
                    </div>
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan & Selesai</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
            <!-- / card-body -->
        </div>
        <!-- / card -->
    </div>
    <div class="col-md-3">
    </div>
</div>


@endsection
