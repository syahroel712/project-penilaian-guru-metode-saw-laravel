@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Guru</h4>
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

        <form class="form-horizontal" action="{{ route($url, $guru->guru_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($guru))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Guru</h4>
                <hr>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('guru_nama') {{ 'is-invalid' }} @enderror" name="guru_nama" value="{{ old('guru_nama') ?? $guru->guru_nama ?? '' }}">
                        @error('guru_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Sekolah</label>
                    <div class="input-group">
                        <select name="sekolah_id" id="sekolah_id"
                            class="form-control @error('sekolah_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            @foreach($sekolah as $no => $sekolah)
                                <option value="{{ $sekolah->sekolah_id }}">
                                {{ $sekolah->sekolah_nama }}</option>
                            @endforeach 
                        </select>
                        @if(isset($guru))
                        <script>
                            document.getElementById('sekolah_id').value =
                                '<?php echo $guru->sekolah_id ?>'
                        </script>
                        @endif
                        @error('sekolah_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group">
                        <input type="date" class="form-control @error('guru_tgl_lahir') {{ 'is-invalid' }} @enderror" name="guru_tgl_lahir" value="{{ old('guru_tgl_lahir') ?? $guru->guru_tgl_lahir ?? '' }}">
                        
                        @error('guru_tgl_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="input-group">
                        <select name="guru_jekel" id="guru_jekel"
                            class="form-control @error('guru_jekel') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('guru_jekel') == 'Pria' ? 'selected':'') }} value="Pria">
                                Pria</option>
                            <option {{ (old('guru_jekel') == 'Wanita' ? 'selected':'') }}
                                value="Wanita">Wanita</option>
                        </select>
                        @if(isset($guru))
                        <script>
                            document.getElementById('guru_jekel').value =
                                '<?php echo $guru->guru_jekel ?>'
                        </script>
                        @endif
                        @error('guru_jekel')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>No Telpon</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('guru_notelp') {{ 'is-invalid' }} @enderror" name="guru_notelp" value="{{ old('guru_notelp') ?? $guru->guru_notelp ?? '' }}">
                        @error('guru_notelp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control @error('guru_email') {{ 'is-invalid' }} @enderror" name="guru_email" value="{{ old('guru_email') ?? $guru->guru_email ?? '' }}">
                        @error('guru_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="guru_alamat" id="ckedtor" class="ckeditor @error('guru_alamat') {{ 'is-invalid' }} @enderror">{{ old('guru_alamat') ?? $guru->guru_alamat ?? '' }}</textarea>
                    @error('guru_alamat')
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