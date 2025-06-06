{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hadirin</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        /* Full-width Header */
        .header-wrapper {
            width: 100%;
            background-color: #041754;
            border-bottom: 1px solid #e0e0e0;
        }
        .header-content-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            position: relative;
        }
        .app-title {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffffff;
        }
        .header-icons {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 15px;
        }
        .header-icon {
            width: 24px;
            height: 24px;
            color: #ffffff;
            cursor: pointer;
            transition: color 0.3s;
        }
        .header-icon:hover {
            color: #0d6efd;
        }
        .header-content {
            text-align: center;
            padding: 70px 0 0;
        }
        .school-info {
            color: #ffffff;
        }
        .school-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 15px;
            color: #ffffff;
        }
        .nav-tabs {
            border-bottom: none;
            margin: 20px;
            justify-content: center;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #ffffff;
            font-weight: 500;
            padding: 10px 20px;
            cursor: pointer;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            background-color: transparent;
            border-bottom: 2px solid #0d6efd;
        }
        /* Main Content Container */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 15px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 25px;
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
            background-color: #e9f0ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 30px 0;
        }
        a.card {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <!-- Full-width Header -->
    <div class="header-wrapper">
        <div class="header-content-container">
            <div class="app-title">HADIRIN</div>
            <div class="header-icons">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="header-icon"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                >
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99
                        0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7
                        0-2.42-1.72-4.44-4.005-4.901z"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="header-icon"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                >
                    <path
                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81
                        0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987
                        1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4
                        2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698
                        1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0
                        1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81
                        0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698
                        2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1
                        .872-2.105l.34-.1c1.4-.413 1.4-2.397
                        0-2.81l-.34-.1a1.464 1.464 0 0
                        1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464
                        1.464 0 0 1-2.105-.872l-.1-.34zM8
                        10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1
                        0 5.858z"
                    />
                </svg>
            </div>
            <div class="header-content">
                <div class="school-info">
                    <div class="school-icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491
                                6.347A48.62 48.62 0 0 1 12 20.904a48.62
                                48.62 0 0 1 8.232-4.41 60.46 60.46 0 0
                                0-.491-6.347m-15.482 0a50.636 50.636 0
                                0 0-2.658-.813A59.906 59.906 0 0 1 12
                                3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482
                                0A50.717 50.717 0 0 1 12
                                13.489a50.702 50.702 0 0 1 7.74-3.342M6.75
                                15a.75.75 0 1 0 0-1.5.75.75 0 0
                                0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1
                                12 8.443m-7.007 11.55A5.981
                                5.981 0 0 0 6.75 15.75v-1.5"
                            />
                        </svg>
                    </div>
                    <h4>SMKN 1</h4>
                    <p class="mb-0">Kota Bengkulu</p>
                </div>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tools-tab">Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prints-tab">Prints</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#info-tab">Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="main-container">
        <div class="tab-content">

            {{-- 1) TOOLS TAB --}}
            <div class="tab-pane fade show active" id="tools-tab">
                <div class="row">
                    {{-- Input Anggota --}}
                    <div class="col-md-6">
                        <a href="{{ route('anggota.index') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6
                                            3 3 0 0 0 0 6zm2-3a2 2
                                            0 1 1-4 0 2 2 0 0 1 4
                                            0zm4 8c0 1-1 1-1
                                            1H3s-1 0-1-1 1-4 6-4
                                            6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516
                                            10.68 10.289 10 8
                                            10c-2.29 0-3.516.68-4.168
                                            1.332-.678.678-.83
                                            1.418-.832
                                            1.664h10z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Input Anggota</h5>
                                <p class="card-text text-muted">
                                    Tambahkan anggota baru ke dalam sistem
                                </p>
                            </div>
                        </a>
                    </div>

                    {{-- Input Kegiatan --}}
                    <div class="col-md-6">
                        <a href="{{ route('kegiatan.index') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M5.5 7a.5.5 0 0
                                            0 0 1h5a.5.5 0 0 0
                                            0-1h-5zM5 9.5a.5.5 0 0
                                            1 .5-.5h5a.5.5 0 0 1
                                            0 1h-5a.5.5 0 0
                                            1-.5-.5zm0 2a.5.5 0 0
                                            1 .5-.5h2a.5.5 0 0 1
                                            0 1h-2a.5.5 0 0
                                            1-.5-.5z"
                                        />
                                        <path
                                            d="M9.5 0H4a2 2 0 0
                                            0-2 2v12a2 2 0 0 0
                                            2 2h8a2 2 0 0 0 2-2V4.5L9.5
                                            0zm0 1v2A1.5 1.5 0 0 0
                                            11 4.5h2V14a1 1 0 0 1-1
                                            1H4a1 1 0 0 1-1-1V2a1 1
                                            0 0 1 1-1h5.5z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Input Kegiatan</h5>
                                <p class="card-text text-muted">
                                    Buat kegiatan baru untuk presensi
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row mt-4">
                    {{-- Generate ID Anggota --}}
                    <div class="col-md-6">
                        <a href="{{ route('anggota.generate') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8 1a2 2 0 0 1 2
                                            2v4H6V3a2 2 0 0 1 2-2zm3
                                            6V3a3 3 0 0 0-6
                                            0v4a2 2 0 0 0-2
                                            2v5a2 2 0 0 0 2 2h6a2
                                            2 0 0 0 2-2V9a2 2 0 0
                                            0-2-2z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Generate ID Anggota</h5>
                                <p class="card-text text-muted">
                                    Buat QR Code untuk anggota
                                </p>
                            </div>
                        </a>
                    </div>

                    {{-- Scan Kehadiran --}}
                    <div class="col-md-6">
                        <a href="{{ route('kehadiran.scan') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M2.5 1A1.5 1.5 0 0
                                            0 1 2.5v11A1.5 1.5 0 0 0
                                            2.5 15h6.086a1.5 1.5 0 0
                                            0 1.06-.44l4.915-4.914A1.5
                                            1.5 0 0 0 15 8.586V2.5A1.5
                                            1.5 0 0 0 13.5 1h-11zM2
                                            2.5a.5.5 0 0 1 .5-.5h11a.5.5
                                            0 0 1 .5.5V8H9.5A1.5 1.5
                                            0 0 0 8 9.5V14H2.5a.5.5
                                            0 0 1-.5-.5v-11zm7
                                            11.293V9.5a.5.5 0 0 1
                                            .5-.5h4.293L9 13.793z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Scan Kehadiran</h5>
                                <p class="card-text text-muted">
                                    Scan QR Code untuk mencatat absensi
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- 2) PRINTS TAB --}}
            <div class="tab-pane fade" id="prints-tab">
                <div class="row">
                    {{-- Print Kehadiran Harian --}}
                    <div class="col-md-6">
                        <a href="{{ route('kehadiran.print_harian') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M5 1a2 2 0 0 0-2
                                            2v1h10V3a2 2 0 0 0-2-2H5zm6
                                            8H5a1 1 0 0 0-1
                                            1v3a1 1 0 0 0 1
                                            1h6a1 1 0 0 0 1-1v-3a1 1
                                            0 0 0-1-1z"
                                        />
                                        <path
                                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1
                                            2 2v3a2 2 0 0 1-2
                                            2h-1v-2a2 2 0 0 0-2-2H5a2 2
                                            0 0 0-2 2v2H2a2 2 0 0
                                            1-2-2V7zm2.5 1a.5.5 0 1
                                            0 0-1 .5.5 0 0 0
                                            0 1z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Print Kehadiran Harian</h5>
                                <p class="card-text text-muted">
                                    Cetak laporan absensi per hari
                                </p>
                            </div>
                        </a>
                    </div>

                    {{-- Print Kehadiran Bulanan --}}
                    <div class="col-md-6">
                        <a href="{{ route('kehadiran.print_bulanan') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M2.5 8a.5.5 0 1 0
                                            0-1 .5.5 0 0 0 0 1z"
                                        />
                                        <path
                                            d="M5 1a2 2 0 0 0-2
                                            2v2H2a2 2 0 0 0-2
                                            2v3a2 2 0 0 0 2
                                            2h1v1a2 2 0 0 0 2
                                            2h6a2 2 0 0 0 2-2v-1h1a2
                                            2 0 0 0 2-2V7a2 2 0 0
                                            0-2-2h-1V3a2 2 0 0-2
                                            -2H5zM4 3a1 1 0 0 1 1-1h6a1
                                            1 0 0 1 1 1v2H4V3zm1 5a2
                                            2 0 0 0-2 2v1H2a1 1 0 0
                                            1-1-1V7a1 1 0 0 1
                                            1-1h12a1 1 0 0 1
                                            1 1v3a1 1 0 0 1-1
                                            1h-1v-1a2 2 0 0 0-2-2H5zm7
                                            2v3a1 1 0 0 1-1 1H5a1 1
                                            0 0 1-1-1v-3a1 1 0 0 1
                                            1-1h6a1 1 0 0 1 1 1z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Print Kehadiran Bulanan</h5>
                                <p class="card-text text-muted">
                                    Cetak laporan absensi per bulan
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row mt-4">
                    {{-- Print Seluruh ID Anggota --}}
                    <div class="col-md-6">
                        <a href="{{ route('anggota.index') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M4.5 5a.5.5 0 1 0
                                            0-1 .5.5 0 0 0 0
                                            1zM3 4.5a.5.5 0 1
                                            1-1 0 .5.5 0 0
                                            1 1 0zm2 7a.5.5 0
                                            1 1-1 0 .5.5 0 0
                                            1 1 0zm-2.5.5a.5.5
                                            0 1 0 0-1 .5.5 0 0
                                            0 0 1z"
                                        />
                                        <path
                                            d="M2 2a2 2 0 0 1 2
                                            -2h8a2 2 0 0 1 2
                                            2v12a2 2 0 0 1-2
                                            2H4a2 2 0 0 1-2-2V2zm10-1H4a1
                                            1 0 0 0-1 1v12a1 1 0 0
                                            0 1 1h8a1 1 0 0 0
                                            1-1V2a1 1 0 0 0-1-1z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Print Seluruh ID Anggota</h5>
                                <p class="card-text text-muted">
                                    Cetak semua ID anggota terdaftar
                                </p>
                            </div>
                        </a>
                    </div>

                    {{-- Print Seluruh Kegiatan --}}
                    <div class="col-md-6">
                        <a href="{{ route('kegiatan.index') }}" class="card">
                            <div class="card-body text-center">
                                <div class="feature-icon mx-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="30"
                                        height="30"
                                        fill="#0d6efd"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M5 1a2 2 0 0 0-2
                                            2v1h10V3a2 2 0 0 0-2-2H5zm6
                                            8H5a1 1 0 0 0-1
                                            1v3a1 1 0 0 0 1
                                            1h6a1 1 0 0 0 1-1v-3a1 1
                                            0 0 0-1-1z"
                                        />
                                        <path
                                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0
                                            0 1 2 2v3a2 2 0 0 1-2
                                            2h-1v-2a2 2 0 0 0-2-2H5a2
                                            2 0 0 0-2 2v2H2a2 2 0
                                            0 1-2-2V7zm2.5 1a.5.5 0
                                            1 0 0-1 .5.5 0 0
                                            0 0 1z"
                                        />
                                    </svg>
                                </div>
                                <h5 class="card-title">Print Seluruh Kegiatan</h5>
                                <p class="card-text text-muted">
                                    Cetak semua kegiatan terdaftar
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- 3) INFO TAB --}}
            <div class="tab-pane fade" id="info-tab">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tentang HADIRIN</h4>
                                <p class="card-text">
                                    <strong>HADIRIN adalah sistem pengelola kehadiran
                                    digital untuk lingkungan sekolah.</strong><br/><br/>
                                    Dengan desain minimalis namun lengkap, Hadirin
                                    mengakomodasi kebutuhan absensi harian, bulanan,
                                    dan pencetakan laporan. Sistem ini sepenuhnya
                                    dikembangkan secara swadaya sebagai produk
                                    hibah dari Guru Produktif Jurusan PPLG SMKN 1
                                    Kota Bengkulu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle JS (tabs switching) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.nav-tabs .nav-link');

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Remove active class from all
                    document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
                    document.querySelectorAll('.tab-pane').forEach(el => el.classList.remove('show', 'active'));
                    // Activate clicked
                    this.classList.add('active');
                    const target = this.getAttribute('href');
                    document.querySelector(target).classList.add('show', 'active');
                });
            });
        });
    </script>
</body>
</html>
