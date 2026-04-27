<?php
header('Content-Type: application/json');

$data = [
    [
        'nama' => 'Budi',
        'pekerjaan' => 'Web Developer',
        'lokasi' => 'Jakarta'
    ],
    [
        'nama' => 'Rizkulloh',
        'pekerjaan' => 'Web Developer',
        'lokasi' => 'Bandung'
    ]
];

echo json_encode($data);
?>
