<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konsultasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .jadwal-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 600px;
            margin: 2rem auto;
        }
        .jadwal-title {
            font-weight: 700;
            font-size: 2rem;
            color: #2d3a4a;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-align: center;
        }
        .jadwal-btn {
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
            .jadwal-card {
                padding: 1.2rem 0.5rem;
            }
            .jadwal-title {
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
        <div class="jadwal-card w-100">
            <div class="jadwal-title mb-4">
                <i class="fa-solid fa-calendar-check me-2" style="color:#6366f1;"></i>Jadwal Konsultasi
            </div>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <form action="/jadwal-konsultasi/simpan" method="post" class="mb-4">
                <div class="mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_konsultasi" class="form-label">Tanggal Konsultasi</label>
                    <input type="date" class="form-control" id="tanggal_konsultasi" name="tanggal_konsultasi" required>
                </div>
                <div class="mb-3">
                    <label for="jam_konsultasi" class="form-label">Jam Konsultasi</label>
                    <input type="time" class="form-control" id="jam_konsultasi" name="jam_konsultasi" required>
                </div>
                <div class="mb-3">
                    <label for="dokter" class="form-label">Dokter</label>
                    <input type="text" class="form-control" id="dokter" name="dokter" required>
                </div>
                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan"></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary jadwal-btn"><i class="fa-solid fa-paper-plane"></i> Simpan</button>
                    <a href="/dashboard" class="btn btn-secondary jadwal-btn"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Dokter</th>
                            <th>Keluhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($jadwal) > 0): ?>
                            <?php foreach($jadwal as $i => $j): ?>
                                <tr>
                                    <td class="text-center"><?= $i+1 ?></td>
                                    <td><?= esc($j['nama_pasien']) ?></td>
                                    <td><?= date('d-m-Y', strtotime($j['tanggal_konsultasi'])) ?></td>
                                    <td><?= date('H:i', strtotime($j['jam_konsultasi'])) ?></td>
                                    <td><?= esc($j['dokter']) ?></td>
                                    <td><?= esc($j['keluhan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center no-data">Belum ada jadwal konsultasi.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
