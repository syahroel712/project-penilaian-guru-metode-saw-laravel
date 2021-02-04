@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Kategori</h4>
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
        <div class="card-body">
            <h5 class="card-title">
                <button type="button" class="btn btn-cyan btn-sm" onclick="tambah()"><i class="fa fa-plus"></i> Add</button>
            </h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" onclick="edit()"><i class="fa fa-edit"></i> Update</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="mHapus()"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah dan Edit-->
<div class="modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ketModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Datepicker</label>
                    <div class="input-group">
                        <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Input</label>
                    <div class="input-group">
                        <input type="text" class="form-control is-invalid" id="fname" placeholder="First Name Here">
                        <div class="invalid-feedback">
                            Please correct the error
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Select</label>
                    <div class="input-group">
                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;">
                            <option>-Select-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quill</label>
                    <div id="editor" style="height: 300px;">
                    </div>
                </div>

                <div class="form-group">
                    <label>File</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" onclick="simpan()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin Hapus Data ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" onclick="hapus()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    // untuk tambah data
    function tambah() {
        $('#ketModal').text('Add Data')
        $('#ModalForm').modal()
    }
    // untuk edit data
    function edit() {
        $('#ketModal').text('Update Data')
        $('#ModalForm').modal()
    }
    // untuk aksi simpan tambah/ edit data
    function simpan() {
        toastr.success('Have fun storming the castle!', 'Miracle Max Says');
    }
    // untuk hapus data
    function mHapus() {
        $('#ModalHapus').modal()
    }
    // utk aksi hapus
    function hapus() {
        toastr.success('Have fun storming the castle!', 'Miracle Max Says');
    }
</script>

@endsection