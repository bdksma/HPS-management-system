<?php

namespace App\Http\Controllers;

use App\Models\upah;
use Illuminate\Http\Request;

class upahController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        // Mengambil semua data alat dengan pagination
        $posts = Upah::where('jenis_upah', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('id', 'LIKE', '%'.$keyword.'%')->paginate(20);
        
        // Render view dengan data alat
        return view('upah.index', compact('posts'));
    }

    public function show(Request $request)
    {
        // Retrieve the keyword from the request
        $keyword = $request->input('keyword');

        // Search for alat based on the specification and paginate the results
        $posts = Upah::where('jenis_upah', 'like', '%'.$keyword.'%')->paginate(25);

        // Render view with search results
        return view('upah.index', compact('posts'));
    }

    public function create()
    {
        return view('upah.create');
    }

    public function store(Request $request)
        {
            // Validate form
            $this->validate($request, [
                'jenis_upah'          => 'nullable|string|min:5',
                'keterangan'  => 'nullable|string|min:10',
                'satuan_persentase_utb'            => 'nullable|string',
                'upah'      => 'nullable|numeric'
            ]);

            // Simpan data dari request
        $upah = new Upah([
            'jenis_upah'          => $request->jenis_upah,
            'keterangan'  => $request->keterangan,
            'satuan_persentase_utb'            => $request->satuan_persentase_utb,
            'upah'      => $request->upah
        ]);

        // Simpan data ke database
        $upah->save();

        // Redirect to index dengan memberikan parameter 'keyword'
        return redirect()->route('upah.index', ['keyword' => $request->jenis_upah])->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit(Request $request, $id)
    {
        $upah = Upah::findOrFail($id);
        return view('upah.edit', ['upah'=>$upah]);
    }
    
    public function update(Request $request, $id)
    {
        $upah = Upah::findOrFail($id);
        $upah->update($request->all());
        return redirect('/upah');
    }

    public function destroy(Upah $upah)
    {
        if ($upah) 
        {
            $upah->delete();
            return redirect('/upah');
        }
    }

    public function search(Request $request)
    {
        // Tangkap data pencarian
        $search = $request->search;

        // Ambil data alat sesuai pencarian
        $alat = Upah::where('jenis_upah', 'like', "%$search%")->paginate(10);

        // Kirim data alat ke view index
        return view('upah.index', compact('upah'));
    }
}
