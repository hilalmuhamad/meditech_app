<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Meditech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
            position: relative;
        }
        .bg-svg {
            position: fixed;
            z-index: 0;
            opacity: 0.18;
            pointer-events: none;
        }
        .bg-svg.obat {
            left: 2vw;
            top: 8vh;
            width: 170px;
            height: 170px;
        }
        .bg-svg.suntik {
            right: 4vw;
            bottom: 10vh;
            width: 140px;
            height: 140px;
        }
        .dashboard-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
            position: relative;
            z-index: 1;
        }
        .dashboard-title {
            font-weight: 700;
            font-size: 2.2rem;
            color: #2d3a4a;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }
        .menu-list {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .menu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem 1.5rem;
            border-radius: 12px;
            background: #f1f5f9;
            color: #2d3a4a;
            font-size: 1.15rem;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .menu-item:hover {
            background: #6366f1;
            color: #fff;
            box-shadow: 0 4px 16px rgba(99,102,241,0.10);
        }
        .menu-icon {
            font-size: 1.5rem;
            color: #6366f1;
            transition: color 0.2s;
        }
        .menu-item:hover .menu-icon {
            color: #fff;
        }
        @media (max-width: 600px) {
            .dashboard-card {
                padding: 1.2rem 0.5rem;
            }
            .dashboard-title {
                font-size: 1.3rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- SVG Pill -->
    <svg class="bg-svg obat" viewBox="0 0 64 64" fill="none">
        <rect x="8" y="24" width="48" height="16" rx="8" fill="#6366f1"/>
        <rect x="32" y="24" width="24" height="16" rx="8" fill="#fff" fill-opacity="0.8"/>
        <rect x="8" y="24" width="24" height="16" rx="8" fill="#16a34a" fill-opacity="0.8"/>
        <rect x="28" y="28" width="8" height="8" rx="4" fill="#6366f1"/>
    </svg>
    <!-- SVG Syringe -->
    <svg class="bg-svg suntik" viewBox="0 0 64 64" fill="none">
        <rect x="38" y="10" width="8" height="44" rx="4" fill="#16a34a"/>
        <rect x="18" y="38" width="28" height="8" rx="4" fill="#fff" stroke="#16a34a" stroke-width="3"/>
        <rect x="28" y="46" width="8" height="8" rx="4" fill="#16a34a"/>
        <rect x="40" y="6" width="4" height="8" rx="2" fill="#6366f1"/>
    </svg>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="dashboard-card w-100" style="max-width: 420px;">
            <div class="dashboard-title text-center mb-4">
                <i class="fa-solid fa-stethoscope me-2" style="color:#6366f1;"></i>Meditech
            </div>
            <div class="menu-list">
                <a href="/registrasi" class="menu-item">
                    <span class="menu-icon"><i class="fa-solid fa-user-plus"></i></span>
                    Registrasi Pasien
                </a>
                <a href="/jadwal-konsultasi" class="menu-item">
                    <span class="menu-icon"><i class="fa-solid fa-calendar-check"></i></span>
                    Jadwal Konsultasi
                </a>
                <a href="/rekam-medis" class="menu-item">
                    <span class="menu-icon"><i class="fa-solid fa-file-medical"></i></span>
                    Rekam Medis
                </a>
            </div>
        </div>
    </div>
</body>
</html>
