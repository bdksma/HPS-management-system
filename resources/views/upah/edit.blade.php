<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Upah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="/upah/{{$upah->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Upah</label>
                            <select class="form-control @error('jenis_upah') is-invalid @enderror" name="jenis_upah">
                                <option value="" disabled>Pilih Jenis Upah</option>
                                <option value="Upah Berdasarkan Penawaran" {{ (old('jenis_upah', $upah->jenis_upah) == 'Upah Berdasarkan Penawaran') ? 'selected' : '' }}>Upah Berdasarkan Penawaran</option>
                                <option value="Upah Tukang Bangunan 2023 Standar Pemerintah Cilegon (UMK)" {{ (old('jenis_upah', $upah->jenis_upah) == 'Upah Tukang Bangunan 2023 Standar Pemerintah Cilegon (UMK)') ? 'selected' : '' }}>Upah Tukang Bangunan 2023 Standar Pemerintah Cilegon (UMK)</option>
                                <option value="Upah Tenaga Ahli Konsultan" {{ (old('jenis_upah', $upah->jenis_upah) == 'Upah Tenaga Ahli Konsultan') ? 'selected' : '' }}>Upah Tenaga Ahli Konsultan</option>
                                <option value="Upah Operator Alat" {{ (old('jenis_upah', $upah->jenis_upah) == 'Upah Operator Alat') ? 'selected' : '' }}>Upah Operator Alat</option>
                            </select>
                            @error('jenis_upah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $upah->keterangan) }}" placeholder="Masukkan Keterangan Upah Untuk Apa">
                            @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Satuan</label>
                            <input type="text" class="form-control @error('satuan_persentase_utb') is-invalid @enderror" name="satuan_persentase_utb" value="{{ old('satuan_persentase_utb', $upah->satuan_persentase_utb) }}" placeholder="Masukkan Satuan">
                            @error('satuan_persentase_utb')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Upah</label>
                            <input type="number" class="form-control @error('upah') is-invalid @enderror" name="upah" value="{{ old('upah', $upah->upah) }}" placeholder="Masukkan Upah">
                            @error('upah')
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
