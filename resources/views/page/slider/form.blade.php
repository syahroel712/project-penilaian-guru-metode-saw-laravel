@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Sliders</h4>
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

        <form class="form-horizontal" action="{{ route($url, $slider->slider_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($slider))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Sliders</h4>
                <hr>
                <div class="form-group">
                    <label>Nama Slider</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('slider_name') {{ 'is-invalid' }} @enderror" name="slider_name" value="{{ old('slider_name') ?? $slider->slider_name ?? '' }}">
                        
                        @error('slider_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Logo Slider</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('slider_file') {{ 'is-invalid' }} @enderror" name="slider_file" value="{{ old('slider_file') ?? '' }}" style="width: 100%">
                        <span style="color:red; font-size: 12px;">* Gambar Slider Sebaiknya Berukuran 1163 pixel * 365 pixel</span>
                        @error('slider_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="slider_published" id="slider_published" class="form-control @error('slider_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('slider_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Publish</option>
                            <option {{ (old('slider_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Hide</option>
                        </select>
                        @if(isset($slider))
                        <script>
                            document.getElementById('slider_published').value = '<?php echo $slider->slider_published ?>'
                        </script>
                        @endif
                        @error('slider_published')
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