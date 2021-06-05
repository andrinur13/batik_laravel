@extends('template.default')

@section('content')
<div class="">
    <div class="row">
        <div class="col-lg col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Data Pembatik</h5>
                    <!-- <hr>
                    <button class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#add-pembatik">Tambah Data</button> -->
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Pelaku</th>
                                    <!-- <th style="width: fit-content">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pewarnaan as $index)
                                <tr>
                                    <td> {{$index['kode']}} </td>
                                    <td> {{$index['pelaku']}} </td>
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
@endsection