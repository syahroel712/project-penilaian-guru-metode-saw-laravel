@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Kriteria Penilaian</h4>
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

        <form class="form-horizontal" action="{{ route($url, $kriteria_penilaian->penilaian_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($kriteria_penilaian))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Kriteria Penilaian</h4>
                <hr>
                <div class="form-group">
                    <label>Guru</label>
                    <div class="input-group">
                        <select name="guru_id" id="guru_id"
                            class="form-control @error('guru_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            @foreach($guru as $no => $guru)
                                <option value="{{ $guru->guru_id }}">
                                {{ $guru->guru_nama }}</option>
                            @endforeach 
                        </select>
                        @if(isset($kriteria_penilaian))
                            <script>
                                document.getElementById('guru_id').value =
                                    '<?php echo $kriteria_penilaian->guru_id ?>'
                            </script>
                        @endif
                        @error('guru_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Kriteria Portofolio</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('penilaian_portofolio') {{ 'is-invalid' }} @enderror" name="penilaian_portofolio" value="{{ old('penilaian_portofolio') ?? $kriteria_penilaian->penilaian_portofolio ?? '' }}">
                        @error('penilaian_portofolio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Kriteria Presentasi</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('penilaian_presentasi') {{ 'is-invalid' }} @enderror" name="penilaian_presentasi" value="{{ old('penilaian_presentasi') ?? $kriteria_penilaian->penilaian_presentasi ?? '' }}">
                        @error('penilaian_presentasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Kriteria Wawancara</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('penilaian_wawancara') {{ 'is-invalid' }} @enderror" name="penilaian_wawancara" value="{{ old('penilaian_wawancara') ?? $kriteria_penilaian->penilaian_wawancara ?? '' }}">
                        @error('penilaian_wawancara')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Kriteria Tes Tertulis</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('penilaian_tes_tulis') {{ 'is-invalid' }} @enderror" name="penilaian_tes_tulis" value="{{ old('penilaian_tes_tulis') ?? $kriteria_penilaian->penilaian_tes_tulis ?? '' }}">
                        @error('penilaian_tes_tulis')
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