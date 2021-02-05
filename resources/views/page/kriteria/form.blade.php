@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Kriteria</h4>
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

        <form class="form-horizontal" action="{{ route($url, $kriteria->kriteria_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($kriteria))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Kriteria Penilaian</h4>
                <hr>
                <div class="form-group">
                    <label>Nama Kriteria</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('kriteria_nama') {{ 'is-invalid' }} @enderror" name="kriteria_nama" value="{{ old('kriteria_nama') ?? $kriteria->kriteria_nama ?? '' }}">
                        @error('kriteria_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Bobot Kriteria</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('kriteria_bobot') {{ 'is-invalid' }} @enderror" name="kriteria_bobot" value="{{ old('kriteria_bobot') ?? $kriteria->kriteria_bobot ?? '' }}">
                        @error('kriteria_bobot')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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