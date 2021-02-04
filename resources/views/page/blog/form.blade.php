@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Artikel</h4>
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

        <form class="form-horizontal" action="{{ route($url, $blog->blog_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($blog))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Artikel</h4>
                <hr>
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('blog_title') {{ 'is-invalid' }} @enderror" name="blog_title" value="{{ old('blog_title') ?? $blog->blog_title ?? '' }}">
                        @error('blog_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('blog_file') {{ 'is-invalid' }} @enderror" name="blog_file" value="{{ old('blog_file') ?? '' }}">
                        @error('blog_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="blog_published" id="blog_published" class="form-control @error('blog_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('blog_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Publish</option>
                            <option {{ (old('blog_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Hide</option>
                        </select>
                        @if(isset($blog))
                        <script>
                            document.getElementById('blog_published').value = '<?php echo $blog->blog_published ?>'
                        </script>
                        @endif
                        @error('blog_published')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Isi Artikel</label>
                    <textarea name="blog_desc" id="ckedtor" class="ckeditor @error('blog_desc') {{ 'is-invalid' }} @enderror">{{ old('blog_desc') ?? $blog->blog_desc ?? '' }}</textarea>
                    @error('blog_desc')
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