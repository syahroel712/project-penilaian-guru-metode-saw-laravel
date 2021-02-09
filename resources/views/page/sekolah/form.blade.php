@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Sekolah</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page"></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">

        <form class="form-horizontal" action="{{ route($url, $sekolah->sekolah_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($sekolah))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Sekolah</h4>
                <hr>
                <div class="form-group">
                    <label>Nomor Pokok Sekolah Nasional</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('sekolah_npsn') {{ 'is-invalid' }} @enderror" name="sekolah_npsn" value="{{ old('sekolah_npsn') ?? $sekolah->sekolah_npsn ?? '' }}">
                        @error('sekolah_npsn')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Sekolah</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('sekolah_nama') {{ 'is-invalid' }} @enderror" name="sekolah_nama" value="{{ old('sekolah_nama') ?? $sekolah->sekolah_nama ?? '' }}">
                        @error('sekolah_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="sekolah_alamat" id="ckedtor" class="ckeditor @error('sekolah_alamat') {{ 'is-invalid' }} @enderror">{{ old('sekolah_alamat') ?? $sekolah->sekolah_alamat ?? '' }}</textarea>
                    @error('sekolah_alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button class="btn btn-warning" type="button" onclick="window.history.back()">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection