<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ahsp;
use App\Models\alat;
use App\Models\upah; 
use App\Models\material;
use App\Models\pekerjaan;
use App\Models\PekerjaanHPS;
use App\Models\RincianPekerjaanHPS;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RincianPekerjaan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class AhspController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        view('ahsp.index');
    }

    public function show($id) {
        $post = RincianPekerjaan::find($id);
        return view('createhps', compact('post'));
    }
    
    public function showMaterial($id)
    {
        $material = material::find($id);
        return response()->json($material);
    }

    public function showAlat($id)
    {
        $alat = alat::find($id);
        return response()->json($alat);
    }

    public function showUpah($id)
    {
        $upah = upah::find($id);
        return response()->json($upah);
    }

    public function indexHps()
    {
        $pekerjaans = Pekerjaan::all();
        $rincianpekerjaans = RincianPekerjaan::all();
        return view('ahsp.createhps', compact('pekerjaans', 'rincianpekerjaans'));
    }

    public function formtest()
    {
        try {
            // Mengambil semua data pekerjaan HPS
            $pekerjaans = PekerjaanHPS::all();
    
            // Mengambil semua data rincian pekerjaan HPS
            $rincianpekerjaans = RincianPekerjaanHPS::all();
    
            // Kirimkan data ke view
            return view('ahsp.formtest', compact('pekerjaans', 'rincianpekerjaans'));
        } catch (\Exception $e) {
            // Tangani error dan tampilkan pesan
            return back()->with('error', 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage());
        }
    }

    public function getPekerjaan($pekerjaanId)
    {
        try {
            // Cari pekerjaan berdasarkan ID
            $pekerjaan = PekerjaanHPS::findOrFail($pekerjaanId);

            // Validasi jika pekerjaan tidak ditemukan
            if (!$pekerjaan) {
                return response()->json(['error' => 'Pekerjaan tidak ditemukan'], 404);
            }

            // Ambil rincian pekerjaan berdasarkan ID pekerjaan
            $rincian = RincianPekerjaanHPS::where('pekerjaan_id', $pekerjaanId)->get();

            // Kembalikan data dalam format JSON
            return response()->json([
                'pekerjaan' =>  [
                    'nama_pekerjaan' => $pekerjaan->nama_pekerjaan,
                    'lokasi' => $pekerjaan->lokasi,
                    'nomor_pekerjaan' => $pekerjaan->nomor_pekerjaan,
                ],
                'rincian' => $rincian,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal memuat data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function createPekerjaanHps()
    {
        // Menampilkan view untuk form
        return view('ahsp.pekerjaanhps'); // Nama file Blade: resources/views/ahsp/pekerjaanhps.blade.php
    }

    public function storePekerjaanHps(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
            'nomor_pekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        // Simpan data ke tabel pekerjaan_hps
        $pekerjaan = PekerjaanHPS::create($validatedData);

        // Redirect ke halaman rincian pekerjaan dengan parameter pekerjaan_id
        return redirect()->route('ahsp.rincianpekerjaanhps', ['pekerjaan_id' => $pekerjaan->pekerjaan_id])
        ->with('success', 'Data pekerjaan berhasil disimpan!');
    }

    
    public function createRincianPekerjaanHps($pekerjaan_id)
    {
        $materials = Material::all(); 
        $alats = Alat::all();
        $upahs = Upah::all();

        $rincian = RincianPekerjaanHPS::where('pekerjaan_id', $pekerjaan_id)->get();

        return view('ahsp.rincianpekerjaanhps', [
            'pekerjaan_id' => $pekerjaan_id,
            'rincian' => $rincian,
            'materials' => $materials,
            'alats' => $alats,
            'upahs' => $upahs
        ]);
    }


    public function storeRincianPekerjaanHps(Request $request)
    {
        //dd($request->all()); // Periksa data yang diterima dari formulir

        $validatedData = $request->validate([
            'pekerjaan_id' => 'required|exists:pekerjaan_hps,pekerjaan_id',
            'nomor_urut' => 'required|numeric',
            'uraian_pekerjaan' => 'required|string|max:255',
            'volume_angka' => 'required|numeric',
            'volume_satuan' => 'required|string|max:50',
            'biaya_satuan_bahan' => 'required|numeric',
            'biaya_satuan_alat' => 'required|numeric',
            'biaya_satuan_upah' => 'required|numeric',
        ]);

        // Simpan rincian pekerjaan
        RincianPekerjaanHPS::create($validatedData);

        if ($request->has('tambah_rincian')) {
            // Redirect kembali ke laman rincian pekerjaan
            return redirect()->route('ahsp.rincianpekerjaanhps', ['pekerjaan_id' => $request->pekerjaan_id])
                ->with('success', 'Rincian pekerjaan berhasil ditambahkan! Tambah rincian baru.');
        } elseif ($request->has('selesai')) {
            // Redirect ke halaman lain (misalnya, daftar pekerjaan)
            return redirect()->route('ahsp.pekerjaanhps')->with('success', 'Semua rincian pekerjaan telah disimpan!');
        }
    }



    public function showPekerjaan($id)
    {
        $pekerjaan = PekerjaanHPS::find($pekerjaan_id);
        return response()->json($pekerjaan);
    }

    public function showRincianPekerjaan($id)
    {
        $rincianpekerjaan = RincianPekerjaan::find($id);
        return response()->json($rincianpekerjaan);
    }


    public function create()
    {
        // Get data from models
        $materials = Material::all(); 
        $alats = Alat::all();
        $upahs = Upah::all();
        $pekerjaans = Pekerjaan::all();
        
        // Render view with data
        return view('ahsp.create', compact('materials','alats','upahs', 'pekerjaans'));
    }

    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'nama_pekerjaan' => 'nullable|string',
        'manual_nama_pekerjaan' => 'nullable|string',
        'lokasi' => 'required|string',
        'nomor_pekerjaan' => 'required|string',
        'rincian' => 'required|array', // Pastikan rincian adalah array
        'rincian.*.nomor_urut' => 'required|integer',
        'rincian.*.uraian_pekerjaan' => 'required|string',
        'rincian.*.volume_angka' => 'required|numeric',
        'rincian.*.volume_satuan' => 'required|string',
        'rincian.*.biaya_satuan_bahan' => 'required|numeric',
        'rincian.*.biaya_satuan_upah' => 'required|numeric',
        'rincian.*.biaya_satuan_alat' => 'required|numeric',
    ]);

    // Tentukan nama pekerjaan
    $namaPekerjaan = $request->nama_pekerjaan === 'lainnya' 
        ? $request->manual_nama_pekerjaan 
        : $request->nama_pekerjaan;

    // Gunakan transaction untuk menjaga integritas data
    DB::beginTransaction();
    try {
        // Simpan data ke tabel Pekerjaan
        $pekerjaan = Pekerjaan::create([
            'nama_pekerjaan' => $namaPekerjaan,
            'lokasi' => $request->lokasi,
            'nomor_pekerjaan' => $request->nomor_pekerjaan,
        ]);

        // Simpan data ke tabel PekerjaanHPS
        $pekerjaanHPS = $pekerjaan->pekerjaanHPS()->create([
            'nama_pekerjaan' => $namaPekerjaan,
            'nomor_pekerjaan' => $request->nomor_pekerjaan,
            'lokasi' => $request->lokasi,
        ]);

        // Simpan rincian pekerjaan menggunakan relasi
        $pekerjaanHPS->rincianPekerjaan()->createMany($request->rincian);

        DB::commit(); // Jika semua berhasil, lakukan commit
    } catch (\Exception $e) {
        DB::rollBack(); // Jika ada error, batalkan semua perubahan
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
    }

    return redirect()->route('ahsp.createhps')->with('success', 'Data berhasil disimpan!');
}



    function view_pdf(){
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }

    public function exportPdf(){
        //datahps disini misal $books = modelbook:all();
        $pdf = Pdf::loadView('pdf.export-hps'); //$data);
        return $pdf->download('hps-version-'.Carbon::now()->timestamp.'.pdf');
    }


    /**
     * store
     *
     * @return void
     */
  
    public function storepekerjaan(Request $request)
    {
        $request->validate([
            'namaPekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'nomorPekerjaan' => 'required|string|max:255',
        ]);

        $data = new Pekerjaan();
        $data->nama_pekerjaan = $request->input('namaPekerjaan');
        $data->lokasi = $request->input('lokasi');
        $data->nomor_pekerjaan = $request->input('nomorPekerjaan');
        $data->save();

        return redirect()->back()->with('success', 'Data pekerjaan berhasil disimpan.');
    }  

    public function storerincianpekerjaan(Request $request)
{
    // Debug log untuk melihat data yang diterima
    Log::info('Request Data: ', $request->all());

    $request->validate([
        'scopePekerjaan' => 'required|string',
        'hargaTotalBahan' => 'required|numeric',
        'totalHargaAlat' => 'required|numeric',
        'hargaTotalUpah' => 'required|numeric',
    ], [
        'hargaTotalBahan.numeric' => 'Format harga total bahan tidak valid.',
        'totalHargaAlat.between' => 'Total harga alat tidak boleh lebih dari 0,99999999.99.',
        'hargaTotalUpah.between' => 'Harga total upah tidak boleh lebih dari 0,99999999.99.',
    ]);

    try {
        $data = new RincianPekerjaan();
        $data->scope_pekerjaan = $request->input('scopePekerjaan');
        $data->total_harga_bahan = $request->input('hargaTotalBahan');
        $data->total_harga_alat = $request->input('totalHargaAlat');
        $data->total_harga_upah = $request->input('hargaTotalUpah');
        
        // Debug log untuk melihat data sebelum dikirim ke database
        Log::info('Data yang akan disimpan: ', [
            'scope_pekerjaan' => $data->scope_pekerjaan,
            'total_harga_bahan' => $data->total_harga_bahan,
            'total_harga_alat' => $data->total_harga_alat,
            'total_harga_upah' => $data->total_harga_upah
        ]);

        $data->save();

        return redirect()->back()->with('success', 'Data rincian pekerjaan berhasil disimpan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan data rincian pekerjaan: ' . $e->getMessage());
    }
}



    /**
     * edit
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
{
    // Find the Ahsp by id
    $ahsp = Ahsp::findOrFail($id);

    // Fetch all Ahsp data (optional)
    $ahsps = Ahsp::all();

    // Return view with Ahsp data
    return view('ahsp.edit', compact('ahsp', 'ahsps'));
}


    /**
     * update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validate form
    $this->validate($request, [
        // Tambahkan aturan validasi
    ]);

    // Temukan AHSP berdasarkan ID
    $ahsp = Ahsp::findOrFail($id);

    // Perbarui AHSP
    $ahsp->update($request->only([
        // Daftar field yang dapat diperbarui
    ]));

    // Redirect ke index dengan pesan sukses
    return redirect()->route('ahsp.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  \App\Models\Ahsp  $ahsp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ahsp $ahsp)
{
    // Pastikan AHSP ada sebelum menghapusnya
    if (!$ahsp) {
        // Jika AHSP tidak ditemukan, kembalikan respon 404
        abort(404);
    }

    // Hapus AHSP
    $ahsp->delete();

    // Redirect ke index dengan pesan sukses
    //return redirect()->route('ahsp.index')->with(['success' => 'Data Berhasil Dihapus!']);
}

    /**
     * search
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get search term from request
        $searchTerm = $request->input('term');

        // Search for materials based on the search term
        $materials = Material::where('spesifikasi_material', 'like', '%' . $searchTerm . '%')
                             ->select('id', 'spesifikasi_material as label', 'satuan', 'harga_satuan')
                             ->get();

        // Return JSON response
        return response()->json($materials);
    }
}
