<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .reg-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 430px;
            margin: 2rem auto;
        }
        .reg-title {
            font-weight: 700;
            font-size: 2rem;
            color: #2d3a4a;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-align: center;
        }
        .reg-btn {
            border-radius: 10px;
            font-weight: 500;
            font-size: 1.1rem;
        }
        .reg-link {
            display: inline-block;
            margin-bottom: 1.2rem;
            text-decoration: none;
            color: #6366f1;
            font-weight: 500;
            transition: color 0.2s;
        }
        .reg-link:hover {
            color: #4338ca;
            text-decoration: underline;
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
        @media (max-width: 600px) {
            .reg-card {
                padding: 1.2rem 0.5rem;
            }
            .reg-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="reg-card w-100">
            <div class="reg-title mb-4">
                <i class="fa-solid fa-user-plus me-2" style="color:#6366f1;"></i>Registrasi Pasien
            </div>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <a href="/daftar-pasien" class="reg-link"><i class="fa-solid fa-users"></i> Lihat Daftar Pasien</a>
            <form action="/registrasi/simpan" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" required>
                        <option value="">Pilih</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary reg-btn"><i class="fa-solid fa-paper-plane"></i> Daftar</button>
                    <a href="/dashboard" class="btn btn-secondary reg-btn"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
