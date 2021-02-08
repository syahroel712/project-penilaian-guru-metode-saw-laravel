<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Invoice</title>
    <style>
        .top-right {
            position: absolute;
            top: 35px;
            right: 330px;
            font-size: 20px;
            font-weight: bold;
            color: #1d64a2;
            font-family: Arial;
        }
        .top-right2 {
            position: absolute;
            top: 90px;
            right: 330px;
            font-size: 16px;
            color: #1d64a2;
            font-family: Arial;
            text-align: left;
            width: 190px;
        }
        .top-right3 {
            position: absolute;
            top: 71.8px;
            right: 318px;
            font-size: 15px;
            color: #1d64a2;
            font-family: Arial;
            text-align: left;
        }
    </style>
</head>
<body onload="">

<?php 
    $hasil=[]; 
    foreach ($kriteria_penilaian as $no => $penilaian) {
        for ($i=0; $i < count($bobot) ; $i++) { 
            $hasil[$no] =
            (($penilaian->penilaian_portofolio / $nilai_tertinggi->penilaian_portofolio) * $bobot[$i]) + 
            (($penilaian->penilaian_presentasi / $nilai_tertinggi->penilaian_presentasi) * $bobot[$i]) +
            (($penilaian->penilaian_wawancara / $nilai_tertinggi->penilaian_wawancara) * $bobot[$i]) +
            (($penilaian->penilaian_tes_tulis / $nilai_tertinggi->penilaian_tes_tulis) * $bobot[$i]);
        }
        round($hasil[$no], 2);
    }
    
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


    <table style="width: 80%; margin-left: auto; margin-right: auto; border-collapse: collapse; font-size: 16px;">
        <thead>
            <tr>
                <th colspan="9">
                    <h2 style="text-align: center; margin-left: auto; margin-right: auto;">DAFTAR PERINGKAT</h2>
                    <h3 style="text-align: center; margin-left: auto; margin-right: auto;">LOMBA GURU DAN TENAGA PENDIDIKAN BERPRESTASI SMA <br>
                    TAHUN 2019</h3>
                </th>            
            </tr>
            <tr>
                <th style="border: 1px solid black;" rowspan="2">No</th>
                <th style="border: 1px solid black;" rowspan="2">Nama Guru</th>
                <th style="border: 1px solid black;" rowspan="2">Sekolah</th>
                <th style="border: 1px solid black;" colspan="4">Kriteria Penilaian</th>
                <th style="border: 1px solid black;" rowspan="2">Total</th>
                <th style="border: 1px solid black;" rowspan="2">Peringkat</th>
            </tr>
                <th style="border: 1px solid black;">Portofolio</th>
                <th style="border: 1px solid black;">Presentasi Best Practice</th>
                <th style="border: 1px solid black;">Wawancara</th>
                <th style="border: 1px solid black;">Tes Tertulis</th>
            <tr>

            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($kriteria_penilaian as $no => $penilaian) {
            ?>
            <tr>
                <td style="border: 1px solid black; text-align: center;"><?php echo $no + 1 ?></td>
                <td style="border: 1px solid black; text-align: left;"><?php echo $penilaian->guru_nama ?></td>
                <td style="border: 1px solid black; text-align: left;"><?php echo $penilaian->sekolah_nama ?></td>
                <td style="border: 1px solid black; text-align: center;"><?php echo $penilaian->penilaian_portofolio ?></td>
                <td style="border: 1px solid black; text-align: center;"><?php echo $penilaian->penilaian_presentasi ?></td>
                <td style="border: 1px solid black; text-align: center;"><?php echo $penilaian->penilaian_wawancara ?></td>
                <td style="border: 1px solid black; text-align: center;"><?php echo $penilaian->penilaian_tes_tulis ?></td>
                <td style="border: 1px solid black; text-align: center;"><?php echo $penilaian->total ?> </td>
                <td style="border: 1px solid black; text-align: center;"><?php echo $a[$no] ?></td>
            </tr>
            <?php 
            } 
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th style="border: 1px solid black; text-align: center;" colspan="3">Nilai Tertinggi</th>
                <th style="border: 1px solid black; text-align: center;"><?php echo $nilai_tertinggi->penilaian_portofolio ?></th>
                <th style="border: 1px solid black; text-align: center;"><?php echo $nilai_tertinggi->penilaian_presentasi ?></th>
                <th style="border: 1px solid black; text-align: center;"><?php echo $nilai_tertinggi->penilaian_wawancara ?></th>
                <th style="border: 1px solid black; text-align: center;"><?php echo $nilai_tertinggi->penilaian_tes_tulis ?></th>
                <th style="border: 1px solid black; text-align: center;" colspan="2"></th>
            </tr>
        </tfoot>

    </table>
</body>
</html>