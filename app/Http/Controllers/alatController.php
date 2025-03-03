<?php

namespace App\Http\Controllers;

use App\Models\alat;
use Illuminate\Http\Request;
#use Illuminate\Support\Facades\Storage;


class alatController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        // Mengambil semua data alat dengan pagination
        $posts = Alat::where('spesifikasi_alat', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('update_tahun', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('id', 'LIKE', '%'.$keyword.'%')->paginate(20);
        
        // Render view dengan data alat
        return view('alat.index', compact('posts'));
    }

public function show(Request $request)
{
    // Retrieve the keyword from the request
    $keyword = $request->input('keyword');

    // Search for alat based on the specification and paginate the results
    $posts = Alat::where('spesifikasi_alat', 'like', '%'.$keyword.'%')->paginate(25);

    // Render view with search results
    return view('alat.index', compact('posts'));
}




public function create()
{
    return view('alat.create');
}




    /**
     * create
     *
     * @return void
     */
        public function store(Request $request)
        {
            // Validate form
            $this->validate($request, [
                'kategori'          => 'nullable|string|min:5',
                'spesifikasi_alat'  => 'nullable|string|min:10',
                'satuan'            => 'nullable|string',
                'harga_satuan'      => 'nullable|numeric', // Changed to numeric for decimal values
                'update_tahun'      => 'nullable|string',
                'sumber'            => 'nullable|string',
                'link'              => 'nullable|url'
            ]);

            // Simpan data dari request
        $alat = new Alat([
            'kategori'          => $request->kategori,
            'spesifikasi_alat'  => $request->spesifikasi_alat,
            'satuan'            => $request->satuan,
            'harga_satuan'      => $request->harga_satuan,
            'update_tahun'      => $request->update_tahun,
            'sumber'            => $request->sumber,
            'link'              => $request->link
        ]);

        // Simpan data ke database
        $alat->save();

        // Redirect to index dengan memberikan parameter 'keyword'
        return redirect()->route('alat.index', ['keyword' => $request->kategori])->with(['success' => 'Data Berhasil Disimpan!']);

        }

    
    /**
         * edit
         *
         * @param  mixed $post
         * @return void
         */
        // Di dalam metode pengontrol
        public function edit(Request $request, $id)
        {
            $alat = Alat::findOrFail($id);
            return view('alat.edit', ['alat'=>$alat]);
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
            $alat = Alat::findOrFail($id);
            
            $alat->update($request->all());

            return redirect('/alat');

        }

            /**
             * destroy
             *
             * @param  mixed $post
             * @return void
             */
        public function destroy(Alat $alat)
        {
            // Periksa apakah entitas ditemukan sebelum dihapus
            if ($alat) 
            {
                // Hapus entitas
                $alat->delete();
                
                // Redirect ke halaman indeks dengan pesan sukses jika berhasil
                return redirect('/alat');
            }
        }


        public function search(Request $request)
        {
            // Tangkap data pencarian
            $search = $request->search;

            // Ambil data alat sesuai pencarian
            $alat = Alat::where('spesifikasi_alat', 'like', "%$search%")->paginate(10);

            // Kirim data alat ke view index
            return view('alat.index', compact('alat'));
        }
}
