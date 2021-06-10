@extends('template.default')

@section('content')
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Paguyuban</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$jumlah_paguyuban}} Paguyuban </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Pembatik</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$jumlah_pembatik}} Pembatik </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-palette fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Motif Batik</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$jumlah_motif}} Motif Batik </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Kodefikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$jumlah_kodefikasi}} Kodefikasi </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-qrcode fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection