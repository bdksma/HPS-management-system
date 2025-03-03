<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Data Dokumen HPS</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="front/css/breadcrumbs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Mengatur font family untuk keseluruhan dokumen */
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        /* Mengatur tabel */
        tr:nth-child(even) {
            background-color: #dddddd;
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
            table-layout: auto;
        }

        th{
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
        }

        td{
        text-align: left;
        }

        .right-aligned {
        text-align: right;
        padding-right: 10px; /* Menambahkan sedikit padding kanan untuk ruang ekstra */
        }

        .left-aligned {
        text-align: right;
        padding-right: 10px; /* Menambahkan sedikit padding kanan untuk ruang ekstra */
        }

        .fit-content {
        white-space: nowrap;
        min-width: 40px; /* Example minimum width */
        max-width: 200px; /* Example maximum width */
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
        }
        .rp-dropdown {
            width: 100%;
            box-sizing: border-box;
        }

        .text-center {
        text-align: center; /* Mengatur teks ke tengah */
        }

        .text-right {
        text-align: right; /* Mengatur teks ke kanan */
        }

        table {
        width: 100%;
        border-collapse: collapse;
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
    
    <h2>HARGA PERKIRAAN SENDIRI</h2>
    <select id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control work-dropdown select2">
    <option value="">Pilih Jenis Pekerjaan</option>
    @foreach ($pekerjaans as $pekerjaan)
    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama_pekerjaan }}</option>
    @endforeach
    <option value="lainnya">Pekerjaan Baru</option>
    </select>

    <div id="manual-input-container" style="display: none;">
        <input type="text" id="manual-jenis-pekerjaan" name="manual_jenis_pekerjaan" class="form-control" placeholder="Masukkan Jenis Pekerjaan">
    </div>

    <div class="center">
        <input type="text" id="manual-lokasi" name="lokasi" class="form-control" placeholder="Lokasi" readonly>
    </div>
    <div>
        <input type="text" id="manual-nomor-pekerjaan" name="nomor_pekerjaan" class="form-control" placeholder="Nomor Pekerjaan" readonly>
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
            <th rowspan="2" class="fit-content">Jumlah</th>
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
    </thead>
    <tbody id="HpsTable">
        <tr>
            <td class="left-aligned"><input type="number" name="nomor" class="form-control" placeholder="No" style="width: 60px;"></td>
            <td style="width: 400px; word-wrap: break-word; white-space: normal;" >
                <select name="scope_pekerjaan" class="form-control rp-dropdown">
                    <option value="">Masukan Scope Pekerjaan</option>
                    @foreach ($rincianpekerjaans as $rincianpekerjaan)
                    <option value="{{ $rincianpekerjaan->id }}">{{ $rincianpekerjaan->scope_pekerjaan }}</option>
                    @endforeach
                    <option value="lainnya">Rincian Pekerjaan Baru</option>
                </select>
            </td>
            <td><input type="number" name="angka" class="form-control" placeholder="Angka" style="width: 60px;"></td>
            <td><input type="text" name="satuan" class="form-control" placeholder="Satuan" style="width: 70px;"></td>
            <td><input type="text" id="total_harga_bahan" name="total_harga_bahan" class="form-control" readonly></td>
            <td><input type="text" id="total_harga_upah" name="total_harga_upah" class="form-control" readonly></td>
            <td><input type="text" id="total_harga_alat" name="total_harga_alat" class="form-control" readonly></td>
            <td><input type="number" id="pekerjaan" name="total_pekerjaan" class="form-control"></td>
            <td><input type="number" id="bl_bahan" name="bl_bahan" class="form-control"></td>
            <td><input type="number" id="bl_upah" name="bl_upah" class="form-control"></td>
            <td><input type="number" id="bl_alat" name="bl_alat" class="form-control"></td>
            <td><input type="number" id="jumlah" name="jumlah" class="form-control"></td>
        </tr>
    </tbody>
        <tfoot>
            <tr>
                <th colspan="8" class="right-aligned">TOTAL:</th>
                <td><input type="text" id="totalHargaBahan" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalHargaUpah" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalHargaAlat" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalBiaya" readonly value="Rp 0,00"></td>
            </tr>
            <tr>
                <th colspan="8" class="right-aligned">PPN 11%:</th>
                <td><input type="text" id="totalHargaPpnBahan" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalHargaPpnUpah" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalHargaPpnAlat" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalBiayaPpn" readonly value="Rp 0,00"></td>
            </tr>
            <tr>
                <th colspan="8" class="right-aligned">Total Keseluruhan:</th>
                <td><input type="text" id="totalHargaKeseluruhanBahan" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalHargaKeseluruhanUpah" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalHargaKeseluruhanAlat" readonly value="Rp 0,00"></td>
                <td><input type="text" id="totalBiayaKeseluruhan" readonly value="Rp 0,00"></td>
            </tr>
            <tr>
                <th colspan="11" class="right-aligned">Dibulatkan:</th>
                <td><input type="text" id="totalBiayaDibulatkan" readonly value="Rp 0,00"></td>
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
    $(document).ready(function() {
    // Inisialisasi Select2 pada dropdown
    $('.select2').select2();

    // Event handler untuk perubahan pada dropdown
    $(document).on('change', '.work-dropdown', function() {
        var pekerjaanId = $(this).val();

        if (pekerjaanId && pekerjaanId !== 'lainnya') {
            $.ajax({
                type: 'GET',
                url: '/pekerjaans/' + pekerjaanId,
                success: function(data) {
                    $('input[name="lokasi"]').val(data.lokasi);
                    $('input[name="nomor_pekerjaan"]').val(data.nomor_pekerjaan);
                }
            });
        } else {
            $('input[name="lokasi"]').val('');
            $('input[name="nomor_pekerjaan"]').val('');
        }
    });

    // Event handler untuk mengaktifkan input manual
    $('#jenis_pekerjaan').on('change', function() {
        var manualInputContainer = $('#manual-input-container');
        var manualInputJP = $('#manual-jenis-pekerjaan');
        var manualInputL = $('#manual-lokasi');
        var manualInputNP = $('#manual-nomor-pekerjaan');

        if ($(this).val() === 'lainnya') {
            manualInputContainer.show();
            manualInputJP.prop('readonly', false); // Menghilangkan atribut readonly
            manualInputL.prop('readonly', false); // Menghilangkan atribut readonly
            manualInputNP.prop('readonly', false); // Menghilangkan atribut readonly
        } else {
            manualInputContainer.hide();
            manualInputJP.val(''); // Mengosongkan nilai input manual
            manualInputJP.prop('readonly', true); // Menambahkan atribut readonly kembali
            manualInputL.val(''); // Mengosongkan nilai input manual
            manualInputL.prop('readonly', true); // Menambahkan atribut readonly kembali
            manualInputNP.val(''); // Mengosongkan nilai input manual
            manualInputNP.prop('readonly', true); // Menambahkan atribut readonly kembali
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to calculate totals
    function calculateTotal(selector) {
        let total = 0;
        document.querySelectorAll(selector).forEach(function(element) {
            let value = parseFloat(element.value);
            if (!isNaN(value)) {
                total += value;
            }
        });
        return total.toFixed(2);
    }

    // Function to update all totals
    function updateTotals() {
        document.getElementById('totalHargaBahan').textContent = calculateTotal('.bl_bahan');
        document.getElementById('totalHargaUpah').textContent = calculateTotal('.bl_upah');
        document.getElementById('totalHargaAlat').textContent = calculateTotal('.bl_alat');
        document.getElementById('totalBiaya').textContent = calculateTotal('.jumlah');
        calculatePpn();
        calculateTotalKeseluruhan();
        calculateDibulatkan();
    }

    // Initial call to update totals in case there are default values
    updateTotals();

    // Add input event listener to HpsTable to update totals
    document.getElementById('HpsTable').addEventListener('input', updateTotals);
});

$(document).ready(function() {
    function calculateTotal(row) {
        var angka = parseFloat(row.find('input[name="angka"]').val()) || 0;
        var totalHargaBahan = parseFloat(row.find('input[name="total_harga_bahan"]').val()) || 0;
        var totalHargaAlat = parseFloat(row.find('input[name="total_harga_alat"]').val()) || 0;
        var totalHargaUpah = parseFloat(row.find('input[name="total_harga_upah"]').val()) || 0;

        var hasilBahan = angka * totalHargaBahan;
        var hasilAlat = angka * totalHargaAlat;
        var hasilUpah = angka * totalHargaUpah;

        row.find('input[name="bl_bahan"]').val(hasilBahan.toFixed(2));
        row.find('input[name="bl_alat"]').val(hasilAlat.toFixed(2));
        row.find('input[name="bl_upah"]').val(hasilUpah.toFixed(2));

        var totalPekerjaan = totalHargaBahan + totalHargaAlat + totalHargaUpah;
        var jumlah = hasilBahan + hasilAlat + hasilUpah;

        row.find('input[name="total_pekerjaan"]').val(totalPekerjaan.toFixed(2));
        row.find('input[name="jumlah"]').val(jumlah.toFixed(2));
    }

    $(document).ready(function() {
        $('.rp-dropdown').select2({
            placeholder: "Scope Pekerjaan",
            allowClear: true
        });

        function formatRupiah(angka) {
            var number_string = angka.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return 'Rp. ' + rupiah + ',00';
        }

        function applyRupiahFormat() {
            // Ambil elemen dengan id total_harga_bahan
            var totalHargaElem = document.getElementById('total_harga_bahan');
            
            // Ambil nilai dari elemen tersebut
            var angka = totalHargaElem.textContent || totalHargaElem.innerText;
            
            // Ubah menjadi angka tanpa tanda baca
            angka = angka.replace(/\D/g, '');

            // Format nilai ke dalam format Rupiah
            var formattedRupiah = formatRupiah(angka);
            
            // Tampilkan kembali hasil formatnya ke elemen tersebut
            totalHargaElem.textContent = formattedRupiah;
        }

        // Panggil fungsi applyRupiahFormat untuk menerapkan format
        applyRupiahFormat();

        // Script AJAX tetap sama
        $(document).on('change', '.rp-dropdown', function() {
            var rincianPekerjaanId = $(this).val();
            var $row = $(this).closest('tr');

            if (rincianPekerjaanId) {
                $.ajax({
                    url: '/rincianpekerjaans/' + rincianPekerjaanId,
                    method: 'GET',
                    success: function(data) {
                        $row.find('input[name="total_harga_bahan"]').val(data.total_harga_bahan);
                        $row.find('input[name="total_harga_alat"]').val(data.total_harga_alat);
                        $row.find('input[name="total_harga_upah"]').val(data.total_harga_upah);
                        calculateTotal($row);
                        updateTotals();
                    }
                });
            } else {
                $row.find('input[name="total_harga_bahan"]').val('');
                $row.find('input[name="total_harga_alat"]').val('');
                $row.find('input[name="total_harga_upah"]').val('');
                calculateTotal($row);
                updateTotals();
            }
        });
    });

    $(document).on('input', 'input[name="angka"], input[name="total_harga_bahan"], input[name="total_harga_alat"], input[name="total_harga_upah"], input[name="bl_bahan"], input[name="bl_alat"], input[name="bl_upah"]', function() {
        var $row = $(this).closest('tr');
        calculateTotal($row);
        updateTotals();
    });

    $('#addRow').on('click', function() {
        $('#HpsTable').append(`
            <tr>
                <td>
                    <input type="number" name="nomor" class="form-control" placeholder="No" style="width: 60px;">
                </td>
                <td>
                    <select name="scope_pekerjaan" class="form-control rp-dropdown">
                        <option value="">Masukan Scope Pekerjaan</option>
                        @foreach ($rincianpekerjaans as $rincianpekerjaan)
                            <option value="{{ $rincianpekerjaan->id }}">{{ $rincianpekerjaan->scope_pekerjaan }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="angka" class="form-control" placeholder="Angka" style="width: 60px;">
                </td>
                <td>
                    <input type="text" name="satuan" class="form-control" placeholder="Satuan" style="width: 70px;">
                </td>
                <td>
                    <input type="number" name="total_harga_bahan" class="form-control" placeholder=" " readonly step="0.01">
                </td>
                <td>
                    <input type="number" name="total_harga_upah" class="form-control" placeholder=" " readonly step="0.01">
                </td>
                <td>
                    <input type="number" name="total_harga_alat" class="form-control" placeholder=" " readonly step="0.01">
                </td>
                <td>
                    <input type="number" name="total_pekerjaan" class="form-control" placeholder=" ">
                </td>
                <td>
                    <input type="number" name="bl_bahan" class="form-control" placeholder=" ">
                </td>
                <td>
                    <input type="number" name="bl_upah" class="form-control" placeholder=" ">
                </td>
                <td>
                    <input type="number" name="bl_alat" class="form-control" placeholder=" ">
                </td>
                <td>
                    <input type="number" name="jumlah" class="form-control" placeholder=" ">
                </td>
            </tr>
        `);

        $('.rp-dropdown').select2({
            placeholder: "Scope Pekerjaan",
            allowClear: true
        });

        // Add input event listener to new row to update totals
        $('#HpsTable tbody tr:last input').on('input', function() {
            var $row = $(this).closest('tr');
            calculateTotal($row);
            updateTotals();
        });
    });
});

// Additional script for further calculations
const HpsTable = document.getElementById('HpsTable');
const totalHargaBahan = document.getElementById('totalHargaBahan');
const totalHargaUpah = document.getElementById('totalHargaUpah');
const totalHargaAlat = document.getElementById('totalHargaAlat');
const totalBiaya = document.getElementById('totalBiaya');
const totalHargaPpnBahan = document.getElementById('totalHargaPpnBahan');
const totalHargaPpnUpah = document.getElementById('totalHargaPpnUpah');
const totalHargaPpnAlat = document.getElementById('totalHargaPpnAlat');
const totalBiayaPpn = document.getElementById('totalBiayaPpn');
const totalHargaKeseluruhanBahan = document.getElementById('totalHargaKeseluruhanBahan');
const totalHargaKeseluruhanUpah = document.getElementById('totalHargaKeseluruhanUpah');
const totalHargaKeseluruhanAlat = document.getElementById('totalHargaKeseluruhanAlat');
const totalBiayaKeseluruhan = document.getElementById('totalBiayaKeseluruhan');
const totalBiayaDibulatkan = document.getElementById('totalBiayaDibulatkan');

function calculateTotal() {
    let sumBahan = 0;
    let sumUpah = 0;
    let sumAlat = 0;
    let sumJumlah = 0;

    const rows = HpsTable.querySelectorAll('tr');
    rows.forEach(row => {
        const blBahan = row.querySelector('input[name="bl_bahan"]');
        const blUpah = row.querySelector('input[name="bl_upah"]');
        const blAlat = row.querySelector('input[name="bl_alat"]');
        const jumlah = row.querySelector('input[name="jumlah"]');

        if (blBahan && blBahan.value) {
            sumBahan += parseFloat(blBahan.value);
        }
        if (blUpah && blUpah.value) {
            sumUpah += parseFloat(blUpah.value);
        }
        if (blAlat && blAlat.value) {
            sumAlat += parseFloat(blAlat.value);
        }
        if (jumlah && jumlah.value) {
            sumJumlah += parseFloat(jumlah.value);
        }
    });

    totalHargaBahan.value = sumBahan.toFixed(2);
    totalHargaUpah.value = sumUpah.toFixed(2);
    totalHargaAlat.value = sumAlat.toFixed(2);
    totalBiaya.value = sumJumlah.toFixed(2);
}

function calculatePpn() {
    totalHargaPpnBahan.value = (parseFloat(totalHargaBahan.value) * 0.11).toFixed(2);
    totalHargaPpnUpah.value = (parseFloat(totalHargaUpah.value) * 0.11).toFixed(2);
    totalHargaPpnAlat.value = (parseFloat(totalHargaAlat.value) * 0.11).toFixed(2);
    totalBiayaPpn.value = (parseFloat(totalBiaya.value) * 0.11).toFixed(2);
}

function calculateTotalKeseluruhan() {
    totalHargaKeseluruhanBahan.value = (parseFloat(totalHargaBahan.value) + parseFloat(totalHargaPpnBahan.value)).toFixed(2);
    totalHargaKeseluruhanUpah.value = (parseFloat(totalHargaUpah.value) + parseFloat(totalHargaPpnUpah.value)).toFixed(2);
    totalHargaKeseluruhanAlat.value = (parseFloat(totalHargaAlat.value) + parseFloat(totalHargaPpnAlat.value)).toFixed(2);
    totalBiayaKeseluruhan.value = (parseFloat(totalBiaya.value) + parseFloat(totalBiayaPpn.value)).toFixed(2);
}

function calculateDibulatkan() {
    totalBiayaDibulatkan.value = Math.round(parseFloat(totalBiayaKeseluruhan.value)).toFixed(2);
}

HpsTable.addEventListener('input', () => {
    calculateTotal();
    calculatePpn();
    calculateTotalKeseluruhan();
    calculateDibulatkan();
});
</script>

</body>
</html>
