<?php

$mhs_array = [
    "23111020xx" => [
        "nama" => "Adi Subadi Abadi",
        "nilai" => [
            "tugas" => 89,
            "uts" => 75,
            "uas" => 70
        ]
    ],
    "23111020yy" => [
        "nama" => "Bobon Birubon Brebenobon",
        "nilai" => [
            "tugas" => 60,
            "uts" => 100,
            "uas" => 100
        ]
    ],
    "23111020zz" => [
        "nama" => "Cherry Aureli Husada",
        "nilai" => [
            "tugas" => 95,
            "uts" => 70,
            "uas" => 90
        ]
    ],
    "23111020aa" => [
        "nama" => "Dabadi Dubadi Bako",
        "nilai" => [
            "tugas" => 40,
            "uts" => 30,
            "uas" => 10
        ]
    ],
    "23111020bb" => [
        "nama" => "Edi Marsudi Ramadani",
        "nilai" => [
            "tugas" => 90,
            "uts" => 30,
            "uas" => 20
        ]
    ]
];

function calc_final_grade($array) {
    foreach ($array as $nim => $data) {
        $nilai_akhir = 
            $data["nilai"]["tugas"] * 0.4 +
            $data["nilai"]["uts"] * 0.3 + 
            $data["nilai"]["uas"] * 0.3;
        $nilai_akhir_graded = 'E'; // default ke E

        if ($nilai_akhir > 85) $nilai_akhir_graded = 'A';
        else if ($nilai_akhir > 75 && $nilai_akhir <= 85) $nilai_akhir_graded = 'AB';
        else if ($nilai_akhir > 65 && $nilai_akhir <= 75) $nilai_akhir_graded = 'B';
        else if ($nilai_akhir > 60 && $nilai_akhir <= 65) $nilai_akhir_graded = 'BC';
        else if ($nilai_akhir > 50 && $nilai_akhir <= 60) $nilai_akhir_graded = 'C';
        else if ($nilai_akhir > 40 && $nilai_akhir <= 50) $nilai_akhir_graded = 'D';

        $status_kelulusan = "Tidak Lulus";
        if ($nilai_akhir_graded != 'E') $status_kelulusan = "Lulus";

        $array[$nim]["nilai_akhir"] = $nilai_akhir;
        $array[$nim]["grade"] = $nilai_akhir_graded;
        $array[$nim]["status"] = $status_kelulusan;
    }

    return $array;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelulusan Mata Kuliah X</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th style='padding: 0 16px;'>Nilai Akhir</th>
                <th style='padding: 0 16px;'>Grade</th>
                <th style='padding: 0 16px;'>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $total_nilai = 0;
                $top_score = 0;

                $mhs_array_calculated = calc_final_grade($mhs_array);
                $count = 1;
                foreach ($mhs_array_calculated as $nim => $data) {
                    $total_nilai += $data["nilai_akhir"];
                    if ($top_score < $data["nilai_akhir"]) $top_score = $data["nilai_akhir"];

                    echo "
                        <tr>
                            <td style='padding: 0 16px;'>$count</td>
                            <td style='padding: 0 16px;'>$nim</td>
                            <td style='padding: 0 16px;'>{$data["nama"]}</td>
                            <td style='text-align: center;'>{$data["nilai_akhir"]}</td>
                            <td style='text-align: center;'>{$data["grade"]}</td>
                            <td style='text-align: center;'>{$data["status"]}</td>
                        </tr>
                    ";

                    $count++;
                }

                $avg_kelas = $total_nilai / count($mhs_array_calculated);
            ?>
        </tbody>
    </table>
    <?php 
        echo "
            <h3>Rata-rata kelas : $avg_kelas</h3>
            <h3>Nilai tertinggi : $top_score</h3>
        ";
    ?>
</body>
</html>