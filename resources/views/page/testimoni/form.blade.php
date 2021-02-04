@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Mitra Kerja</h4>
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

        <form class="form-horizontal" action="{{ route($url, $testimoni->testimoni_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($testimoni))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Mitra Kerja</h4>
                <hr>
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('testimoni_title') {{ 'is-invalid' }} @enderror" name="testimoni_title" value="{{ old('testimoni_title') ?? $testimoni->testimoni_title ?? '' }}">
                        @error('testimoni_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <div class="input-group">
                        <textarea name="testimoni_desc" class="form-control @error('testimoni_desc') {{ 'is-invalid' }} @enderror" cols="30" rows="5">{{ old('testimoni_desc') ?? $testimoni->testimoni_desc ?? '' }}</textarea>
                        @error('testimoni_desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('testimoni_file') {{ 'is-invalid' }} @enderror" name="testimoni_file" value="{{ old('testimoni_file') ?? '' }}" style="width: 100%">
                        @error('testimoni_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="testimoni_published" id="testimoni_published" class="form-control @error('testimoni_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('testimoni_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Publish</option>
                            <option {{ (old('testimoni_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Hide</option>
                        </select>
                        @if(isset($testimoni))
                        <script>
                            document.getElementById('testimoni_published').value = '<?php echo $testimoni->testimoni_published ?>'
                        </script>
                        @endif
                        @error('testimoni_published')
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