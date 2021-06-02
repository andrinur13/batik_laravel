@extends('template.default')

@section('content')
<div class="">
    <div class="row">
        <div class="col-lg col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Data Paguyuban</h5>
                    <hr>
                    <button class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#add-paguyuban">Tambah Data</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Paguyuban</th>
                                    <th style="width: fit-content">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paguyuban as $index)
                                <tr>
                                    <td> {{ $index['nama_paguyuban'] }} </td>
                                    <td>
                                        <a href="/dashboard/paguyuban/delete/{{ $index['id'] }}" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="add-paguyuban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Paguyuban</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="paguyuban/add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama-paguyuban">Nama Paguyuban</label>
                        <input type="text" class="form-control" id="nama-paguyuban" placeholder="Nama Paguyuban">
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