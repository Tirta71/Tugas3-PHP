<?php

// Data nilai mahasiswa dalam array
$data_nilai = [
    ['No' => 1, 'Nama Mahasiswa' => 'Andi Santono', 'NIM' => '0111111', 'Nilai' => 95],
    ['No' => 2, 'Nama Mahasiswa' => 'Budi Kurniawan', 'NIM' => '0111112', 'Nilai' => 80],
    ['No' => 3, 'Nama Mahasiswa' => 'Candi Badur', 'NIM' => '0111113', 'Nilai' => 78],
    ['No' => 4, 'Nama Mahasiswa' => 'Denis Caputra', 'NIM' => '0111114', 'Nilai' => 76],
    ['No' => 5, 'Nama Mahasiswa' => 'Erik Manahel', 'NIM' => '0111115', 'Nilai' => 86],
    ['No' => 6, 'Nama Mahasiswa' => 'Fatril Nusonto', 'NIM' => '0111116', 'Nilai' => 50],
    ['No' => 7, 'Nama Mahasiswa' => 'Gayama Harustia', 'NIM' => '0111117', 'Nilai' => 20],
    ['No' => 8, 'Nama Mahasiswa' => 'Isma Lotono', 'NIM' => '0111118', 'Nilai' => 30],
    ['No' => 9, 'Nama Mahasiswa' => 'Jami Sayir', 'NIM' => '0111119', 'Nilai' => 70],
    ['No' => 10, 'Nama Mahasiswa' => 'Karni Buato', 'NIM' => '0111110', 'Nilai' => 65],
    ['No' => 11, 'Nama Mahasiswa' => 'Tirta Samara', 'NIM' => '02212313', 'Nilai' => 100],
    ['No' => 12, 'Nama Mahasiswa' => 'Rina Kartika', 'NIM' => '02212314', 'Nilai' => 88],
    ['No' => 13, 'Nama Mahasiswa' => 'Lutfi Abdullah', 'NIM' => '02212315', 'Nilai' => 92],
    ['No' => 14, 'Nama Mahasiswa' => 'Putri Wulandari', 'NIM' => '02212316', 'Nilai' => 83],
    ['No' => 15, 'Nama Mahasiswa' => 'Ahmad Yani', 'NIM' => '02212317', 'Nilai' => 67],
    ['No' => 16, 'Nama Mahasiswa' => 'Dewi Sartika', 'NIM' => '02212318', 'Nilai' => 72],
    ['No' => 17, 'Nama Mahasiswa' => 'Rizki Ramadhan', 'NIM' => '02212319', 'Nilai' => 79],
    ['No' => 18, 'Nama Mahasiswa' => 'Ivan Gunawan', 'NIM' => '02212320', 'Nilai' => 60],
    ['No' => 19, 'Nama Mahasiswa' => 'Siti Nurhaliza', 'NIM' => '02212321', 'Nilai' => 85],
    ['No' => 20, 'Nama Mahasiswa' => 'Farhan Indra', 'NIM' => '02212322', 'Nilai' => 73],
];



foreach ($data_nilai as &$nilai) {
    $nilai['Keterangan'] = ($nilai['Nilai'] >= 65) ? 'Lulus' : 'Gagal';

    if ($nilai['Nilai'] >= 90) {
        $nilai['Grade'] = 'A';
    } elseif ($nilai['Nilai'] >= 80) {
        $nilai['Grade'] = 'B';
    } elseif ($nilai['Nilai'] >= 70) {
        $nilai['Grade'] = 'C';
    } elseif ($nilai['Nilai'] >= 60) {
        $nilai['Grade'] = 'D';
    } else {
        $nilai['Grade'] = 'E';
    }

    // Predikat
    switch ($nilai['Grade']) {
        case 'A':
            $nilai['Predikat'] = 'Memuaskan';
            break;
        case 'B':
            $nilai['Predikat'] = 'Bagus';
            break;
        case 'C':
            $nilai['Predikat'] = 'Cukup';
            break;
        case 'D':
            $nilai['Predikat'] = 'Kurang';
            break;
        case 'E':
            $nilai['Predikat'] = 'Buruk';
            break;
    }
}

// Agregat nilai
$nilai_mahasiswa = array_column($data_nilai, 'Nilai');
$nilai_tertinggi = max($nilai_mahasiswa);
$nilai_terendah = min($nilai_mahasiswa);
$nilai_rata_rata = array_sum($nilai_mahasiswa) / count($nilai_mahasiswa);
$jumlah_mahasiswa = count($data_nilai);
$total_nilai = array_sum($nilai_mahasiswa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Nilai Mahasiswa - by Tirta Samara</h1>

    <table id="nilaiMahasiswa" class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Grade</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data_nilai); $i++): ?>
            <tr>
                <td><?php echo $data_nilai[$i]['No']; ?></td>
                <td><?php echo $data_nilai[$i]['Nama Mahasiswa']; ?></td>
                <td><?php echo $data_nilai[$i]['NIM']; ?></td>
                <td><?php echo $data_nilai[$i]['Nilai']; ?></td>
                <td>
                    <?php 
                    $keterangan = $data_nilai[$i]['Keterangan'];
                    $badge_class = $keterangan == 'Lulus' ? 'bg-success' : 'bg-danger';
                    ?>
                    <span class="badge <?php echo $badge_class; ?>"><?php echo $keterangan; ?></span>
                </td>
                <td><?php echo $data_nilai[$i]['Grade']; ?></td>
                <td><?php echo $data_nilai[$i]['Predikat']; ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Nilai Tertinggi</th>
                <th colspan="4"><?php echo $nilai_tertinggi; ?></th>
            </tr>
            <tr>
                <th colspan="3">Nilai Terendah</th>
                <th colspan="4"><?php echo $nilai_terendah; ?></th>
            </tr>
            <tr>
                <th colspan="3">Nilai Rata-rata</th>
                <th colspan="4"><?php echo $nilai_rata_rata; ?></th>
            </tr>
            <tr>
                <th colspan="3">Jumlah Mahasiswa</th>
                <th colspan="4"><?php echo $jumlah_mahasiswa; ?></th>
            </tr>
            <tr>
                <th colspan="3">Jumlah keseluruhan nilai</th>
                <th colspan="4"><?php echo $total_nilai; ?></th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#nilaiMahasiswa').DataTable();
    });
</script>
</body>
</html>


