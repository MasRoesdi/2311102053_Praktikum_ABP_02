<?php
    $data = [
        'nama' => 'Arapaima Gigas',
        'pekerjaan' => 'Pelatih Renang',
        'lokasi' => 'Sungai Amazon',
        'hobi' => 'Makan Ikan Teri'
    ];
    $data_encoded = json_encode($data);
    
    header('Content-Type: application/json');
    echo($data_encoded);
?>