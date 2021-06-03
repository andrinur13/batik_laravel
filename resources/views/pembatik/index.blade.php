@extends('template.default')

@section('content')
<div class="">
    <div class="row">
        <div class="col-lg col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Data Pembatik</h5>
                    <hr>
                    <button class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#add-pembatik">Tambah Data</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Pembatik</th>
                                    <th>Paguyuban</th>
                                    <th style="width: fit-content">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembatik as $index)
                                <tr>
                                    <td> {{$index['kode_pembatik']}} </td>
                                    <td> {{$index['nama_pembatik']}} </td>
                                    <td> {{$index['kode_paguyuban']}} </td>
                                    <td>
                                        @php($urldelete = '/dashboard/pembatik/delete/')
                                        <a href="{{ url($urldelete) . '/' . $index['id'] }}" class="badge badge-danger">Hapus</a>
                                    </td>
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
<div class="modal fade" id="add-pembatik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembatik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/dashboard/pembatik/store') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama-paguyuban">Nama Paguyuban</label>
                        <input type="text" class="form-control" name="nama_pembatik" required placeholder="Nama Pembatik">
                    </div>
                    <div class="form-group">
                        <label for="kode-pembatik">Kode Pembatik</label>
                        <input type="text" class="form-control" name="kode_pembatik" required placeholder="Kode Pembatik">
                    </div>
                    <div>
                        <label for="">Asal Paguyuban</label>
                        <select class="custom-select" name="kode_paguyuban">
                            <option selected>Pilih Paguyuban...</option>
                            @foreach($paguyuban as $pgy)
                            <option value="{{ $pgy['kode'] }}"> {{$pgy['nama_paguyuban']}} </option>
                            @endforeach
                        </select>
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