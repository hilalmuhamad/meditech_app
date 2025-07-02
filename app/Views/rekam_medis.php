<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .rekam-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 700px;
            margin: 2rem auto;
        }
        .rekam-title {
            font-weight: 700;
            font-size: 2rem;
            color: #2d3a4a;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-align: center;
        }
        .rekam-btn {
            border-radius: 10px;
            font-weight: 500;
            font-size: 1.1rem;
        }
        .form-label {
            font-weight: 500;
            color: #374151;
        }
        .form-control, .form-select {
            border-radius: 8px;
            font-size: 1rem;
        }
        .alert-success {
            border-radius: 10px;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
            background: #f8fafc;
        }
        th {
            background: #6366f1;
            color: #fff;
            font-weight: 600;
            text-align: center;
        }
        td {
            vertical-align: middle;
        }
        .no-data {
            color: #64748b;
            font-style: italic;
        }
        @media (max-width: 600px) {
            .rekam-card {
                padding: 1.2rem 0.5rem;
            }
            .rekam-title {
                font-size: 1.3rem;
            }
            .table {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="rekam-card w-100">
            <div class="rekam-title mb-4">
                <i class="fa-solid fa-file-medical me-2" style="color:#6366f1;"></i>Rekam Medis
            </div>
            <!-- Form Pencarian Riwayat Pasien -->
            <form method="get" action="" class="mb-4">
                <div class="search-box p-2 px-3 rounded-4 shadow-sm bg-light d-flex align-items-center gap-2" style="max-width: 420px; margin: 0 auto 18px auto;">
                    <span class="me-2" style="color:#6366f1;font-size:1.3rem;"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control border-0 bg-light" name="cari" placeholder="Cari nama pasien..." value="<?= esc($_GET['cari'] ?? '') ?>" style="box-shadow:none;outline:none;">
                    <button class="btn btn-primary px-3 rounded-3 ms-2 d-flex align-items-center gap-1" type="submit" style="font-weight:500;">
                        <i class="fa fa-search"></i> <span class="d-none d-sm-inline">Cari</span>
                    </button>
                </div>
            </form>
            <style>
                .search-box input:focus {
                    background: #eef2ff;
                }
                .search-box input::placeholder {
                    color: #a5b4fc;
                    font-style: italic;
                }
                .search-box {
                    transition: box-shadow 0.2s;
                }
                .search-box:focus-within {
                    box-shadow: 0 0 0 3px #6366f133;
                }
            </style>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <form action="/rekam-medis/simpan" method="post" class="mb-4">
                <div class="mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="diagnosa" class="form-label">Diagnosa</label>
                    <textarea class="form-control" id="diagnosa" name="diagnosa"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tindakan" class="form-label">Tindakan</label>
                    <textarea class="form-control" id="tindakan" name="tindakan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="dokter" class="form-label">Dokter</label>
                    <input type="text" class="form-control" id="dokter" name="dokter">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary rekam-btn"><i class="fa-solid fa-paper-plane"></i> Simpan</button>
                    <a href="/dashboard" class="btn btn-secondary rekam-btn"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal</th>
                            <th>Keluhan</th>
                            <th>Diagnosa</th>
                            <th>Tindakan</th>
                            <th>Dokter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($rekam) > 0): ?>
                            <?php foreach($rekam as $i => $r): ?>
                                <tr>
                                    <td class="text-center"><?= $i+1 ?></td>
                                    <td><?= esc($r['nama_pasien']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($r['tanggal'])) ?></td>
                                    <td><?= esc($r['keluhan']) ?></td>
                                    <td><?= esc($r['diagnosa']) ?></td>
                                    <td><?= esc($r['tindakan']) ?></td>
                                    <td><?= esc($r['dokter']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="text-center no-data">Belum ada rekam medis.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
