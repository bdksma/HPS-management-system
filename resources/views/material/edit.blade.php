<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="/material/{{$material->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                    <option value="{{$material->kategori}}">{{$material->kategori}}</option>
                                    <option value="MATERIAL ALAM" {{ old('kategori') == 'MATERIAL ALAM' ? 'selected' : '' }}>MATERIAL ALAM</option>
                                    <option value="MATERIAL ALUMINIUM" {{ old('kategori') == 'MATERIAL ALUMINIUM' ? 'selected' : '' }}>MATERIAL ALUMINIUM</option>
                                    <option value="MATERIAL ATAP" {{ old('kategori') == 'MATERIAL ATAP' ? 'selected' : '' }}>MATERIAL ATAP</option>
                                    <option value="MATERIAL PAKU, DYNABOLT, BAUT, DLL" {{ old('kategori') == 'MATERIAL PAKU, DYNABOLT, BAUT, DLL' ? 'selected' : '' }}>MATERIAL PAKU, DYNABOLT, BAUT, DLL</option>
                                    <option value="MATERIAL ATK" {{ old('kategori') == 'MATERIAL ATK' ? 'selected' : '' }}>MATERIAL ATK</option>
                                    <option value="MATERIAL BESI/BAJA" {{ old('kategori') == 'MATERIAL BESI/BAJA' ? 'selected' : '' }}>MATERIAL BESI/BAJA</option>
                                    <option value="MATERIAL BETON" {{ old('kategori') == 'MATERIAL BETON' ? 'selected' : '' }}>MATERIAL BETON</option>
                                    <option value="MATERIAL CAT" {{ old('kategori') == 'MATERIAL CAT' ? 'selected' : '' }}>MATERIAL CAT</option>
                                    <option value="MATERIAL CHEMICAL" {{ old('kategori') == 'MATERIAL CHEMICAL' ? 'selected' : '' }}>MATERIAL CHEMICAL</option>
                                    <option value="MATERIAL ELECTRICAL / ELEKTRO GROUP" {{ old('kategori') == 'MATERIAL ELECTRICAL / ELEKTRO GROUP' ? 'selected' : '' }}>MATERIAL ELECTRICAL / ELEKTRO GROUP</option>
                                    <option value="MATERIAL FURNITURE" {{ old('kategori') == 'MATERIAL FURNITURE' ? 'selected' : '' }}>MATERIAL FURNITURE</option>
                                    <option value="MATERIAL INFORMATION TECHNOLOGY" {{ old('kategori') == 'MATERIAL INFORMATION TECHNOLOGY' ? 'selected' : '' }}>MATERIAL INFORMATION TECHNOLOGY</option>
                                    <option value="MATERIAL INSTRUMENTASI" {{ old('kategori') == 'MATERIAL INSTRUMENTASI' ? 'selected' : '' }}>MATERIAL INSTRUMENTASI</option>
                                    <option value="MATERIAL KESELAMATAN DAN KESEHATAN KERJA (K3)" {{ old('kategori') == 'MATERIAL KESELAMATAN DAN KESEHATAN KERJA (K3)' ? 'selected' : '' }}>MATERIAL KESELAMATAN DAN KESEHATAN KERJA (K3)</option>
                                    <option value="MATERIAL KACA" {{ old('kategori') == 'MATERIAL KACA' ? 'selected' : '' }}>MATERIAL KACA</option>
                                    <option value="MATERIAL KATODIK PROTEKSI" {{ old('kategori') == 'MATERIAL KATODIK PROTEKSI' ? 'selected' : '' }}>MATERIAL KATODIK PROTEKSI</option>
                                    <option value="MATERIAL KAYU" {{ old('kategori') == 'MATERIAL KAYU' ? 'selected' : '' }}>MATERIAL KAYU</option>
                                    <option value="MATERIAL LABORATORIUM" {{ old('kategori') == 'MATERIAL LABORATORIUM' ? 'selected' : '' }}>MATERIAL LABORATORIUM</option>
                                    <option value="MATERIAL LAINNYA" {{ old('kategori') == 'MATERIAL LAINNYA' ? 'selected' : '' }}>MATERIAL LAINNYA</option>
                                    <option value="MATERIAL LANTAI & DINDING" {{ old('kategori') == 'MATERIAL LANTAI & DINDING' ? 'selected' : '' }}>MATERIAL LANTAI & DINDING</option>
                                    <option value="MATERIAL MEKANIK" {{ old('kategori') == 'MATERIAL MEKANIK' ? 'selected' : '' }}>MATERIAL MEKANIK</option>
                                    <option value="MATERIAL PAKU, DYNABOLT, BAUT, DLL" {{ old('kategori') == 'MATERIAL PAKU, DYNABOLT, BAUT, DLL' ? 'selected' : '' }}>MATERIAL PAKU, DYNABOLT, BAUT, DLL</option>
                                    <option value="MATERIAL PAVING BLOCK & KANSTIN" {{ old('kategori') == 'MATERIAL PAVING BLOCK & KANSTIN' ? 'selected' : '' }}>MATERIAL PAVING BLOCK & KANSTIN</option>
                                    <option value="MATERIAL PENAMPUNG AIR & VESSEL" {{ old('kategori') == 'MATERIAL PENAMPUNG AIR & VESSEL' ? 'selected' : '' }}>MATERIAL PENAMPUNG AIR & VESSEL</option>
                                    <option value="MATERIAL PENGUJIAN & LAB" {{ old('kategori') == 'MATERIAL PENGUJIAN & LAB' ? 'selected' : '' }}>MATERIAL PENGUJIAN & LAB</option>
                                    <option value="MATERIAL PENUTUP KONTRUKSI JALAN" {{ old('kategori') == 'MATERIAL PENUTUP KONTRUKSI JALAN' ? 'selected' : '' }}>MATERIAL PENUTUP KONTRUKSI JALAN</option>
                                    <option value="MATERIAL PERPIPAAN / FITTING & PLUMBING" {{ old('kategori') == 'MATERIAL PERPIPAAN / FITTING & PLUMBING' ? 'selected' : '' }}>MATERIAL PERPIPAAN / FITTING & PLUMBING</option>
                                    <option value="MATERIAL PINTU & JENDELA" {{ old('kategori') == 'MATERIAL PINTU & JENDELA' ? 'selected' : '' }}>MATERIAL PINTU & JENDELA</option>
                                    <option value="MATERIAL PIPA" {{ old('kategori') == 'MATERIAL PIPA' ? 'selected' : '' }}>MATERIAL PIPA</option>
                                    <option value="MATERIAL PLAFOND & PARTISI" {{ old('kategori') == 'MATERIAL PLAFOND & PARTISI' ? 'selected' : '' }}>MATERIAL PLAFOND & PARTISI</option>
                                    <option value="MATERIAL POLIMER & PLASTIK" {{ old('kategori') == 'MATERIAL POLIMER & PLASTIK' ? 'selected' : '' }}>MATERIAL POLIMER & PLASTIK</option>
                                    <option value="MATERIAL POMPA" {{ old('kategori') == 'MATERIAL POMPA' ? 'selected' : '' }}>MATERIAL POMPA</option>
                                    <option value="MATERIAL SEMEN & MORTAR" {{ old('kategori') == 'MATERIAL SEMEN & MORTAR' ? 'selected' : '' }}>MATERIAL SEMEN & MORTAR</option>
                                    <option value="MATERIAL TANAMAN & BUNGA" {{ old('kategori') == 'MATERIAL TANAMAN & BUNGA' ? 'selected' : '' }}>MATERIAL TANAMAN & BUNGA</option>
                                    <option value="MATERIAL TIANG PANCANG" {{ old('kategori') == 'MATERIAL TIANG PANCANG' ? 'selected' : '' }}>MATERIAL TIANG PANCANG</option>
                                    <option value="MATERIAL U-DITCH & BOX CULVERT" {{ old('kategori') == 'MATERIAL U-DITCH & BOX CULVERT' ? 'selected' : '' }}>MATERIAL U-DITCH & BOX CULVERT</option>
                                    <!-- Tambahkan opsi kategori lain sesuai kebutuhan -->
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SUB KATEGORI</label>
                                <input type="text" class="form-control @error('sub_kategori') is-invalid @enderror" name="sub_kategori" id="sub_kategori" value="{{$material->sub_kategori}}">
                                @error('sub_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI MATERIAL</label>
                                <input type="text" class="form-control @error('spesifikasi_material') is-invalid @enderror" name="spesifikasi_material" id="spesifikasi_material" value="{{$material->spesifikasi_material}}">
                                @error('spesifikasi_material')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SATUAN</label>
                                <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" value="{{$material->satuan}}">
                                @error('satuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">HARGA SATUAN</label>
                                <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan" id="harga_satuan" value="{{$material->harga_satuan}}">
                                @error('harga_satuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL UPDATE</label>
                                <input type="date" class="form-control @error('tanggal_update') is-invalid @enderror" name="tanggal_update" id="tanggal_update" value="{{$material->tanggal_update}}">
                                @error('tanggal_update')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SUMBER</label>
                                <input type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" id="sumber" value="{{$material->sumber}}">
                                @error('sumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">CONTACT PERSON</label>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" id="contact_person" value="{{$material->contact_person}}">
                                @error('contact_person')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$material->email}}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">LINK REFERENSI</label>
                                <input type="text" class="form-control @error('link_referensi') is-invalid @enderror" name="link_referensi" id="link_referensi" value="{{$material->link_referensi}}">
                                @error('link_referensi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA PERUSAHAAN / TOKO</label>
                                <input type="text" class="form-control @error('nama_perusahaan_toko') is-invalid @enderror" name="nama_perusahaan_toko" id="nama_perusahaan_toko" value="{{$material->nama_perusahaan_toko}}">
                                @error('nama_perusahaan_toko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">LOKASI</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" value="{{$material->lokasi}}">
                                @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

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
