@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Analisa SAW</h4>
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
    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{ session()->get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('cetak-analisa') }}" target="_blank" class="btn btn-success btn-sm float-right" style="color: white;"><i class="fa fa-print"></i> Cetak</a>
            </h5>
            <!-- matrix awal -->
            <div class="table-responsive">
                <h3 class="text-center">Matrix Awal</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Sekolah</th>
                            <th>Portofolio</th>
                            <th>Presentasi Best Practice</th>
                            <th>Wawancara</th>
                            <th>Tes Tertulis</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria_penilaian as $no => $penilaian)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $penilaian->guru_nama }}</td>
                            <td>{{ $penilaian->sekolah_nama }}</td>
                            <td>{{ $penilaian->penilaian_portofolio }}</td>
                            <td>{{ $penilaian->penilaian_presentasi }}</td>
                            <td>{{ $penilaian->penilaian_wawancara }}</td>
                            <td>{{ $penilaian->penilaian_tes_tulis }}</td>
                            <td>{{ $penilaian->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <hr>
            <!-- matrix normalisasi -->
            <div class="table-responsive">
                <h3 class="text-center">Matrix Normalisasi</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Sekolah</th>
                            <th>Portofolio</th>
                            <th>Presentasi Best Practice</th>
                            <th>Wawancara</th>
                            <th>Tes Tertulis</th>
                            <th>Prefensi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $hasil=[]; 
                    ?>
                        @foreach($kriteria_penilaian as $no => $penilaian)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $penilaian->guru_nama }}</td>
                            <td>{{ $penilaian->sekolah_nama }}</td>
                            <td>{{ round($penilaian->penilaian_portofolio / $nilai_tertinggi->penilaian_portofolio, 2) }}</td>
                            <td>{{ round($penilaian->penilaian_presentasi / $nilai_tertinggi->penilaian_presentasi, 2) }}</td>
                            <td>{{ round($penilaian->penilaian_wawancara / $nilai_tertinggi->penilaian_wawancara, 2) }}</td>
                            <td>{{ round($penilaian->penilaian_tes_tulis / $nilai_tertinggi->penilaian_tes_tulis, 2) }}</td>
                            <td>
                                <?php for ($i=0; $i < count($bobot) ; $i++) { 
                                    $hasil[$no] =
                                    (($penilaian->penilaian_portofolio / $nilai_tertinggi->penilaian_portofolio) * $bobot[$i]) + 
                                    (($penilaian->penilaian_presentasi / $nilai_tertinggi->penilaian_presentasi) * $bobot[$i]) +
                                    (($penilaian->penilaian_wawancara / $nilai_tertinggi->penilaian_wawancara) * $bobot[$i]) +
                                    (($penilaian->penilaian_tes_tulis / $nilai_tertinggi->penilaian_tes_tulis) * $bobot[$i])
                                                                    ;
                                                                } ?>
                                {{ round($hasil[$no], 2) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <!-- matrix hasil -->
            <div class="table-responsive">
                <h3 class="text-center">HASIL ANALISA SPK SAW</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Sekolah</th>
                            <th>Portofolio</th>
                            <th>Presentasi Best Practice</th>
                            <th>Wawancara</th>
                            <th>Tes Tertulis</th>
                            <th>Prefensi</th>
                            <th>Peringkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                        $ordered_values = $hasil;
                        rsort($ordered_values);
                        $a = [];
                        foreach ($hasil as $key => $value) {
                            foreach ($ordered_values as $ordered_key => $ordered_value) {
                                if ($value === $ordered_value) {
                                    $key = $ordered_key;
                                    // echo $key . "<br>";
                                    break;
                                }
                            }
                            // echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
                            // echo ((int) $key + 1) . '<br/>';
                            $a[] = ((int) $key + 1);
                        }
                        ?>
                        <?php 
                        // var_dump($hasil);
                        // var_dump($a);

                        // $ranks = array(1);
                        // for ($i = 1; $i < count($a); $i++)
                        // {
                        //     if ($a[$i] != $a[$i-1])
                        //         $ranks[$i] = $i + 1;
                        //     else
                        //         $ranks[$i] = $ranks[$i-1];
                        // }
                        // var_dump($ranks);
                        ?>
                        @foreach($kriteria_penilaian as $no => $penilaian)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $penilaian->guru_nama }}</td>
                            <td>{{ $penilaian->sekolah_nama }}</td>
                            <td>{{ round($penilaian->penilaian_portofolio / $nilai_tertinggi->penilaian_portofolio, 2) }}</td>
                            <td>{{ round($penilaian->penilaian_presentasi / $nilai_tertinggi->penilaian_presentasi, 2) }}</td>
                            <td>{{ round($penilaian->penilaian_wawancara / $nilai_tertinggi->penilaian_wawancara, 2) }}</td>
                            <td>{{ round($penilaian->penilaian_tes_tulis / $nilai_tertinggi->penilaian_tes_tulis, 2) }}</td>
                            <td>
                                <?php for ($i=0; $i < count($bobot) ; $i++) { 
                                    $hasil[$no] =
                                    (($penilaian->penilaian_portofolio / $nilai_tertinggi->penilaian_portofolio) * $bobot[$i]) + 
                                    (($penilaian->penilaian_presentasi / $nilai_tertinggi->penilaian_presentasi) * $bobot[$i]) +
                                    (($penilaian->penilaian_wawancara / $nilai_tertinggi->penilaian_wawancara) * $bobot[$i]) +
                                    (($penilaian->penilaian_tes_tulis / $nilai_tertinggi->penilaian_tes_tulis) * $bobot[$i])
                                                                    ;
                                                                } ?>
                                {{ round($hasil[$no], 2) }}
                            </td>
                            <td>
                                {{
                                    $a[$no]
                                }}
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
