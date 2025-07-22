<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .profil-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 480px;
            margin: 2rem auto;
        }
        .profil-title {
            font-weight: 700;
            font-size: 2rem;
            color: #2d3a4a;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-align: center;
        }
        .profil-info {
            font-size: 1.08rem;
            color: #374151;
        }
        .profil-label {
            color: #6366f1;
            font-weight: 600;
            min-width: 120px;
            display: inline-block;
        }
        .profil-value {
            color: #2d3a4a;
            font-weight: 500;
        }
        .profil-icon {
            color: #6366f1;
            font-size: 2.2rem;
            margin-bottom: 0.7rem;
        }
        .profil-btn {
            border-radius: 10px;
            font-weight: 500;
            font-size: 1.1rem;
        }
        @media (max-width: 600px) {
            .profil-card {
                padding: 1.2rem 0.5rem;
            }
            .profil-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="profil-card w-100">
            <div class="text-center">
                <div class="profil-icon"><i class="fa-solid fa-user-circle"></i></div>
                <div class="profil-title mb-2">Profil Pasien</div>
            </div>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if(isset($validation)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        <?php foreach($validation->getErrors() as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php $editMode = isset($_GET['edit']) && $_GET['edit'] == 1; ?>
            <?php if($editMode): ?>
            <form action="/profil-pasien/update/<?= $pasien['id'] ?>" method="post" class="profil-info mb-3">
                <div class="mb-2">
                    <span class="profil-label"><i class="fa fa-user"></i> Nama</span>
                    <input type="text" name="nama" class="form-control d-inline-block w-auto" value="<?= esc($pasien['nama']) ?>" required style="max-width:220px;">
                </div>
                <div class="mb-2">
                    <span class="profil-label"><i class="fa fa-location-dot"></i> Alamat</span>
                    <input type="text" name="alamat" class="form-control d-inline-block w-auto" value="<?= esc($pasien['alamat']) ?>" style="max-width:220px;">
                </div>
                <div class="mb-2">
                    <span class="profil-label"><i class="fa fa-calendar"></i> Tgl. Lahir</span>
                    <input type="date" name="tanggal_lahir" class="form-control d-inline-block w-auto" value="<?= esc($pasien['tanggal_lahir']) ?>" style="max-width:160px;">
                </div>
                <div class="mb-2">
                    <span class="profil-label"><i class="fa fa-venus-mars"></i> Jenis Kelamin</span>
                    <select name="jenis_kelamin" class="form-select d-inline-block w-auto" style="max-width:140px;">
                        <option value="L" <?= $pasien['jenis_kelamin']==='L'?'selected':'' ?>>Laki-laki</option>
                        <option value="P" <?= $pasien['jenis_kelamin']==='P'?'selected':'' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <span class="profil-label"><i class="fa fa-phone"></i> No. Telepon</span>
                    <input type="text" name="no_telepon" class="form-control d-inline-block w-auto" value="<?= esc($pasien['no_telepon']) ?>" style="max-width:180px;">
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="/profil-pasien/<?= $pasien['id'] ?>" class="btn btn-secondary profil-btn"><i class="fa-solid fa-xmark"></i> Batal</a>
                    <button type="submit" class="btn btn-success profil-btn"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </form>
            <?php else: ?>
            <div class="profil-info mb-3">
                <div class="mb-2"><span class="profil-label"><i class="fa fa-user"></i> Nama</span> <span class="profil-value">: <?= esc($pasien['nama']) ?></span></div>
                <div class="mb-2"><span class="profil-label"><i class="fa fa-location-dot"></i> Alamat</span> <span class="profil-value">: <?= esc($pasien['alamat']) ?: '-' ?></span></div>
                <div class="mb-2"><span class="profil-label"><i class="fa fa-calendar"></i> Tgl. Lahir</span> <span class="profil-value">: <?= $pasien['tanggal_lahir'] ? date('d-m-Y', strtotime($pasien['tanggal_lahir'])) : '-' ?></span></div>
                <div class="mb-2"><span class="profil-label"><i class="fa fa-venus-mars"></i> Jenis Kelamin</span> <span class="profil-value">: <?= $pasien['jenis_kelamin'] === 'L' ? 'Laki-laki' : ($pasien['jenis_kelamin'] === 'P' ? 'Perempuan' : '-') ?></span></div>
                <div class="mb-2"><span class="profil-label"><i class="fa fa-phone"></i> No. Telepon</span> <span class="profil-value">: <?= esc($pasien['no_telepon']) ?: '-' ?></span></div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="/daftar-pasien" class="btn btn-outline-primary profil-btn"><i class="fa-solid fa-users"></i> Daftar Pasien</a>
                <div class="d-flex gap-2">
                    <a href="/profil-pasien/<?= $pasien['id'] ?>?edit=1" class="btn btn-warning profil-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form action="/profil-pasien/hapus/<?= $pasien['id'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data pasien ini?');">
                        <button type="submit" class="btn btn-danger profil-btn"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </form>
                </div>
                <a href="/registrasi" class="btn btn-secondary profil-btn"><i class="fa-solid fa-arrow-left"></i> Registrasi Baru</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
