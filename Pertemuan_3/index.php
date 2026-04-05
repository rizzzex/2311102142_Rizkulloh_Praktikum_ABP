<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white vh-100 d-flex align-items-center py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <h1 class="fw-bold display-4 text-dark">Sistem Penilaian</h1>
                <p class="lead text-muted">Tugas Pertemuan 3 - Praktikum ABP</p>
            </div>

            <?php
            $dataMahasiswa = [
                [
                    "nama" => "Rizkulloh Alpriyansah",
                    "nim" => "2311102142",
                    "nilai_tugas" => 85,
                    "nilai_uts" => 75,
                    "nilai_uas" => 90
                ],
                [
                    "nama" => "Fakhri Rizki",
                    "nim" => "2311102001",
                    "nilai_tugas" => 70,
                    "nilai_uts" => 65,
                    "nilai_uas" => 80
                ],
                [
                    "nama" => "Aulia Putri",
                    "nim" => "2311102045",
                    "nilai_tugas" => 95,
                    "nilai_uts" => 88,
                    "nilai_uas" => 92
                ],
                [
                    "nama" => "Bagas Pratama",
                    "nim" => "2311102099",
                    "nilai_tugas" => 45,
                    "nilai_uts" => 55,
                    "nilai_uas" => 50
                ]
            ];

            function hitungNilaiAkhir($tugas, $uts, $uas) {
                return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
            }

            function tentukanGrade($nilai) {
                if ($nilai >= 85) return 'A';
                elseif ($nilai >= 75) return 'B';
                elseif ($nilai >= 65) return 'C';
                elseif ($nilai >= 50) return 'D';
                else return 'E';
            }

            function cekKelulusan($nilai) {
                return $nilai >= 60 ? "Lulus" : "Tidak Lulus";
            }

            $totalNilai = 0;
            $nilaiTertinggi = 0;
            $hasilData = [];

            foreach ($dataMahasiswa as $mhs) {
                $nilaiAkhir = hitungNilaiAkhir($mhs['nilai_tugas'], $mhs['nilai_uts'], $mhs['nilai_uas']);
                $grade = tentukanGrade($nilaiAkhir);
                $status = cekKelulusan($nilaiAkhir);

                $hasilData[] = [
                    'nama'   => $mhs['nama'],
                    'nim'    => $mhs['nim'],
                    'akhir'  => $nilaiAkhir,
                    'grade'  => $grade,
                    'status' => $status
                ];

                $totalNilai += $nilaiAkhir;
                if ($nilaiAkhir > $nilaiTertinggi) {
                    $nilaiTertinggi = $nilaiAkhir;
                }
            }

            $rataRata = $totalNilai / count($dataMahasiswa);
            ?>

            <div class="card rounded-4 border shadow-sm p-4 mb-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr class="bg-light">
                                <th class="ps-0 text-muted small fw-bold">Nama Mahasiswa</th>
                                <th class="text-muted small fw-bold">NIM</th>
                                <th class="text-center text-muted small fw-bold">Nilai Akhir</th>
                                <th class="text-center text-muted small fw-bold">Grade</th>
                                <th class="text-end text-muted small fw-bold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hasilData as $row): ?>
                            <tr>
                                <td class="ps-0 fw-bold text-dark"><?php echo htmlspecialchars($row['nama']); ?></td>
                                <td class="text-muted"><?php echo htmlspecialchars($row['nim']); ?></td>
                                <td class="text-center fw-bold text-primary"><?php echo number_format($row['akhir'], 2); ?></td>
                                <td class="text-center">
                                    <span class="badge border bg-light text-dark fw-medium"><?php echo $row['grade']; ?></span>
                                </td>
                                <td class="text-end">
                                    <?php if ($row['status'] == 'Lulus'): ?>
                                        <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3">Lulus</span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle px-3">Tidak Lulus</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border rounded-4 shadow-sm p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary fs-4">📊</div>
                            <div class="text-muted small fw-bold text-uppercase">Rata-rata Kelas</div>
                        </div>
                        <div class="h2 fw-bold text-dark mb-0"><?php echo number_format($rataRata, 2); ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border rounded-4 shadow-sm p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary fs-4">🏆</div>
                            <div class="text-muted small fw-bold text-uppercase">Nilai Tertinggi</div>
                        </div>
                        <div class="h2 fw-bold text-dark mb-0"><?php echo number_format($nilaiTertinggi, 2); ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border rounded-4 shadow-sm p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary fs-4">👥</div>
                            <div class="text-muted small fw-bold text-uppercase">Total Mahasiswa</div>
                        </div>
                        <div class="h2 fw-bold text-dark mb-0"><?php echo count($dataMahasiswa); ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
