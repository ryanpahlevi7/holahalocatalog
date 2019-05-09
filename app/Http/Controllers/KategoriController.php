<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Detail;

class KategoriController extends Controller
{
    //penggil tampilan awal katogori
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')
                            ->get();
        
        return view('admin.kategori.main_kategori',['kategori'=>$kategori]);
    }

    //tambah kategori
    public function addKategori(Request $request){

        //role dari sebuat inputan
        $role = [
            'nama' => 'required|max:255',
        ];

        //pesan error
        $message = [
            'nama.required' => 'Nama Kategori tidak boleh kosong',
            'nama.max'      => 'Maksimal panjang karakter Nama Kategori 255 karakter',
        ];

        //proses melakukan validasi form
        $this->validate($request,$role,$message);
  
          //input data ke dalam database
          Kategori::create([
              'nama' => $request->nama,
          ]);
  
          return back()->with('msg', 'Kategori Berhasil Ditambbahkan');
    }

    //manampilkan view edit kategori
    public function editKategori($id){
        $kategori = Kategori::find($id);
        
        return view('admin.kategori.update_kategori',['kategori'=>$kategori]);
    }
    
    //menyimpan update kategori
    public function updateKategori(Request $request){
         //role dari sebuat inputan
         $role = [
            'nama' => 'required|max:255',
            'id' => 'required',
        ];

        //pesan error
        $message = [
            'nama.required' => 'Nama Kategori tidak boleh kosong',
            'nama.max' => 'Maksimal panjang karakter Kategori 255 karakter',
            'id.required' => 'Id Kategori tidak boleh kosong',
        ];

        //proses melakukan validasi form
        $this->validate($request,$role,$message);

        //mengubah nama Kategori
        Kategori::where('id',$request->id)
            ->update([
                'nama'=>$request->nama,
            ]);
        
        //mengambil semua data
        $kategori = Kategori::orderBy('id', 'desc')
                            ->get();
        
        //pesan berhasil dirubah
        session()->flash('msg', 'Kategori Berhasil Diubah');

        return view('admin.kategori.main_kategori', ['kategori'=>$kategori]);
    }

    //menghapus katogori
    public function hapusKategori($id){
        //mengahpus kategori
        Kategori::where('id', '=', $id)->delete();
            
        //mengambil semua data
        $kategori = Kategori::orderBy('id', 'desc')
                            ->get();
        
        //pesan berhasil dirubah
        session()->flash('msg', 'Kategori Berhasil Dihapus');
        
        return view('admin.kategori.main_kategori', ['kategori'=>$kategori]);
    }

}
