@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Produk</h4>
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

        <form class="form-horizontal" action="{{ route($url, $sparepart->sparepart_id ?? null) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($sparepart))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Produk</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('sparepart_kode') {{ 'is-invalid' }} @enderror"
                                    name="sparepart_kode"
                                    value="{{ old('sparepart_kode') ?? $sparepart->sparepart_kode ?? '' }}">
                                @error('sparepart_kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('sparepart_name') {{ 'is-invalid' }} @enderror"
                                    name="sparepart_name"
                                    value="{{ old('sparepart_name') ?? $sparepart->sparepart_name ?? '' }}">
                                @error('sparepart_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand Produk</label>
                            <div class="input-group">
                                <select name="brand_id" id="brand_id"
                                    class="form-control @error('brand_id') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    @foreach($brands as $no => $brand)
                                        <option {{ (old('brand_id') == 'Top Seller' ? 'selected':'') }} value="{{ $brand->brand_id }}">
                                        {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @if(isset($sparepart))
                                <script>
                                    document.getElementById('brand_id').value =
                                        '<?php echo $sparepart->brand_id ?>'
                                </script>
                                @endif
                                @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <div class="input-group">
                                <input type="text"
                                    class="form-control @error('sparepart_price') {{ 'is-invalid' }} @enderror"
                                    name="sparepart_price"
                                    value="{{ old('sparepart_price') ?? $sparepart->sparepart_price ?? '' }}">
                                @error('sparepart_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipe Produk</label>
                            <div class="input-group">
                                <select name="sparepart_type" id="sparepart_type"
                                    class="form-control @error('sparepart_type') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('sparepart_type') == 'Terbaru' ? 'selected':'') }} value="Terbaru">
                                        Terbaru</option>
                                    <option {{ (old('sparepart_type') == 'Terlaris' ? 'selected':'') }}
                                        value="Terlaris">Terlaris</option>
                                </select>
                                @if(isset($sparepart))
                                <script>
                                    document.getElementById('sparepart_type').value =
                                        '<?php echo $sparepart->sparepart_type ?>'
                                </script>
                                @endif
                                @error('sparepart_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kondisi Produk</label>
                            <div class="input-group">
                                <select name="sparepart_condition" id="sparepart_condition"
                                    class="form-control @error('sparepart_condition') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('sparepart_condition') == 'Baru' ? 'selected':'') }} value="Baru">
                                        Baru</option>
                                    <option {{ (old('sparepart_condition') == 'Rekondisi' ? 'selected':'') }}
                                        value="Rekondisi">Rekondisi</option>
                                </select>
                                @if(isset($sparepart))
                                <script>
                                    document.getElementById('sparepart_condition').value =
                                        '<?php echo $sparepart->sparepart_condition ?>'
                                </script>
                                @endif
                                @error('sparepart_condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stok Produk</label>
                            <div class="input-group">
                                <input type="number"
                                    class="form-control @error('sparepart_stock') {{ 'is-invalid' }} @enderror"
                                    name="sparepart_stock"
                                    value="{{ old('sparepart_stock') ?? $sparepart->sparepart_stock ?? '' }}">
                                @error('sparepart_stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Produk Terjual</label>
                            <div class="input-group">
                                <input type="number"
                                    class="form-control @error('sparepart_sold') {{ 'is-invalid' }} @enderror"
                                    name="sparepart_sold"
                                    value="{{ old('sparepart_sold') ?? $sparepart->sparepart_sold ?? '' }}">
                                @error('sparepart_sold')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Produk</label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('sparepart_file') {{ 'is-invalid' }} @enderror" name="sparepart_file" value="{{ old('sparepart_file') ?? '' }}">
                                @error('sparepart_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tampilkan Produk</label>
                            <div class="input-group">
                                <select name="sparepart_status" id="sparepart_status"
                                    class="form-control @error('sparepart_status') {{ 'is-invalid' }} @enderror">
                                    <option value="">-Pilih-</option>
                                    <option {{ (old('sparepart_status') == 'Aktif' ? 'selected':'') }} value="Aktif">
                                        Ya</option>
                                    <option {{ (old('sparepart_status') == 'Nonaktif' ? 'selected':'') }}
                                        value="Nonaktif">Tidak</option>
                                </select>
                                @if(isset($sparepart))
                                <script>
                                    document.getElementById('sparepart_status').value =
                                        '<?php echo $sparepart->sparepart_status ?>'
                                </script>
                                @endif
                                @error('sparepart_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                                <textarea name="sparepart_desc" id="ckedtor"
                                    class="ckeditor @error('sparepart_desc') {{ 'is-invalid' }} @enderror" style="width: 100%">{{ old('sparepart_desc') ?? $sparepart->sparepart_desc ?? '' }}</textarea>
                                @error('sparepart_desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="width : 100%">
                            <label>Spesifikasi Produk</label>
                                <textarea name="sparepart_spec" id="ckedtor"
                                    class="ckeditor @error('sparepart_spec') {{ 'is-invalid' }} @enderror">{{ old('sparepart_spec') ?? $sparepart->sparepart_spec ?? '' }}</textarea>
                                @error('sparepart_spec')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
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
