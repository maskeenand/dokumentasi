<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratmasuk = SuratMasuk::all();

                return view ('suratmasuk.index',compact(['suratmasuk']));
    }

    public function create()
    {
        return view('suratmasuk.create');
    }

    public function store(Request $request)
    {

        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file'),$data_nama);


        SuratMasuk::create([
            'no_surat' => $request->txtnosurat,
            'jenis_surat' => $request->txtjenissurat,
            'tgl_surat' => $request->tglsurat,
            'tgl_terima' => $request->tglditerima,
            'dari' => $request->txtdari,
            'perihal' => $request->txtperihal,
            'file_surat' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/suratmasuk');
    }
}
