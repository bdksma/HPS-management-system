<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pekerjaan dan Rincian</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h2 {
            text-align: center;
            font-weight: bold;
            line-height: 0.75;
            text-decoration: underline;
            font-size: 14pt;
        }

        h4 {
            font-size: 12pt;
            line-height: 1.15;
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Membantu menjaga ukuran tetap proporsional */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word; /* Mencegah teks keluar dari sel */
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .right-aligned {
            text-align: right;
            padding-right: 10px;
        }

        .left-aligned {
            text-align: left;
            padding-left: 10px;
        }

        .fit-content {
            white-space: nowrap;
            min-width: 50px;
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .form-control, .rp-dropdown {
            width: 100%;
            box-sizing: border-box;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        /* Agar tabel tetap bagus saat di-print */
        @media print {
            table {
                page-break-before: always;
                page-break-inside: avoid;
            }

            th, td {
                font-size: 12pt; /* Agar lebih mudah dibaca saat dicetak */
            }

            .fit-content {
                max-width: unset; /* Menghilangkan batasan lebar */
                white-space: normal; /* Mengizinkan teks wrap */
            }
        }
    </style>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<body>
    <div class="container-flui mb-4">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/main" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <!--<svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>-->
                <img src="{{asset('front/photo/logo.png')}}" alt="Logo" class="me-2" width="155" height="60">
                <span class="fs-4" align-items-center>Buat HPS</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ url('/main') }}" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ url('/material') }}" class="nav-link">Basis Data</a></li>
                <li class="nav-item"><a href="{{ url('/newhps') }}" class="nav-link active">HPS</a></li>
            </ul>
        </header>
    </div>
    <div class="container-fluid mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/main') }}">Main</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ url('/newhps') }}">Buat HPS Baru</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Data HPS
                </li>
            </ol>
        </nav>
    </div>
    
    <!-- Dropdown Pilihan Pekerjaan -->
<select id="pekerjaan_id" name="jenis_pekerjaan" class="form-control work-dropdown select2">
    <option value="">Pilih Pekerjaan</option>
    @foreach ($pekerjaans as $pekerjaan)
        <option value="{{ $pekerjaan->pekerjaan_id }}" 
                data-nama="{{ $pekerjaan->nama_pekerjaan }}" 
                data-lokasi="{{ $pekerjaan->lokasi }}" 
                data-nomor="{{ $pekerjaan->nomor_pekerjaan }}">
            {{ $pekerjaan->nama_pekerjaan }} - {{ $pekerjaan->lokasi }} - {{ $pekerjaan->nomor_pekerjaan }}
        </option>
    @endforeach
</select>


<!-- Detail Pekerjaan -->
<div id="pekerjaan-detail" style="display: none;">
    <div class="center">
        <p><strong>Nama Pekerjaan:</strong> <span id="detail-nama"></span></p>
        <p><strong>Lokasi:</strong> <span id="detail-lokasi"></span></p>
        <p><strong>Nomor Pekerjaan:</strong> <span id="detail-nomor"></span></p>
    </div>
    </div>

    <div>
    <table>
    <thead>
       <tr>
            <th rowspan="2" class="fit-content">No</th>
            <th rowspan="2" class="fit-content">Uraian Pekerjaan</th>
            <th colspan="2" class="fit-content">Volume</th>
            <th colspan="4" class="fit-content">Biaya Satuan (Rp)</th>
            <th colspan="3" class="fit-content">Biaya Langsung (Rp)</th>
            <th rowspan="2" class="fit-content">Total Biaya</th>
        </tr>
        <tr>
            <th class="fit-content">Angka</th>
            <th class="fit-content">Satuan</th>
            <th class="fit-content">Bahan</th>
            <th class="fit-content">Upah</th>
            <th class="fit-content">Alat</th>
            <th class="fit-content">Pekerjaan</th>
            <th class="fit-content">Bahan</th>
            <th class="fit-content">Upah</th>
            <th class="fit-content">Alat</th>
        </tr>
        <tr>
        <tr>
            <th class="fit-content">a</th>
            <th class="fit-content">b</th>
            <th class="fit-content">c</th>
            <th class="fit-content">d</th>
            <th class="fit-content">e</th>
            <th class="fit-content">f</th>
            <th class="fit-content">g</th>
            <th class="fit-content">h = e+f+g</th>
            <th class="fit-content">i</th>
            <th class="fit-content">j</th>
            <th class="fit-content">k</th>
            <th class="fit-content">l = i+j+k</th>
        </tr>
        </tr>
    </thead>
    <tbody id="rincian-tbody">
        <!-- Data akan dimuat di sini -->
    </tbody>
    <tfoot>
    <tr>
        <th colspan="8" class="right-aligned">TOTAL:</th>
        <td><input type="text" id="totalHargaBahan" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalHargaUpah" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalHargaAlat" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalBiaya" readonly class="formatted" value="Rp 0,00"></td>
    </tr>
    <tr>
        <th colspan="8" class="right-aligned">PPN 11%:</th>
        <td><input type="text" id="totalHargaPpnBahan" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalHargaPpnUpah" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalHargaPpnAlat" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalBiayaPpn" readonly class="formatted" value="Rp 0,00"></td>
    </tr>
    <tr>
        <th colspan="8" class="right-aligned">Total Keseluruhan:</th>
        <td><input type="text" id="totalHargaKeseluruhanBahan" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalHargaKeseluruhanUpah" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalHargaKeseluruhanAlat" readonly class="formatted" value="Rp 0,00"></td>
        <td><input type="text" id="totalBiayaKeseluruhan" readonly class="formatted" value="Rp 0,00"></td>
    </tr>
    <tr>
        <th colspan="11" class="right-aligned">Dibulatkan:</th>
        <td><input type="text" id="totalBiayaDibulatkan" readonly class="formatted" value="Rp 0,00"></td>
    </tr>
    </tfoot>
