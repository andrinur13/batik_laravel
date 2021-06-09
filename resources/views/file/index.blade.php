@extends('template.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ url('/file/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <select id="inputState" class="form-control" name="pilihan">
                        <option selected>Pilih Data</option>
                        <option value="paguyuban">Paguyuban</option>
                        <option value="pembatik">Pembatik</option>
                        <option value="batik">Batik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">Example file input</label>
                    <input type="file" class="form-control-file" name="file">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Import">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection