@extends('template.default')

@section('content')
<div class="">
    <div class="row">
        <div class="col">
            <div class="text-center mt-4">
                <div class="mx-auto font-weight-bold" style="font-size: 100px">404</div>
                <p class="lead text-gray-800 mb-5">Upss, halaman tidak ditemukan</p>
                <a class="btn btn-primary mt-4" href="{{ url('/dashboard') }}">Kembali Ke Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection