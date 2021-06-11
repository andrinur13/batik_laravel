@extends('template.default')

@section('content')
<div>
    <div class="row">
        <div class="col-lg col-md col-sm">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Data QR Code</h5>
                    <hr>
                    <button class="btn btn-sm btn-primary my-1" data-toggle="modal" data-target="#add-qrcode">Tambah Data</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Gambar</th>
                                    <th>Kode</th>
                                    <th>QRCode</th>
                                    <th>Grade</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($qrcode as $qc)
                                <tr>
                                    <td> <img class="img-fluid" style="width: 50px" src="{{ '/' . $qc['path_img']}}" alt=""> </td>
                                    <td class="font-weight-bold"> {{$qc['qrcode']}} </td>
                                    <td> <img style="width: 50px" src="{{ '/' . $qc['path_qrcode']}}" alt=""> </td>
                                    <td> <span class="bg-success py-1 px-3 text-light font-weight-bold" style="border-radius: 10px;">{{$qc['grade']}}</span> </td>
                                    <td> <a href="{{ url('dashboard/qrcode/download/' . $qc['id']) }}" class="btn btn-primary"> <i class="fas fa-fw fa-download"></i> </a> </td>
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
    <div class="modal-dialog modal-dialog-centered" id="app" role="document">
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
                            <option value="00">Dominan</option>
                            @foreach($batik as $btk)
                            <option value="{{ $btk['kode'] }}"> {{$btk['nama_batik']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama-paguyuban">Nama Paguyuban</label>
                        <select class="custom-select" name="nama_paguyuban" v-model="filled.paguyuban">
                            <option value="null" selected>Pilih Paguyuban...</option>
                            @foreach($paguyuban as $pgy)
                            <option value="{{ $pgy['kode'] }}"> {{$pgy['nama_paguyuban']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_pembatik">Nama Pembatik</label>
                        <select class="custom-select" name="nama_pembatik" v-model="filled.pembatik">
                            <option selected value="null">Pilih Pembatik...</option>
                            <option v-for="item in options.pembatik" :value="item.kode_pembatik" v-text="item.nama_pembatik"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pewarnaan">Pewarnaan</label>
                        <select class="custom-select" name="pewarnaan" v-model="filled.pewarnaan">
                            <option selected value="null">Pilih Pewarnaan...</option>
                            <option value="EX">Eksternal</option>
                            <option v-for="item in options.pewarnaan" :value="item.kode_pembatik" v-text="item.nama_pembatik"> </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pewarnaan">Grade</label>
                        <select class="custom-select" name="grade">
                            <option selected value="null">Pilih Pewarnaan...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="0">Belum di Nilai</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto-batik">Foto Batik</label>
                        <input type="file" class="form-control" name="foto_batik" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsibatik">Deskripsi Batik</label>
                        <textarea class="form-control" id="deskripsibatik" rows="4" name="deskripsibatik"></textarea>
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

@section('script-custom')
<script src="{{env('VUE_JS')}}"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!',
            urlSite: '<?= env("APP_URL"); ?>',
            filled: {
                paguyuban: null,
                pembatik: null,
                pewarnaan: null,
            },

            options: {
                pembatik: [],
                pewarnaan: []
            }
        },

        watch: {
            "filled.paguyuban": function() {
                fetch(`${this.urlSite}/api/pembatikpaguyuban/${this.filled.paguyuban}`).then(response => response.json()).then(
                    json => {
                        this.options.pembatik = json.batik;
                    }
                );

                fetch(`${this.urlSite}/api/pembatikpewarna/${this.filled.paguyuban}`).then(response => response.json()).then(
                    json => {
                        this.options.pewarnaan = json.pewarna;
                    }
                );
            }
        }
    })
</script>
@endsection