<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: lightgray;
        }
        .card {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                                    <option value="" disabled selected>Pilih Kategori Material</option>
                                    <option value="MATERIAL ALAM" {{ old('kategori') == 'Kategori 1' ? 'selected' : '' }}>MATERIAL ALAM</option>
                                    <option value="MATERIAL ALUMINIUM" {{ old('kategori') == 'Kategori 2' ? 'selected' : '' }}>MATERIAL ALUMINIUM</option>
                                    <option value="MATERIAL ATAP" {{ old('kategori') == 'Kategori 3' ? 'selected' : '' }}>MATERIAL ATAP</option>
                                    <option value="MATERIAL PAKU, DYNABOLT, BAUT, DLL" {{ old('kategori') == 'Kategori 4' ? 'selected' : '' }}>MATERIAL PAKU, DYNABOLT, BAUT, DLL</option>
                                    <option value="MATERIAL ATK" {{ old('kategori') == 'Kategori 5' ? 'selected' : '' }}>MATERIAL ATK</option>
                                    <option value="MATERIAL BESI/BAJA" {{ old('kategori') == 'Kategori 6' ? 'selected' : '' }}>MATERIAL BESI/BAJA</option>
                                    <option value="MATERIAL BETON" {{ old('kategori') == 'Kategori 7' ? 'selected' : '' }}>MATERIAL BETON</option>
                                    <option value="MATERIAL CAT" {{ old('kategori') == 'Kategori 8' ? 'selected' : '' }}>MATERIAL CAT</option>
                                    <option value="MATERIAL CHEMICAL" {{ old('kategori') == 'Kategori 9' ? 'selected' : '' }}>MATERIAL CHEMICAL</option>
                                    <option value="MATERIAL ELECTRICAL / ELEKTRO GROUP" {{ old('kategori') == 'Kategori 10' ? 'selected' : '' }}>MATERIAL ELECTRICAL / ELEKTRO GROUP</option>
                                    <option value="MATERIAL FURNITURE" {{ old('kategori') == 'Kategori 11' ? 'selected' : '' }}>MATERIAL FURNITURE</option>
                                    <option value="MATERIAL INFORMATION TECHNOLOGY" {{ old('kategori') == 'Kategori 12' ? 'selected' : '' }}>MATERIAL INFORMATION TECHNOLOGY</option>
                                    <option value="MATERIAL INSTRUMENTASI" {{ old('kategori') == 'Kategori 13' ? 'selected' : '' }}>MATERIAL INSTRUMENTASI</option>
                                    <option value="MATERIAL KESELAMATAN DAN KESEHATAN KERJA (K3)" {{ old('kategori') == 'Kategori 13' ? 'selected' : '' }}>MATERIAL KESELAMATAN DAN KESEHATAN KERJA (K3)</option>
                                    <option value="MATERIAL KACA" {{ old('kategori') == 'Kategori 14' ? 'selected' : '' }}>MATERIAL KACA</option>
                                    <option value="MATERIAL KATODIK PROTEKSI" {{ old('kategori') == 'Kategori 15' ? 'selected' : '' }}>MATERIAL KATODIK PROTEKSI</option>
                                    <option value="MATERIAL KAYU" {{ old('kategori') == 'Kategori 16' ? 'selected' : '' }}>MATERIAL KAYU</option>
                                    <option value="MATERIAL LABORATORIUM" {{ old('kategori') == 'Kategori 17' ? 'selected' : '' }}>MATERIAL LABORATORIUM</option>
                                    <option value="MATERIAL LAINNYA" {{ old('kategori') == 'Kategori 18' ? 'selected' : '' }}>MATERIAL LAINNYA</option>
                                    <option value="MATERIAL LANTAI & DINDING" {{ old('kategori') == 'Kategori 19' ? 'selected' : '' }}>MATERIAL LANTAI & DINDING</option>
                                    <option value="MATERIAL MEKANIK" {{ old('kategori') == 'Kategori 20' ? 'selected' : '' }}>MATERIAL MEKANIK</option>
                                    <option value="MATERIAL PAKU, DYNABOLT, BAUT, DLL" {{ old('kategori') == 'Kategori 21' ? 'selected' : '' }}>MATERIAL PAKU, DYNABOLT, BAUT, DLL</option>
                                    <option value="MATERIAL PAVING BLOCK & KANSTIN" {{ old('kategori') == 'Kategori 22' ? 'selected' : '' }}>MATERIAL PAVING BLOCK & KANSTIN</option>
                                    <option value="MATERIAL PENAMPUNG AIR & VESSEL" {{ old('kategori') == 'Kategori 23' ? 'selected' : '' }}>MATERIAL PENAMPUNG AIR & VESSEL</option>
                                    <option value="MATERIAL PENGUJIAN & LAB" {{ old('kategori') == 'Kategori 24' ? 'selected' : '' }}>MATERIAL PENGUJIAN & LAB</option>
                                    <option value="MATERIAL PENUTUP KONTRUKSI JALAN" {{ old('kategori') == 'Kategori 25' ? 'selected' : '' }}>MATERIAL PENUTUP KONTRUKSI JALAN</option>
                                    <option value="MATERIAL PERPIPAAN / FITTING & PLUMBING" {{ old('kategori') == 'Kategori 26' ? 'selected' : '' }}>MATERIAL PERPIPAAN / FITTING & PLUMBING</option>
                                    <option value="MATERIAL PINTU & JENDELA" {{ old('kategori') == 'Kategori 27' ? 'selected' : '' }}>MATERIAL PINTU & JENDELA</option>
                                    <option value="MATERIAL PIPA" {{ old('kategori') == 'Kategori 28' ? 'selected' : '' }}>MATERIAL PIPA</option>
                                    <option value="MATERIAL PLAFOND & PARTISI" {{ old('kategori') == 'Kategori 29' ? 'selected' : '' }}>MATERIAL PLAFOND & PARTISI</option>
                                    <option value="MATERIAL POLIMER & PLASTIK" {{ old('kategori') == 'Kategori 30' ? 'selected' : '' }}>MATERIAL POLIMER & PLASTIK</option>
                                    <option value="MATERIAL POMPA" {{ old('kategori') == 'Kategori 31' ? 'selected' : '' }}>MATERIAL POMPA</option>
                                    <option value="MATERIAL SEMEN & MORTAR" {{ old('kategori') == 'Kategori 32' ? 'selected' : '' }}>MATERIAL SEMEN & MORTAR</option>
                                    <option value="MATERIAL TANAMAN & BUNGA" {{ old('kategori') == 'Kategori 33' ? 'selected' : '' }}>MATERIAL TANAMAN & BUNGA</option>
                                    <option value="MATERIAL TIANG PANCANG" {{ old('kategori') == 'Kategori 34' ? 'selected' : '' }}>MATERIAL TIANG PANCANG</option>
                                    <option value="MATERIAL U-DITCH & BOX CULVERT" {{ old('kategori') == 'Kategori 35' ? 'selected' : '' }}>MATERIAL U-DITCH & BOX CULVERT</option>
                                    <option value="MATERIAL U-DITCH & BOX CULVERT" {{ old('kategori') == 'Kategori 35' ? 'selected' : '' }}>MATERIAL U-DITCH & BOX CULVERT</option>
                                    <!-- Tambahkan opsi kategori lain sesuai kebutuhan -->
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SUB KATEGORI</label>
                                <input type="text" class="form-control @error('sub_kategori') is-invalid @enderror" name="sub_kategori" value="{{ old('sub_kategori') }}" placeholder="Masukkan Sub Kategori">
                                @error('sub_kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI MATERIAL</label>
                                <input type="text" class="form-control @error('spesifikasi_material') is-invalid @enderror" name="spesifikasi_material" value="{{ old('spesifikasi_material') }}" placeholder="Masukkan Spesifikasi Material">
                                @error('spesifikasi_material')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SATUAN</label>
                                <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{ old('satuan') }}" placeholder="Masukkan Satuan dari Material">
                                @error('satuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">HARGA SATUAN</label>
                                <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan" value="{{ old('harga_satuan') }}" placeholder="Masukkan Harga Satuan">
                                @error('harga_satuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL UPDATE</label>
                                <input type="number" class="form-control @error('tanggal_update') is-invalid @enderror" name="tanggal_update" value="{{ old('tanggal_update') }}" placeholder="Masukkan Tahun" min="1900" max="{{ date('Y') }}">
                                @error('tanggal_update')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SUMBER</label>
                                <input type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" value="{{ old('sumber') }}" placeholder="Masukkan Sumber data Material">
                                @error('sumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">CONTACT PERSON</label>
                                <input type="number" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" placeholder="Masukkan Contact Person">
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">LINK REFERENSI</label>
                                <input type="text" class="form-control @error('link_referensi') is-invalid @enderror" name="link_referensi" value="{{ old('link_referensi') }}" placeholder="Masukkan Link Material">
                                @error('link_referensi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA PERUSAHAAN / TOKO</label>
                                <input type="text" class="form-control @error('nama_perusahaan_toko') is-invalid @enderror" name="nama_perusahaan_toko" value="{{ old('nama_perusahaan_toko') }}" placeholder="Masukkan Nama Perusahaan / Toko">
                                @error('nama_perusahaan_toko')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">LOKASI</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan Lokasi">
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                            <button type="reset" class="btn btn-warning btn-block">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>
