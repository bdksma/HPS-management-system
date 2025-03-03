<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Alat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="/alat/{{$alat->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" value="{{$alat->kategori}}">
                                <option value="{{$alat->kategori}}">{{$alat->kategori}}</option>
                                <option value="I. ALAT BANTU PEKERJAAN" {{ old('kategori') == 'I. ALAT BANTU PEKERJAAN' ? 'selected' : '' }}>I. ALAT BANTU PEKERJAAN</option>
                                <option value="II. ALAT K3 & RAMBU-RAMBU" {{ old('kategori') == 'II. ALAT K3 & RAMBU-RAMBU' ? 'selected' : '' }}>II. ALAT K3 & RAMBU-RAMBU</option>
                                <option value="III. ALAT BESAR & KENDARAAN" {{ old('kategori') == 'III. ALAT BESAR & KENDARAAN' ? 'selected' : '' }}>III. ALAT BESAR & KENDARAAN</option>
                                <option value="IV. ALAT TUKANG & SIPIL" {{ old('kategori') == 'IV. ALAT TUKANG & SIPIL' ? 'selected' : '' }}>IV. ALAT TUKANG & SIPIL</option>
                                <option value="V. ALAT PERBENGKELAN & PERMESINAN" {{ old('kategori') == 'V. ALAT PERBENGKELAN & PERMESINAN' ? 'selected' : '' }}>V. ALAT PERBENGKELAN & PERMESINAN</option>
                                <option value="VI. ALAT ELEKTRIK" {{ old('kategori') == 'VI. ALAT ELEKTRIK' ? 'selected' : '' }}>VI. ALAT ELEKTRIK</option>
                                <option value="VII. ALAT MEMBRANE, PROSES & LAB" {{ old('kategori') == 'VII. ALAT MEMBRANE, PROSES & LAB' ? 'selected' : '' }}>VII. ALAT MEMBRANE, PROSES & LAB</option>
                                <option value="VIII. ALAT TULIS KANTOR" {{ old('kategori') == 'VIII. ALAT TULIS KANTOR' ? 'selected' : '' }}>VIII. ALAT TULIS KANTOR</option>
                                <option value="IX. KANTOR, AKOMODASI & KONSUMSI" {{ old('kategori') == 'IX. KANTOR, AKOMODASI & KONSUMSI' ? 'selected' : '' }}>IX. KANTOR, AKOMODASI & KONSUMSI</option>
                                <option value="X. ALAT PEMBERSIH KANTOR, GEDUNG, ANTI RAYAP" {{ old('kategori') == 'X. ALAT PEMBERSIH KANTOR, GEDUNG, ANTI RAYAP' ? 'selected' : '' }}>X. ALAT PEMBERSIH KANTOR, GEDUNG, ANTI RAYAP</option>
                                <option value="XI. ALAT SURVEY & PHOTOGRAPHY" {{ old('kategori') == 'XI. ALAT SURVEY & PHOTOGRAPHY' ? 'selected' : '' }}>XI. ALAT SURVEY & PHOTOGRAPHY</option>
                                <option value="XII. INKINDO" {{ old('kategori') == 'XII. INKINDO' ? 'selected' : '' }}>XII. INKINDO</option>
                                <!-- Tambahkan opsi kategori lain sesuai kebutuhan -->
                                </select>
                                @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">SPESIFIKASI ALAT</label>
                            <input type="text" class="form-control @error('spesifikasi_alat') is-invalid @enderror" name="spesifikasi_alat" id="spesifikasi_alat" value="{{$alat->spesifikasi_alat}}">
                            @error('spesifikasi_alat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">SATUAN</label>
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" value="{{$alat->satuan}}">
                            @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">HARGA SATUAN</label>
                            <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan" id="harga_satuan" value="{{$alat->harga_satuan}}">
                            @error('harga_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">UPDATE TAHUN</label>
                            <input type="number" class="form-control @error('update_tahun') is-invalid @enderror" name="update_tahun" id="update_tahun" value="{{$alat->update_tahun}}">
                            @error('update_tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">SUMBER</label>
                            <input type="text" class="form-control @error('sumber') is-invalid @enderror" name="sumber" id="sumber" value="{{$alat->sumber}}">
                            @error('sumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">LINK</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{$alat->link}}">
                            @error('link')
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
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>

