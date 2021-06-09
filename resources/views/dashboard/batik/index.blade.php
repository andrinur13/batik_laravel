@extends('template.default')

@section('content')
<div class="">
    <div class="row">
        <div class="col-lg col-md col-sm">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Data Batik</h5>
                    <!-- <hr>
                    <button class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#add-pembatik">Tambah Data</button> -->
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Batik</th>
                                    <!-- <th style="width: fit-content">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($batik as $index)
                                <tr>
                                    <td> {{$index['kode']}} </td>
                                    <td> {{$index['nama_batik']}} </td>
                                    <!-- <td>
                                        @php($urldelete = '/dashboard/pembatik/delete/')
                                        <a href="{{ url($urldelete) . '/' . $index['id'] }}" class="badge badge-danger">Hapus</a>
                                    </td> -->
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

@endsection