</table>
    <div class="text-right">
        <p id="tanggalSekarang"></p>
    </div>
    <div class="text-right">
        <p>Disetujui oleh:</p>
    </div>
    <div class="text-right">
        <p>Divisi Distribusi dan Perencanaan Teknik</p>
    </div>
    </div>
    <button id="addRow" type="button" class="btn btn-primary">Tambah Baris</button>
    <a href="export-pdf" class="btn btn-primary mt-4">Print</a>

<script>
    $(document).ready(function () {
    $('#pekerjaan_id').on('change', function () {
        const pekerjaanId = $(this).val();

        if (pekerjaanId) {
            $.ajax({
                url: `/pekerjaan/${pekerjaanId}`, // Gunakan route di backend jika tersedia
                method: 'GET',
                success: function (response) {
                    if (response && response.pekerjaan && response.rincian) {
                        $('#detail-nama').text(response.pekerjaan.nama_pekerjaan);
                        $('#detail-lokasi').text(response.pekerjaan.lokasi);
                        $('#detail-nomor').text(response.pekerjaan.nomor_pekerjaan);

                        const rincianBody = $('#rincian-tbody');
                        rincianBody.empty();

                        response.rincian.forEach(function (rincian) {
                            rincianBody.append(`
                                <tr>
                                    <td>${rincian.nomor_urut}</td>
                                    <td>${rincian.uraian_pekerjaan}</td>
                                    <td>${rincian.volume_angka}</td>
                                    <td>${rincian.volume_satuan}</td>
                                    <td class="formatted">${formatRupiah(rincian.biaya_satuan_bahan)}</td>
                                    <td class="formatted">${formatRupiah(rincian.biaya_satuan_upah)}</td>
                                    <td class="formatted">${formatRupiah(rincian.biaya_satuan_alat)}</td>
                                    <td class="formatted">${formatRupiah(rincian.biaya_pekerjaan)}</td>
                                    <td><input type="text" name="bl_bahan" value="${rincian.biaya_langsung_bahan}" class="bl_bahan"></td>
                                    <td><input type="text" name="bl_upah" value="${rincian.biaya_langsung_upah}" class="bl_upah"></td>
                                    <td><input type="text" name="bl_alat" value="${rincian.biaya_langsung_alat}" class="bl_alat"></td>
                                    <td><input type="text" name="jumlah" value="${rincian.jumlah_total}" class="jumlah"></td>
                                </tr>
                            `);
                        });

                        $('#pekerjaan-detail').removeClass('hidden');
                        $('#error-message').addClass('hidden');

                        updateCalculations();
                    } else {
                        $('#error-message').text('Data tidak valid. Silakan coba lagi.').removeClass('hidden');
                        $('#pekerjaan-detail').addClass('hidden');
                    }
                },
                error: function () {
                    $('#error-message').text('Gagal mengambil data pekerjaan. Pastikan server berjalan.').removeClass('hidden');
                    $('#pekerjaan-detail').addClass('hidden');
                }
            });
        } else {
            $('#pekerjaan-detail').addClass('hidden');
            $('#error-message').addClass('hidden');
        }
    });
});

function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2
    }).format(angka);
}

