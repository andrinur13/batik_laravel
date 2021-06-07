@extends('template.default')

@section('content')
<div class="">
    <div class="row">
        <div class="col-lg col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Data QR Code</h5>
                    <hr>
                    <button class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#add-qrcode">Tambah Data</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Kode</th>
                                    <th>QRCode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($qrcode as $qc)
                                <tr>
                                    <td> <img class="img-fluid" style="width: 50px" src="{{$qc['path_img']}}" alt=""> </td>
                                    <td class="font-weight-bold"> {{$qc['qrcode']}} </td>
                                    <td> <img style="width: 50px" src="{{$qc['path_qrcode']}}" alt=""> </td>
                                    <td> <span class="badge badge-primary">aksi</span> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add data paguyuban -->
<!-- Modal -->
<div class="modal fade" id="add-qrcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data QRCode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/dashboard/qrcode/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="motif_batik">Motif Batik</label>
                        <select class="custom-select" name="motif_batik">
                            <option selected>Pilih Batik...</option>
                            @foreach($batik as $btk)
                            <option value="{{ $btk['kode'] }}"> {{$btk['nama_batik']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama-paguyuban">Nama Paguyuban</label>
                        <select class="custom-select" name="nama_paguyuban">
                            <option selected>Pilih Paguyuban...</option>
                            @foreach($paguyuban as $pgy)
                            <option value="{{ $pgy['kode'] }}"> {{$pgy['nama_paguyuban']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_pembatik">Nama Pembatik</label>
                        <select class="custom-select" name="nama_pembatik">
                            <option selected>Pilih Pembatik...</option>
                            @foreach($pembatik as $pmb)
                            <option value="{{ $pmb['kode_pembatik'] }}"> {{$pmb['nama_pembatik']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pewarnaan">Pewarnaan</label>
                        <select class="custom-select" name="pewarnaan">
                            <option selected>Pilih Pewarnaan...</option>
                            @foreach($pewarnaan as $pwr)
                            <option value="{{ $pwr['kode'] }}"> {{$pwr['pelaku']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto-batik">Foto Batik</label>
                        <input type="file" class="form-control" name="foto_batik" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection