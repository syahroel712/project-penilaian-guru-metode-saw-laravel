@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Legalitas</h4>
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

        <form class="form-horizontal" action="{{ route($url, $legalitas->legal_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($legalitas))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Artikel</h4>
                <hr>
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('legal_title') {{ 'is-invalid' }} @enderror" name="legal_title" value="{{ old('legal_title') ?? $legalitas->legal_title ?? '' }}">
                        @error('legal_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('legal_file') {{ 'is-invalid' }} @enderror" name="legal_file" value="{{ old('legal_file') ?? '' }}">
                        @error('legal_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="legal_published" id="legal_published" class="form-control @error('legal_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('legal_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Publish</option>
                            <option {{ (old('legal_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Hide</option>
                        </select>
                        @if(isset($legalitas))
                        <script>
                            document.getElementById('legal_published').value = '<?php echo $legalitas->legal_published ?>'
                        </script>
                        @endif
                        @error('legal_published')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="legal_desc" id="ckedtor" class="ckeditor @error('legal_desc') {{ 'is-invalid' }} @enderror">{{ old('legal_desc') ?? $legalitas->legal_desc ?? '' }}</textarea>
                    @error('legal_desc')
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