function updateCalculations() {
    let sumBahan = 0;
    let sumUpah = 0;
    let sumAlat = 0;
    let sumJumlah = 0;

    $('#rincian-tbody tr').each(function () {
        const blBahan = parseFloat($(this).find('.bl_bahan').val()) || 0;
        const blUpah = parseFloat($(this).find('.bl_upah').val()) || 0;
        const blAlat = parseFloat($(this).find('.bl_alat').val()) || 0;
        const jumlah = parseFloat($(this).find('.jumlah').val()) || 0;

        sumBahan += blBahan;
        sumUpah += blUpah;
        sumAlat += blAlat;
        sumJumlah += jumlah;
    });

    $('#totalHargaBahan').val(formatRupiah(sumBahan));
    $('#totalHargaUpah').val(formatRupiah(sumUpah));
    $('#totalHargaAlat').val(formatRupiah(sumAlat));
    $('#totalBiaya').val(formatRupiah(sumJumlah));

    calculatePpn();
    calculateTotalKeseluruhan();
    calculateDibulatkan();
}

function calculatePpn() {
    let ppnBahan = parseFloat($('#totalHargaBahan').val().replace(/[^0-9,-]+/g, "")) * 0.11;
    let ppnUpah = parseFloat($('#totalHargaUpah').val().replace(/[^0-9,-]+/g, "")) * 0.11;
    let ppnAlat = parseFloat($('#totalHargaAlat').val().replace(/[^0-9,-]+/g, "")) * 0.11;
    let ppnBiaya = parseFloat($('#totalBiaya').val().replace(/[^0-9,-]+/g, "")) * 0.11;

    $('#totalHargaPpnBahan').val(formatRupiah(ppnBahan));
    $('#totalHargaPpnUpah').val(formatRupiah(ppnUpah));
    $('#totalHargaPpnAlat').val(formatRupiah(ppnAlat));
    $('#totalBiayaPpn').val(formatRupiah(ppnBiaya));
}

function calculateTotalKeseluruhan() {
    let totalBahan = parseFloat($('#totalHargaBahan').val().replace(/[^0-9,-]+/g, "")) + parseFloat($('#totalHargaPpnBahan').val().replace(/[^0-9,-]+/g, ""));
    let totalUpah = parseFloat($('#totalHargaUpah').val().replace(/[^0-9,-]+/g, "")) + parseFloat($('#totalHargaPpnUpah').val().replace(/[^0-9,-]+/g, ""));
    let totalAlat = parseFloat($('#totalHargaAlat').val().replace(/[^0-9,-]+/g, "")) + parseFloat($('#totalHargaPpnAlat').val().replace(/[^0-9,-]+/g, ""));
    let totalBiaya = parseFloat($('#totalBiaya').val().replace(/[^0-9,-]+/g, "")) + parseFloat($('#totalBiayaPpn').val().replace(/[^0-9,-]+/g, ""));

    $('#totalHargaKeseluruhanBahan').val(formatRupiah(totalBahan));
    $('#totalHargaKeseluruhanUpah').val(formatRupiah(totalUpah));
    $('#totalHargaKeseluruhanAlat').val(formatRupiah(totalAlat));
    $('#totalBiayaKeseluruhan').val(formatRupiah(totalBiaya));
}

function calculateDibulatkan() {
    let dibulatkan = Math.round(parseFloat($('#totalBiayaKeseluruhan').val().replace(/[^0-9,-]+/g, "")));

    $('#totalBiayaDibulatkan').val(formatRupiah(dibulatkan));
}
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pekerjaanDropdown = document.getElementById("pekerjaan_id");
        const pekerjaanDetail = document.getElementById("pekerjaan-detail");
        const detailNama = document.getElementById("detail-nama");
        const detailLokasi = document.getElementById("detail-lokasi");
        const detailNomor = document.getElementById("detail-nomor");

        pekerjaanDropdown.addEventListener("change", function () {
            let selectedOption = this.options[this.selectedIndex];

            if (selectedOption.value) {
                // Jika memilih pekerjaan dari dropdown, tampilkan detail
                detailNama.textContent = selectedOption.getAttribute("data-nama");
                detailLokasi.textContent = selectedOption.getAttribute("data-lokasi");
                detailNomor.textContent = selectedOption.getAttribute("data-nomor");

                pekerjaanDetail.style.display = "block";
            } else {
                // Jika tidak memilih pekerjaan, sembunyikan detail
                pekerjaanDetail.style.display = "none";
            }
        });
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var tanggalDiv = document.getElementById('tanggalSekarang');
    var now = new Date();

    var tanggal = now.getDate(); // Mendapatkan tanggal (1-31)
    var monthNames = [
        "Januari", "Februari", "Maret",
        "April", "Mei", "Juni", "Juli",
        "Agustus", "September", "Oktober",
        "November", "Desember"
    ];
    var month = monthNames[now.getMonth()]; // Mendapatkan nama bulan
    var year = now.getFullYear(); // Mendapatkan tahun

    // Membuat format tanggal yang diinginkan
    var formattedDate = tanggal + " " + month + " " + year;

    // Memasukkan teks ke dalam elemen HTML dengan id 'tanggalSekarang'
    tanggalDiv.textContent = "Cilegon, " + formattedDate;
    });
    </script>

</body>
</html>
