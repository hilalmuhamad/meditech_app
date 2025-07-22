<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Meditech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        .halo-header {
            background: linear-gradient(120deg, #6366f1 60%, #16a34a 100%);
            color: #fff;
            border-radius: 0 0 36px 36px;
            padding: 2.5rem 1.2rem 2.2rem 1.2rem;
            text-align: center;
            position: relative;
            box-shadow: 0 8px 32px 0 rgba(99,102,241,0.13);
        }
        .halo-avatar {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem auto;
            box-shadow: 0 2px 18px rgba(99,102,241,0.18);
            backdrop-filter: blur(2px);
        }
        .halo-avatar i {
            font-size: 2.7rem;
            color: #fff;
            filter: drop-shadow(0 2px 8px #6366f1cc);
        }
        .halo-title {
            font-size: 1.7rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin-bottom: 0.2rem;
            text-shadow: 0 2px 8px #6366f1cc;
        }
        .halo-subtitle {
            font-size: 1.08rem;
            color: #e0e7ff;
            opacity: 0.92;
            font-weight: 500;
        }
        .halo-menu {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem 1.2rem;
            margin: 2.5rem 0 1.2rem 0;
        }
        .halo-menu-item {
            background: rgba(255,255,255,0.65);
            border-radius: 22px;
            box-shadow: 0 4px 24px rgba(99,102,241,0.10), 0 1.5px 8px rgba(22,163,74,0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 0.7rem 1.2rem 0.7rem;
            text-decoration: none;
            color: #2d3a4a;
            font-weight: 700;
            font-size: 1.13rem;
            transition: box-shadow 0.22s, background 0.22s, color 0.22s, transform 0.18s;
            border: 2.5px solid #eef2ff;
            position: relative;
            overflow: hidden;
        }
        .halo-menu-item:before {
            content: '';
            position: absolute;
            top: -40%;
            left: -40%;
            width: 180%;
            height: 180%;
            background: radial-gradient(circle at 60% 40%, #6366f1 0%, #16a34a 100%, transparent 80%);
            opacity: 0.07;
            z-index: 0;
            transition: opacity 0.2s;
        }
        .halo-menu-item:hover {
            background: linear-gradient(120deg, #6366f1 60%, #16a34a 100%);
            color: #fff;
            box-shadow: 0 8px 32px rgba(99,102,241,0.18), 0 2px 12px rgba(22,163,74,0.10);
            transform: translateY(-4px) scale(1.04);
        }
        .halo-menu-item:hover .halo-menu-icon {
            background: #fff;
            color: #6366f1;
            box-shadow: 0 2px 12px #6366f1cc;
        }
        .halo-menu-icon {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.1rem;
            color: #6366f1;
            margin-bottom: 0.9rem;
            box-shadow: 0 2px 8px #6366f133;
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
            z-index: 1;
        }
        @media (max-width: 600px) {
            .halo-header {
                padding: 1.3rem 0.5rem 1.1rem 0.5rem;
                border-radius: 0 0 18px 18px;
            }
            .halo-title {
                font-size: 1.15rem;
            }
            .halo-menu {
                gap: 0.8rem 0.5rem;
            }
            .halo-menu-item {
                font-size: 0.98rem;
                padding: 1.1rem 0.2rem 0.8rem 0.2rem;
            }
            .halo-menu-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="halo-header">
        <div class="halo-avatar">
            <i class="fa-solid fa-stethoscope"></i>
        </div>
        <div class="halo-title">Meditech Klinik</div>
        <div class="halo-subtitle">Selamat datang, layanan kesehatan digital Anda</div>
    </div>
    <div class="container" style="max-width: 440px; margin-top: 3.5rem;">
        <div class="halo-menu">
            <a href="/registrasi" class="halo-menu-item">
                <div class="halo-menu-icon"><i class="fa-solid fa-user-plus"></i></div>
                Registrasi Pasien
            </a>
            <a href="/jadwal-konsultasi" class="halo-menu-item">
                <div class="halo-menu-icon"><i class="fa-solid fa-calendar-check"></i></div>
                Jadwal Konsultasi
            </a>
            <a href="/rekam-medis" class="halo-menu-item">
                <div class="halo-menu-icon"><i class="fa-solid fa-file-medical"></i></div>
                Rekam Medis
            </a>
            <a href="/daftar-pasien" class="halo-menu-item">
                <div class="halo-menu-icon"><i class="fa-solid fa-users"></i></div>
                Data Pasien
            </a>
        </div>
    </div>
</body>
</html>
