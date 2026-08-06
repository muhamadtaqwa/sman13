<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rekap Absensi - SMAN 13 Semarang</title>
    <style>
        * {
            font-family: Arial, sans-serif;
        }

        body {
            font-size: 12px;
            color: #1E3A5F;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 3px solid #3B82F6;
        }

        .header .logo-text {
            font-size: 12px;
            font-weight: 700;
            color: #3B82F6;
        }

        .header h2 {
            margin: 0;
            font-size: 12px;
            color: #1E3A5F;
        }

        .header h3 {
            margin: 6px 0 0 0;
            font-size: 12px;
            color: #60A5FA;
        }

        .info {
            margin-bottom: 20px;
            background: #F0F4FF;
            padding: 12px 16px;
            border: 1px solid #DBEAFE;
        }

        .info-row {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .info-label {
            font-weight: 700;
            color: #64748B;
        }

        .info-value {
            font-weight: 600;
            color: #1E3A5F;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #E2E8F0;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background: #3B82F6;
            color: white;
            font-weight: 700;
        }

        .hadir {
            color: #059669;
            background: #D1FAE5;
            padding: 2px 8px;
            border-radius: 4px;
            display: inline-block;
        }

        .izin,
        .sakit {
            color: #D97706;
            background: #FEF3C7;
            padding: 2px 8px;
            border-radius: 4px;
            display: inline-block;
        }

        .alpa {
            color: #DC2626;
            background: #FEE2E2;
            padding: 2px 8px;
            border-radius: 4px;
            display: inline-block;
        }

        .belum {
            color: #64748B;
            background: #F1F5F9;
            padding: 2px 8px;
            border-radius: 4px;
            display: inline-block;
        }

        .footer {
            margin-top: 35px;
            text-align: right;
            border-top: 1px solid #E2E8F0;
            padding-top: 15px;
        }

        .page-break {
            page-break-before: always;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            font-size: 5rem;
            color: rgba(59, 130, 246, 0.03);
            font-weight: 900;
            pointer-events: none;
            z-index: -1;
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <div class="watermark">SkyEdu</div>

    @php
        // Hitung jumlah baris per halaman
        $rowsPerPage = 20;
        $totalSiswa = count($dataSiswa);
        $totalPages = ceil($totalSiswa / $rowsPerPage);
        $kegiatanNames = !empty($dataSiswa) ? array_keys($dataSiswa[0]['kegiatan'] ?? []) : [];
    @endphp

    @for($page = 1; $page <= $totalPages; $page++)
        @php
            $start = ($page - 1) * $rowsPerPage;
            $pageData = array_slice($dataSiswa, $start, $rowsPerPage);
        @endphp

        @if($page > 1)
            <div class="page-break"></div>
        @endif

        <!-- HEADER HALAMAN -->
        <div class="header">
            <div class="logo-text">Sistem Informasi Monitoring Sekolah</div>
            <h2>SMAN 13 Semarang</h2>
            <h3>Laporan Rekap Absensi - Halaman {{ $page }} dari {{ $totalPages }}</h3>
        </div>

        <div class="info">
            <div class="info-row">
                <div class="info-item">
                    <span class="info-label">Periode:</span>
                    <span class="info-value">
                        @if($mode == 'harian')
                            {{ date('d-m-Y', strtotime($waktu)) }}
                        @elseif($mode == 'bulanan')
                            {{ date('F Y', strtotime($waktu . '-01')) }}
                        @else
                            {{ $waktu }}
                        @endif
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">Kelas:</span>
                    <span class="info-value">{{ $kelas == 'semua' ? 'Semua Kelas' : $kelas }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Dicetak:</span>
                    <span class="info-value">{{ $tanggal_cetak }}</span>
                </div>
            </div>
        </div>

        <!-- TABEL DENGAN HEADER (ditulis ulang setiap halaman) -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    @foreach($kegiatanNames as $kegiatan)
                        <th>{{ $kegiatan }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($pageData as $index => $siswa)
                    <tr>
                        <td>{{ $start + $index + 1 }}</td>
                        <td>{{ $siswa['nis'] }}</td>
                        <td>{{ $siswa['nama_lengkap'] }}</td>
                        <td>{{ $siswa['kode_kelas'] }}</td>
                        @foreach($siswa['kegiatan'] as $status)
                            <td>
                                <span class="
                                        @if($status == 'Hadir') hadir
                                        @elseif($status == 'Izin') izin
                                        @elseif($status == 'Sakit') sakit
                                        @elseif($status == 'Alpa') alpa
                                        @else belum
                                        @endif
                                    ">{{ $status }}</span>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($page == $totalPages)
            <div class="footer">
                <p>Semarang, {{ date('d F Y', strtotime($tanggal_cetak)) }}</p>
                <p>Mengetahui,</p>
                <div style="margin-top: 30px;">
                    <br><br><br>
                    <p style="margin:0;">______________________</p>
                    <p style="font-weight: 700; color: #3B82F6;">Kepala Sekolah</p>
                    <p style="color:#94A3B8;">SMAN 13 Semarang</p>
                </div>
                <p style="margin-top:20px; color:#93C5FD; text-align:center;">
                    Dicetak melalui Sistem Informasi Monitoring Sekolah
                </p>
            </div>
        @endif
    @endfor

</body>

</html>