<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .list-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 1000px;
            margin: 2rem auto;
        }
        .list-title {
            font-weight: 700;
            font-size: 2rem;
            color: #2d3a4a;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-align: center;
        }
        .btn-custom {
            border-radius: 10px;
            font-weight: 500;
            font-size: 1.1rem;
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
            .list-card {
                padding: 1.2rem 0.5rem;
            }
            .list-title {
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
        <div class="list-card w-100">
            <div class="list-title mb-4">
                <i class="fa-solid fa-users me-2" style="color:#6366f1;"></i>Daftar Pasien
            </div>
            <div class="mb-3 d-flex justify-content-between flex-wrap gap-2">
                <a href="/registrasi" class="btn btn-success btn-custom"><i class="fa-solid fa-user-plus"></i> Registrasi Pasien Baru</a>
                <a href="/dashboard" class="btn btn-secondary btn-custom"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telepon</th>
                            <th>Tanggal Registrasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($pasien) > 0): ?>
                            <?php foreach($pasien as $i => $p): ?>
                                <tr>
                                    <td class="text-center"><?= $i+1 ?></td>
                                    <td><?= esc($p['nama']) ?></td>
                                    <td><?= esc($p['alamat']) ?></td>
                                    <td><?= esc($p['tanggal_lahir']) ?></td>
                                    <td><?= $p['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                    <td><?= esc($p['no_telepon']) ?></td>
                                    <td><?= (new DateTime($p['created_at'], new DateTimeZone('UTC')))
        ->setTimezone(new DateTimeZone('Asia/Jakarta'))
        ->format('d-m-Y H:i') ?></td>
                                    <td class="text-center">
                                        <a href="/profil-pasien/<?= $p['id'] ?>" class="btn btn-info btn-sm btn-custom" title="Lihat Profil">
                                            <i class="fa-solid fa-id-card"></i> Profil
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="text-center no-data">Belum ada pasien terdaftar.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
