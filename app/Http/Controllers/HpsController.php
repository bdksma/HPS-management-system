<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RincianPekerjaan;
use App\Models\RincianPekerjaanHPS;
use App\Models\Pekerjaan;
use App\Models\PekerjaanHPS;
use App\Models\HasilPerhitunganHPS;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HpsController extends Controller
{
    // Metode untuk menampilkan formulir HPS
    public function showForm()
    {
        $pekerjaans = Pekerjaan::all();
        $rincianpekerjaans = RincianPekerjaan::all();
        //return view('hps.form'); // Ganti 'hps.form' dengan nama view Anda
        return view('hps.form', compact('pekerjaans', 'rincianpekerjaans'));
    }

    public function show($id) {
        $post = RincianPekerjaan::find($id);
        return view('hps.form', compact('post'));
    }

    public function simpanData(Request $request)
{
    //dd($request->all());

    DB::beginTransaction();
    try {
    Log::info('Request Data: ', $request->all());
    if ($request->input('jenis_pekerjaan') === 'lainnya') {
        // Validasi data input manual
        $validatedData = $request->validate([
            'manual_jenis_pekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'nomor_pekerjaan' => 'required|string|max:100|unique:pekerjaan_hps,nomor_pekerjaan',
        ]);

    } else {
    // Validasi data input
    $validatedData = $request->validate([
        // Validasi untuk tabel RincianPekerjaanHPS
        'nomor' => 'required|array', // Menggunakan array karena ada banyak rincian
        'nomor.*' => 'required|integer',
        'scope_pekerjaan' => 'required|array',
        'scope_pekerjaan.*' => 'required|string',
        'volume_angka' => 'required|array',
        'volume_angka.*' => 'required|integer|min:1',
        'volume_satuan' => 'required|array',
        'volume_satuan.*' => 'required|string|max:100',
        'total_harga_bahan' => 'required|array',
        'total_harga_bahan.*' => 'required|numeric|min:0',
        'total_harga_upah' => 'required|array',
        'total_harga_upah.*' => 'required|numeric|min:0',
        'total_harga_alat' => 'required|array',
        'total_harga_alat.*' => 'required|numeric|min:0',
        'total_pekerjaan' => 'required|array',
        'total_pekerjaan.*' => 'required|numeric|min:0',
        'bl_bahan' => 'required|array',
        'bl_bahan.*' => 'required|numeric|min:0',
        'bl_upah' => 'required|array',
        'bl_upah.*' => 'required|numeric|min:0',
        'bl_alat' => 'required|array',
        'bl_alat.*' => 'required|numeric|min:0',
        'jumlah' => 'required|array',
        'jumlah.*' => 'required|numeric|min:0',

        // Validasi untuk tabel HasilPerhitunganHPS
        'harga_bahan_total' => 'required|numeric|min:0',
        'harga_upah_total' => 'required|numeric|min:0',
        'harga_alat_total' => 'required|numeric|min:0',
        'biaya_total_bua' => 'required|numeric|min:0',
        'ppn_bahan_total' => 'required|numeric|min:0',
        'ppn_upah_total' => 'required|numeric|min:0',
        'ppn_alat_total' => 'required|numeric|min:0',
        'ppn_total' => 'required|numeric|min:0',
        'biaya_total' => 'required|numeric|min:0',
        'keseluruhan_bahan_total' => 'required|numeric|min:0',
        'keseluruhan_upah_total' => 'required|numeric|min:0',
        'keseluruhan_alat_total' => 'required|numeric|min:0',
        'keseluruhan_total' => 'required|numeric|min:0',
        'dibulatkan' => 'required|numeric|min:0',
    ], [
        //pesan error untuk RincianPekerjaanHPS
        'nomor.required' => 'Kolom nomor harus diisi.',
        'nomor.*.required' => 'Nomor rincian pekerjaan tidak boleh kosong.',
        'nomor.*.integer' => 'Nomor rincian pekerjaan harus berupa angka.',
    
        'scope_pekerjaan.required' => 'Scope pekerjaan harus diisi.',
        'scope_pekerjaan.*.required' => 'Setiap scope pekerjaan harus diisi.',
        'scope_pekerjaan.*.string' => 'Scope pekerjaan harus berupa teks.',
        'scope_pekerjaan.*.max' => 'Scope pekerjaan tidak boleh lebih dari 255 karakter.',
        
        'volume_angka.required' => 'Volume angka harus diisi.',
        'volume_angka.*.required' => 'Setiap volume angka harus diisi.',
        'volume_angka.*.integer' => 'Volume angka harus berupa angka bulat.',
        'volume_angka.*.min' => 'Volume angka harus minimal 1.',
        
        'volume_satuan.required' => 'Volume satuan harus diisi.',
        'volume_satuan.*.required' => 'Setiap volume satuan harus diisi.',
        'volume_satuan.*.string' => 'Volume satuan harus berupa teks.',
        'volume_satuan.*.max' => 'Volume satuan tidak boleh lebih dari 100 karakter.',
        
        'total_harga_bahan.required' => 'Total harga bahan harus diisi.',
        'total_harga_bahan.*.required' => 'Setiap total harga bahan harus diisi.',
        'total_harga_bahan.*.numeric' => 'Total harga bahan harus berupa angka.',
        'total_harga_bahan.*.min' => 'Total harga bahan tidak boleh kurang dari 0.',
        
        'total_harga_upah.required' => 'Total harga upah harus diisi.',
        'total_harga_upah.*.required' => 'Setiap total harga upah harus diisi.',
        'total_harga_upah.*.numeric' => 'Total harga upah harus berupa angka.',
        'total_harga_upah.*.min' => 'Total harga upah tidak boleh kurang dari 0.',
        
        'total_harga_alat.required' => 'Total harga alat harus diisi.',
        'total_harga_alat.*.required' => 'Setiap total harga alat harus diisi.',
        'total_harga_alat.*.numeric' => 'Total harga alat harus berupa angka.',
        'total_harga_alat.*.min' => 'Total harga alat tidak boleh kurang dari 0.',
        
        'total_pekerjaan.required' => 'Total pekerjaan harus diisi.',
        'total_pekerjaan.*.required' => 'Setiap total pekerjaan harus diisi.',
        'total_pekerjaan.*.numeric' => 'Total pekerjaan harus berupa angka.',
        'total_pekerjaan.*.min' => 'Total pekerjaan tidak boleh kurang dari 0.',
        
        'bl_bahan.required' => 'BL bahan harus diisi.',
        'bl_bahan.*.required' => 'Setiap BL bahan harus diisi.',
        'bl_bahan.*.numeric' => 'BL bahan harus berupa angka.',
        'bl_bahan.*.min' => 'BL bahan tidak boleh kurang dari 0.',
        
        'bl_upah.required' => 'BL upah harus diisi.',
        'bl_upah.*.required' => 'Setiap BL upah harus diisi.',
        'bl_upah.*.numeric' => 'BL upah harus berupa angka.',
        'bl_upah.*.min' => 'BL upah tidak boleh kurang dari 0.',
        
        'bl_alat.required' => 'BL alat harus diisi.',
        'bl_alat.*.required' => 'Setiap BL alat harus diisi.',
        'bl_alat.*.numeric' => 'BL alat harus berupa angka.',
        'bl_alat.*.min' => 'BL alat tidak boleh kurang dari 0.',
        
        'jumlah.required' => 'Jumlah harus diisi.',
        'jumlah.*.required' => 'Setiap jumlah harus diisi.',
        'jumlah.*.numeric' => 'Jumlah harus berupa angka.',
        'jumlah.*.min' => 'Jumlah tidak boleh kurang dari 0.',

        //pesan error untuk HasilPerhitunganHPS
        'harga_bahan_total.required' => 'Harga bahan total harus diisi.',
        'harga_bahan_total.numeric' => 'Harga bahan total harus berupa angka.',
        'harga_bahan_total.min' => 'Harga bahan total tidak boleh kurang dari 0.',
        
        'harga_upah_total.required' => 'Harga upah total harus diisi.',
        'harga_upah_total.numeric' => 'Harga upah total harus berupa angka.',
        'harga_upah_total.min' => 'Harga upah total tidak boleh kurang dari 0.',
        
        'harga_alat_total.required' => 'Harga alat total harus diisi.',
        'harga_alat_total.numeric' => 'Harga alat total harus berupa angka.',
        'harga_alat_total.min' => 'Harga alat total tidak boleh kurang dari 0.',
        
        'biaya_total_bua.required' => 'Biaya total BUA harus diisi.',
        'biaya_total_bua.numeric' => 'Biaya total BUA harus berupa angka.',
        'biaya_total_bua.min' => 'Biaya total BUA tidak boleh kurang dari 0.',
        
        'ppn_bahan_total.required' => 'PPN bahan total harus diisi.',
        'ppn_bahan_total.numeric' => 'PPN bahan total harus berupa angka.',
        'ppn_bahan_total.min' => 'PPN bahan total tidak boleh kurang dari 0.',
        
        'ppn_upah_total.required' => 'PPN upah total harus diisi.',
        'ppn_upah_total.numeric' => 'PPN upah total harus berupa angka.',
        'ppn_upah_total.min' => 'PPN upah total tidak boleh kurang dari 0.',
        
        'ppn_alat_total.required' => 'PPN alat total harus diisi.',
        'ppn_alat_total.numeric' => 'PPN alat total harus berupa angka.',
        'ppn_alat_total.min' => 'PPN alat total tidak boleh kurang dari 0.',
        
        'ppn_total.required' => 'PPN total harus diisi.',
        'ppn_total.numeric' => 'PPN total harus berupa angka.',
        'ppn_total.min' => 'PPN total tidak boleh kurang dari 0.',
        
        'biaya_total.required' => 'Biaya total harus diisi.',
        'biaya_total.numeric' => 'Biaya total harus berupa angka.',
        'biaya_total.min' => 'Biaya total tidak boleh kurang dari 0.',
        
        'keseluruhan_bahan_total.required' => 'Keseluruhan bahan total harus diisi.',
        'keseluruhan_bahan_total.numeric' => 'Keseluruhan bahan total harus berupa angka.',
        'keseluruhan_bahan_total.min' => 'Keseluruhan bahan total tidak boleh kurang dari 0.',
        
        'keseluruhan_upah_total.required' => 'Keseluruhan upah total harus diisi.',
        'keseluruhan_upah_total.numeric' => 'Keseluruhan upah total harus berupa angka.',
        'keseluruhan_upah_total.min' => 'Keseluruhan upah total tidak boleh kurang dari 0.',
        
        'keseluruhan_alat_total.required' => 'Keseluruhan alat total harus diisi.',
        'keseluruhan_alat_total.numeric' => 'Keseluruhan alat total harus berupa angka.',
        'keseluruhan_alat_total.min' => 'Keseluruhan alat total tidak boleh kurang dari 0.',
        
        'keseluruhan_total.required' => 'Keseluruhan total harus diisi.',
        'keseluruhan_total.numeric' => 'Keseluruhan total harus berupa angka.',
        'keseluruhan_total.min' => 'Keseluruhan total tidak boleh kurang dari 0.',
        
        'dibulatkan.required' => 'Jumlah dibulatkan harus diisi.',
        'dibulatkan.numeric' => 'Jumlah dibulatkan harus berupa angka.',
        'dibulatkan.min' => 'Jumlah dibulatkan tidak boleh kurang dari 0.',
    ]);
    
        $data = new PekerjaanHPS();
        $data->nama_pekerjaan = $request->input('manual_jenis_pekerjaan');
        $data->lokasi = $request->input('lokasi');
        $data->nomor_pekerjaan = $request->input('nomor_pekerjaan');
        $data->save();
        $pekerjaanId = $data->id_pekerjaan;

    // Simpan data ke tabel RincianPekerjaanHPS
    foreach ($validatedData['scope_pekerjaan'] as $index => $scope) {
        RincianPekerjaanHPS::create([
            'nomor' => $validatedData['nomor'][$index],
            'scope_pekerjaan' => $scope,
            'volume_angka' => $validatedData['volume_angka'][$index],
            'volume_satuan' => $validatedData['volume_satuan'][$index],
            'total_harga_bahan' => $validatedData['total_harga_bahan'][$index],
            'total_harga_upah' => $validatedData['total_harga_upah'][$index],
            'total_harga_alat' => $validatedData['total_harga_alat'][$index],
            'total_pekerjaan' => $validatedData['total_pekerjaan'][$index],
            'bl_bahan' => $validatedData['bl_bahan'][$index],
            'bl_upah' => $validatedData['bl_upah'][$index],
            'bl_alat' => $validatedData['bl_alat'][$index],
            'jumlah' => $validatedData['jumlah'][$index],
            'ref_id_pekerjaan' => $pekerjaanId
        ]);
    }

    // Simpan data ke tabel HasilPerhitunganHPS
    HasilPerhitunganHPS::create([
        'ref_id_pekerjaan' => $pekerjaanId, // FK ke PekerjaanHPS
        'harga_bahan_total' => $validatedData['harga_bahan_total'],
        'harga_upah_total' => $validatedData['harga_upah_total'],
        'harga_alat_total' => $validatedData['harga_alat_total'],
        'biaya_total_bua' => $validatedData['biaya_total_bua'],
        'ppn_bahan_total' => $validatedData['ppn_bahan_total'],
        'ppn_upah_total' => $validatedData['ppn_upah_total'],
        'ppn_alat_total' => $validatedData['ppn_alat_total'],
        'ppn_total' => $validatedData['ppn_total'],
        'biaya_total' => $validatedData['biaya_total'],
        'keseluruhan_bahan_total' => $validatedData['keseluruhan_bahan_total'],
        'keseluruhan_upah_total' => $validatedData['keseluruhan_upah_total'],
        'keseluruhan_alat_total' => $validatedData['keseluruhan_alat_total'],
        'keseluruhan_total' => $validatedData['keseluruhan_total'],
        'dibulatkan' => $validatedData['dibulatkan'],
    ]);


    DB::commit();
    return redirect()->back()->with('success', 'Data berhasil disimpan');

} 
} catch (\Exception $e) {
    DB::rollBack();
    Log::error('Error saat menyimpan data: '.$e->getMessage());
    return redirect()->back()->with('error', 'Gagal menyimpan data: '. $e->getMessage());
}
}


    // Metode untuk menyimpan data HPS
    public function store(Request $request)
    {

        // Validasi dan simpan data dari formulir
        $validatedData = $request->validate([
            'nomor' => 'required|array',
            'scope_pekerjaan' => 'required|array',
            'angka' => 'required|array',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Proses penyimpanan data
        // ...

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
