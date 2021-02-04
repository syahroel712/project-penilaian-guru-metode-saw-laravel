@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Testimonial Pelanggan</h4>
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

        <form class="form-horizontal" action="{{ route($url, $testimonial->testimonial_id ?? null) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($testimonial))
            @method('put')
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Testimonial Pelanggan</h4>
                <hr>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('testimonial_name') {{ 'is-invalid' }} @enderror" name="testimonial_name" value="{{ old('testimonial_name') ?? $testimonial->testimonial_name ?? '' }}">
                        @error('testimonial_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Kota Asal</label>
                    <div class="input-group">
                        <select name="region_id" id="region_id"
                            class="form-control @error('region_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            @foreach($regions as $no => $region)
                                <option value="{{ $region->region_id }}">
                                {{ $region->region_name }}</option>
                            @endforeach 
                        </select>
                        @if(isset($testimonial))
                        <script>
                            document.getElementById('region_id').value =
                                '<?php echo $testimonial->region_id ?>'
                        </script>
                        @endif
                        @error('region_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Kecamatan Asal</label>
                    <div class="input-group">
                        <select name="region_detail_id" id="region_detail_id"
                            class="form-control @error('region_detail_id') {{ 'is-invalid' }} @enderror">
                        </select>
                        @if(isset($testimonial))
                        <script>
                            document.getElementById('region_detail_id').value =
                                '<?php echo $testimonial->region_detail_id ?>'
                        </script>
                        @endif
                        @error('region_detail_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label>Deskripsi</label>
                    <div class="input-group">
                        <textarea name="testimonial_desc" class="form-control @error('testimonial_desc') {{ 'is-invalid' }} @enderror" cols="30" rows="5">{{ old('testimonial_desc') ?? $testimonial->testimonial_desc ?? '' }}</textarea>
                        @error('testimonial_desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('testimonial_file') {{ 'is-invalid' }} @enderror" name="testimonial_file" value="{{ old('testimonial_file') ?? '' }}" style="width: 100%">
                        @error('testimonial_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                        <select name="testimonial_published" id="testimonial_published" class="form-control @error('testimonial_published') {{ 'is-invalid' }} @enderror">
                            <option value="">-Pilih-</option>
                            <option {{ (old('testimonial_published') == 'Aktif' ? 'selected':'') }} value="Aktif">Publish</option>
                            <option {{ (old('testimonial_published') == 'Nonaktif' ? 'selected':'') }} value="Nonaktif">Hide</option>
                        </select>
                        @if(isset($testimonial))
                        <script>
                            document.getElementById('testimonial_published').value = '<?php echo $testimonial->testimonial_published ?>'
                        </script>
                        @endif
                        @error('testimonial_published')
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
<script>
    $('#region_id').change(function () { 
        var id = $('#region_id').val();
        document.getElementById("region_detail_id").innerHTML = null;
        axios.get('{{ url("impadang-admin/testimonials/kecamatan") }}/' + id )
            .then(function (response) {
                var hasil = response.data.region_detail;
                document.getElementById("region_detail_id").innerHTML += "<option value=''>-Pilih-</option>"
                for(var x = 0; x < hasil.length; x++)
                {
                    document.getElementById("region_detail_id").innerHTML += "<option value='" + hasil[x].region_detail_id +"'>" + hasil[x].region_detail_name + "</option>"
                }
            }).catch(function (error) {
                console.log(error);
            })
    });
</script>

@if(isset($testimonial))
<script>
    $(document).ready(function () {
        var id = {{ $testimonial->region_id }};
        document.getElementById("region_detail_id").innerHTML = null;
        axios.get('{{ url("impadang-admin/testimonials/kecamatan") }}/' + id )
            .then(function (response) {
                var hasil = response.data.region_detail;
                document.getElementById("region_detail_id").innerHTML += "<option value=''>-Pilih-</option>"
                for(var x = 0; x < hasil.length; x++)
                {
                    document.getElementById("region_detail_id").innerHTML += "<option value='" + hasil[x].region_detail_id +"'>" + hasil[x].region_detail_name + "</option>"
                }

                document.getElementById('region_detail_id').value = '<?php echo $testimonial->region_detail_id ?>'

            }).catch(function (error) {
                console.log(error);
            })
    });
</script>
@endif
@endsection