<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material;


class materialController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        /// Get posts
        $posts = Material::where('spesifikasi_material', 'LIKE', '%'.$keyword.'%')
                ->orderBy('id', 'asc')->paginate(20);
        
        // Render view with posts
        return view('material.index', compact('posts'));
    }

    public function show($id)
    {
        $material = Material::find($id);
        return response()->json($material);
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {
    // Validate form
    $this->validate($request, [
        'kategori'              => 'nullable|string',
        'sub_kategori'          => 'nullable|string',
        'spesifikasi_material'  => 'nullable|string',
        'satuan'                => 'nullable|string',
        'harga_satuan'          => 'nullable|numeric', // Changed to numeric for decimal values
        'tanggal_update'        => 'nullable|string',
        'sumber'                => 'nullable|string',
        'contact_person'        => 'nullable|string',
        'email'                 => 'nullable|string',
        'link_referensi'        => 'nullable|url',
        'nama_perusahaan_toko'  => 'nullable|string',
        'lokasi'                => 'nullable|string'
    ]);

    // Create post
    Material::create([
        'kategori'              => $request->kategori,
        'sub_kategori'          => $request->sub_kategori,
        'spesifikasi_material'  => $request->spesifikasi_material,
        'satuan'                => $request->satuan,
        'harga_satuan'          => $request->harga_satuan, // Changed to numeric for decimal values
        'tanggal_update'        => $request->tanggal_update,
        'sumber'                => $request->sumber,
        'contact_person'        => $request->contact_person,
        'email'                 => $request->email,
        'link_referensi'        => $request->link_referensi,
        'nama_perusahaan_toko'  => $request->nama_perusahaan_toko,
        'lokasi'                => $request->lokasi,
    ]);

    // Redirect to index
    return redirect()->route('material.index')->with(['success' => 'Data Berhasil Disimpan!']);
}


 /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    // Di dalam metode pengontrol

    public function destroy(Material $material)
    {
        // Periksa apakah entitas ditemukan sebelum dihapus
        if ($material) 
        {
            // Hapus entitas
            $material->delete();
            
            return redirect ('/material');
        }
    }

    public function edit(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        return view('material.edit', ['material'=>$material]);
    }

    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->update($request->all());
        return redirect ('/material');
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */  
}
