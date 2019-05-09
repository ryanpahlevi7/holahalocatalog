<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Detail;

class PelangganController extends Controller
{
    public function index()
    {
        $produk = Produk::get();
        $kategori = Kategori::get();

        return view('welcome',['produk'=>$produk,'kategori'=>$kategori]);
    }

    public function cari(Request $request)
    {
       //validasi ketika user tidak memilih kategori
       if($request->kategori == null){
            $produk = Produk::get();
            $kategori = Kategori::get();

            return view('welcome',['produk'=>$produk,'kategori'=>$kategori]);
        }else{
            $produk = Detail::select('produk.nama','produk.foto','produk.deskripsi')
                            ->join('produk','detail.produk_id','=','produk.id')
                            ->where('detail.kategori_id','=',$request->kategori)
                            ->get();
            $kategori = Kategori::get();
            $hasil_pilih = Kategori::find($request->kategori);
            
            return view('welcome2',['produk'=>$produk,'kategori'=>$kategori,'hasil_pilih'=>$hasil_pilih]);
        }
    }
}
