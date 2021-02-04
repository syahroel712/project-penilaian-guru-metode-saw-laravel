@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <a href="{{ route('blogs') }}" class="btn btn-info btn-sm" style="border-radius: 15px;"><i class="fa fa-arrow-left"></i></a>&nbsp;
            <h4 class="page-title">Artikel: {{ $blog_title }}</h4>
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
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
            
            </h5>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th>Tanggal</th>
                            <th>Komentar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $no => $comment)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $comment->comment_name }}</td>
                            <td>{{ $comment->comment_email }}</td>
                            <td>
                                {{  
                                    \Carbon\Carbon::parse($comment->created_at)->isoFormat('dddd, D MMMM Y') 
                                }}
                            </td>
                            <td>{{ $comment->comment_desc }}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="mHapus('{{ route('comments.delete', $comment->comment_id) }}')"><i
                                        class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formDelete">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    Yakin Hapus Data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // untuk hapus data
    function mHapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }
</script>

@endsection
