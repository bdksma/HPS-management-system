/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/hps/form.js ***!
  \**********************************/
$(document).ready(function () {
  // Inisialisasi Select2 pada dropdown
  $('.select2').select2();

  // Event handler untuk perubahan pada dropdown
  $(document).on('change', '.work-dropdown', function () {
    var pekerjaanId = $(this).val();
    if (pekerjaanId && pekerjaanId !== 'lainnya') {
      $.ajax({
        type: 'GET',
        url: '/pekerjaans/' + pekerjaanId,
        success: function success(data) {
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
  $('#jenis_pekerjaan').on('change', function () {
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
document.addEventListener('DOMContentLoaded', function () {
  var tanggalDiv = document.getElementById('tanggalSekarang');
  var now = new Date();
  var tanggal = now.getDate(); // Mendapatkan tanggal (1-31)
  var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  var month = monthNames[now.getMonth()]; // Mendapatkan nama bulan
  var year = now.getFullYear(); // Mendapatkan tahun

  // Membuat format tanggal yang diinginkan
  var formattedDate = tanggal + " " + month + " " + year;

  // Memasukkan teks ke dalam elemen HTML dengan id 'tanggalSekarang'
  tanggalDiv.textContent = "Cilegon, " + formattedDate;
});
document.addEventListener('DOMContentLoaded', function () {
  // Function to calculate totals
  function calculateTotal(selector) {
    var total = 0;
    document.querySelectorAll(selector).forEach(function (element) {
      var value = parseFloat(element.value);
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
$(document).ready(function () {
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
  $(document).ready(function () {
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
    $(document).on('change', '.rp-dropdown', function () {
      var rincianPekerjaanId = $(this).val();
      var $row = $(this).closest('tr');
      if (rincianPekerjaanId) {
        $.ajax({
          url: '/rincianpekerjaans/' + rincianPekerjaanId,
          method: 'GET',
          success: function success(data) {
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
  $(document).on('input', 'input[name="angka"], input[name="total_harga_bahan"], input[name="total_harga_alat"], input[name="total_harga_upah"], input[name="bl_bahan"], input[name="bl_alat"], input[name="bl_upah"]', function () {
    var $row = $(this).closest('tr');
    calculateTotal($row);
    updateTotals();
  });
  $('#addRow').on('click', function () {
    $('#HpsTable').append("\n            <tr>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"nomor\" class=\"form-control\" placeholder=\"No\" style=\"width: 60px;\">\n                </td>\n                <td>\n                    <select name=\"scope_pekerjaan\" class=\"form-control rp-dropdown\">\n                        <option value=\"\">Masukan Scope Pekerjaan</option>\n                        @foreach ($rincianpekerjaans as $rincianpekerjaan)\n                            <option value=\"{{ $rincianpekerjaan->id }}\">{{ $rincianpekerjaan->scope_pekerjaan }}</option>\n                        @endforeach\n                    </select>\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"angka\" class=\"form-control\" placeholder=\"Angka\" style=\"width: 60px;\">\n                </td>\n                <td>\n                    <input type=\"text\" name=\"satuan\" class=\"form-control\" placeholder=\"Satuan\" style=\"width: 70px;\">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"total_harga_bahan\" class=\"form-control\" placeholder=\" \" readonly step=\"0.01\">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"total_harga_upah\" class=\"form-control\" placeholder=\" \" readonly step=\"0.01\">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"total_harga_alat\" class=\"form-control\" placeholder=\" \" readonly step=\"0.01\">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"total_pekerjaan\" class=\"form-control\" placeholder=\" \">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"bl_bahan\" class=\"form-control\" placeholder=\" \">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"bl_upah\" class=\"form-control\" placeholder=\" \">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"bl_alat\" class=\"form-control\" placeholder=\" \">\n                </td>\n                <td>\n                    <input type=\"text\" inputmode=\"numeric\" name=\"jumlah\" class=\"form-control\" placeholder=\" \">\n                </td>\n            </tr>\n        ");
    $('.rp-dropdown').select2({
      placeholder: "Scope Pekerjaan",
      allowClear: true
    });

    // Add input event listener to new row to update totals
    $('#HpsTable tbody tr:last input').on('input', function () {
      var $row = $(this).closest('tr');
      calculateTotal($row);
      updateTotals();
    });
  });
});

// Additional script for further calculations
var HpsTable = document.getElementById('HpsTable');
var totalHargaBahan = document.getElementById('totalHargaBahan');
var totalHargaUpah = document.getElementById('totalHargaUpah');
var totalHargaAlat = document.getElementById('totalHargaAlat');
var totalBiaya = document.getElementById('totalBiaya');
var totalHargaPpnBahan = document.getElementById('totalHargaPpnBahan');
var totalHargaPpnUpah = document.getElementById('totalHargaPpnUpah');
var totalHargaPpnAlat = document.getElementById('totalHargaPpnAlat');
var totalBiayaPpn = document.getElementById('totalBiayaPpn');
var totalHargaKeseluruhanBahan = document.getElementById('totalHargaKeseluruhanBahan');
var totalHargaKeseluruhanUpah = document.getElementById('totalHargaKeseluruhanUpah');
var totalHargaKeseluruhanAlat = document.getElementById('totalHargaKeseluruhanAlat');
var totalBiayaKeseluruhan = document.getElementById('totalBiayaKeseluruhan');
var totalBiayaDibulatkan = document.getElementById('totalBiayaDibulatkan');
function calculateTotal() {
  var sumBahan = 0;
  var sumUpah = 0;
  var sumAlat = 0;
  var sumJumlah = 0;
  var rows = HpsTable.querySelectorAll('tr');
  rows.forEach(function (row) {
    var blBahan = row.querySelector('input[name="bl_bahan"]');
    var blUpah = row.querySelector('input[name="bl_upah"]');
    var blAlat = row.querySelector('input[name="bl_alat"]');
    var jumlah = row.querySelector('input[name="jumlah"]');
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
HpsTable.addEventListener('input', function () {
  calculateTotal();
  calculatePpn();
  calculateTotalKeseluruhan();
  calculateDibulatkan();
});
/******/ })()
;