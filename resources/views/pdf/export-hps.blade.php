<!DOCTYPE html>
<html>
<title>CREATE HPS</title>
<head>
<style>
  /* Mengatur ukuran kertas A4 */
  @media print {
  @page {
    size: A4 landscape;
    margin: 1cm;
  }

  h1 {
    font-family: "Times New Roman", Times, serif;
    font-size: 10px;
  }

  body, p, div, span, table, th, td {
    font-family: "Times New Roman", Times, serif;
    font-size: 8px;
  }
}


  /* Mengatur font family untuk keseluruhan dokumen */
  body {
    font-family: "Times New Roman", serif;
  }

  /* Mengatur tabel */
  table {
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

  h2 {
    text-align: center;
  }

  .center {
    text-align: center;
  }

  h2 {
    font-weight: bold;
    line-height: 0.75;
    text-decoration: underline;
    font-size: 14pt;
  }
  h4 {
    font-size: 12pt;
    line-height: 1.15;
  }
</style>
</head>
<body>

<h2>HARGA PERKIRAAN SENDIRI</h2>
<div class="center">
  <h4>Pekerjaan : <span id="pekerjaan">Nama Pekerjaan</span></h4>
</div>
<div class="center">
  <h4>Lokasi : <span id="lokasi">Nama Pekerjaan</span></h4>
</div>
<div>
  <h4>Nomor Pekerjaan : <span id="nomor_pekerjaan">Nomor Pekerjaan</span> </h4>
</div>
<div>
  <table>
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Uraian Pekerjaan</th>
        <th colspan="2">Volume</th>
        <th colspan="4">Biaya Satuan (Rp)</th>
        <th colspan="3">Biaya Langsung (Rp)</th>
        <th rowspan="2">Jumlah</th>
      </tr>
      <tr>
        <th>Angka</th>
        <th>Satuan</th>
        <th>Bahan</th>
        <th>Upah</th>
        <th>Alat</th>
        <th>Pekerjaan</th>
        <th>Bahan</th>
        <th>Upah</th>
        <th>Alat</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>

        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
        <td>
          
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="8" id="totalHargaLabel">TOTAL : </th>
        <th id="totalHargaBahan">0</th>
        <th id="totalHargaAlat">0</th>
        <th id="totalHargaUpah">0</th>
        <th id="totalBiaya">0</th>
      </tr>
      <tr>
      <th colspan="8" id="totalHargaPpn">PPN 11% : </th>
        <th id="totalHargaPpnBahan">0</th>
        <th id="totalHargaPpnAlat">0</th>
        <th id="totalHargaPpnUpah">0</th>
        <th id="totalBiayaPpn">0</th>
      </tr>
      <tr>
      <th colspan="8" id="totalKeseluruhan">Total Keseluruhan : </th>
        <th id="totalHargaKeseluruhanBahan">0</th>
        <th id="totalHargaKeseluruhanAlat">0</th>
        <th id="totalHargaKeseluruhanUpah">0</th>
        <th id="totalBiayaKeseluruhan">0</th>
      </tr>
      <tr>
      <th colspan="8" id="dibulatkan">Dibulatkan : </th>
        <th id="totalHargaDibulatkanBahan">0</th>
        <th id="totalHargaDibulatkanAlat">0</th>
        <th id="totalHargaDibulatkanUpah">0</th>
        <th id="totalBiayaDibulatkan">0</th>
      </tr>
    </tfoot>
  </table>

  <div>
    <p>Cilegon, (month) (year)</p>
  </div>
  <div>
    <p>Disetujui oleh:</p>
  </div>
  <div>
    <p>Divisi Distribusi dan Perencanaan Teknik</p>
  </div>
</div>
<a href="export-pdf">print</a>
<script>
  document.getElementById("pekerjaan").innerHTML = "Nama Pekerjaan";
  document.getElementById("lokasi").innerHTML = "Nama Lokasi";
  document.getElementById("nomor_pekerjaan").innerHTML = "Nomor Pekerjaan";
</script>
</body>
</html>