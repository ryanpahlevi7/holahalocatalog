<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Detail;
use Carbon\Carbon;
use Image;
use File;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        //mendefinisikan path
        $this->path = storage_path('app/public/images');
        //mendefinisikan ukuran foto
        $this->dimensions = ['245', '300', '500'];
    }

    //menampilkan tampilan awal produk
    public function index()
    {
        $produk = Produk::orderBy('id', 'desc')
                        ->get();
        
        return view('admin.produk.main_produk',['produk'=>$produk]);
    }

    public function addProduk(Request $request)
    {
        //role dari sebuat inputan
        $role = [
            'nama'      => 'required|max:255',
            'foto'     => 'required|image|mimes:jpg,png,jpeg',
            'deskripsi' => 'required',
        ];

        //pesan error
        $message = [
            'nama.required'         => 'Nama Produk tidak boleh kosong',
            'nama.max'              => 'Maksimal panjang karakter Nama Produk 255 karakter',
            'foto.required'        => 'Foto tidak boleh kosong',
            'foto.image'           => 'File yang di upload harus berupa foto dengan extensi jpg,png,jpeg',
            'foto.mimes'           => 'File yang di upload harus berupa foto dengan extensi jpg,png,jpeg',
            'deskripsi.required'    => 'Dedskripsi tidak boleh kosong',
        ];

        //proses melakukan validasi form
        $this->validate($request,$role,$message);

        //jika folder belum ada
        if (!File::isDirectory($this->path)) {
            // maka folder akan dibuat
            File::makeDirectory($this->path);
        }

        //mengambil foto dalam form
        $file = $request->file('foto');
        
        //membuat file nama foto dengan kompbinasi nama asli dengan string random 8 karakter
        //contoh  zara_tas_selempang_gCk0t873.jpg
        $nama_foto = str_replace('.jpg','',$request->nama);
        $nama_slug = str_replace(' ','_',$nama_foto);
        $fileName = $nama_slug. '_' .Str::random(8). '.' . $file->getClientOriginalExtension();
        // .end membuat file nama foto

        //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
        Image::make($file)->save($this->path . '/' . $fileName);

        //looping array dimensi yang diinginkan
        //yang telah didefinisikan pada kontruktor
        foreach ($this->dimensions as $row) {
            //membuat canvas image dari ukuran yang ada du konstruktor
            $canvas = Image::canvas($row, $row);
            //resize image sesuai yang ada id array
            //dengan mempertahankan ratio
            $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });
			
            //cek jika foldernya tidak ada
            if (!File::isDirectory($this->path . '/' . $row)) {
                //maka buat folder dengan nama dimensi
                File::makeDirectory($this->path . '/' . $row);
            }
        	
            //memasukkan image yang telah di resize kedalam cavas
            $canvas->insert($resizeImage, 'center');
            //simpan image kedalam masing-masing folder
            $canvas->save($this->path . '/' . $row . '/' . $fileName);
        } // /end foreach

        //simpan data ke dalam database
        Produk::create([
            'nama' => $request->nama,
            'foto' => $fileName,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('msg', 'Produk Berhasil Ditambbahkan');
    }

    //manampilkan view edit kategori
    public function editProduk($id){
        $produk = Produk::find($id);
        
        return view('admin.produk.update_produk',['produk'=>$produk]);
    }

    public function updateProduk(Request $request)
    {
        if($request->foto == null){
            //role dari sebuat inputan
            $role = [
                'nama'      => 'required|max:255',
                'deskripsi' => 'required',
            ];

            //pesan error
            $message = [
                'nama.required'         => 'Nama Kategori tidak boleh kosong',
                'nama.max'              => 'Maksimal panjang karakter Nama Kategori 255 karakter',
                'deskripsi.required'    => 'Nama Kategori tidak boleh kosong',
            ];

            //proses melakukan validasi form
            $this->validate($request,$role,$message);

            //mengubah nama Kategori
            Produk::where('id',$request->id)
                    ->update([
                                'nama'=>$request->nama,
                                'deskripsi'=>$request->deskripsi,
                            ]);
            
            //mengambil semua data
            $produk = Produk::orderBy('id', 'desc')
                                ->get();
            
            //pesan berhasil dirubah
            session()->flash('msg', 'Produk Berhasil Diubah');

            return view('admin.produk.main_produk', ['produk'=>$produk]);
        }else{
            //role dari sebuat inputan
            $role = [
                'nama'      => 'required|max:255',
                'foto'     => 'required|image|mimes:jpg,png,jpeg',
                'deskripsi' => 'required',
            ];

            //pesan error
            $message = [
                'nama.required'         => 'Nama Produk tidak boleh kosong',
                'nama.max'              => 'Maksimal panjang karakter Nama Produk 255 karakter',
                'foto.required'        => 'Foto tidak boleh kosong',
                'foto.image'           => 'File yang di upload harus berupa foto dengan extensi jpg,png,jpeg',
                'foto.mimes'           => 'File yang di upload harus berupa foto dengan extensi jpg,png,jpeg',
                'deskripsi.required'    => 'Dedskripsi tidak boleh kosong',
            ];

            //proses melakukan validasi form
            $this->validate($request,$role,$message);

            //jika folder belum ada
            if (!File::isDirectory($this->path)) {
                // maka folder akan dibuat
                File::makeDirectory($this->path);
            }

            //mengambil foto dalam form
            $file = $request->file('foto');
            
            //membuat file nama foto dengan kompbinasi nama asli dengan string random 8 karakter
            //contoh  zara_tas_selempang_gCk0t873.jpg
            $nama_foto = str_replace('.jpg','',$request->nama);
            $nama_slug = str_replace(' ','_',$nama_foto);
            $fileName = $nama_slug. '_' .Str::random(8). '.' . $file->getClientOriginalExtension();
            // .end membuat file nama foto

            //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
            Image::make($file)->save($this->path . '/' . $fileName);

            //looping array dimensi yang diinginkan
            //yang telah didefinisikan pada kontruktor
            foreach ($this->dimensions as $row) {
                //membuat canvas image dari ukuran yang ada du konstruktor
                $canvas = Image::canvas($row, $row);
                //resize image sesuai yang ada id array
                //dengan mempertahankan ratio
                $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                    $constraint->aspectRatio();
                });
                
                //cek jika foldernya tidak ada
                if (!File::isDirectory($this->path . '/' . $row)) {
                    //maka buat folder dengan nama dimensi
                    File::makeDirectory($this->path . '/' . $row);
                }
                
                //memasukkan image yang telah di resize kedalam cavas
                $canvas->insert($resizeImage, 'center');
                //simpan image kedalam masing-masing folder
                $canvas->save($this->path . '/' . $row . '/' . $fileName);
            } // /end foreach

            //mengubah nama Kategori
            Produk::where('id',$request->id)
                    ->update([
                                'nama'=>$request->nama,
                                'foto'=>$fileName,
                                'deskripsi'=>$request->deskripsi,
                            ]);
            
            //mengambil semua data
            $produk = Produk::orderBy('id', 'desc')
                                ->get();
            
            //pesan berhasil dirubah
            session()->flash('msg', 'Produk Berhasil Diubah');

            return view('admin.produk.main_produk', ['produk'=>$produk]);
        }
    }

    //menghapus katogori
    public function hapusProduk($id){
        //mengahpus kategori
        Produk::where('id', '=', $id)->delete();
            
        //mengambil semua data
        $produk = Produk::orderBy('id', 'desc')
                            ->get();
        
        //pesan berhasil dirubah
        session()->flash('msg', 'Produk Berhasil Dihapus');
        
        return view('admin.produk.main_produk', ['produk'=>$produk]);
    }

    public function tampilKategori($id, $nama)
    {
        // ambil data kategori
        $kategori = Kategori::get();

        //mencari produk
        $produk = Produk::select('produk.id as id_produk','detail.id as id_detail','kategori.nama as nama_kategori')
                        ->join('detail','detail.produk_id','=','produk.id')
                        ->join('kategori','detail.kategori_id','=','kategori.id')
                        ->where('produk.id','=',$id)
                        ->get();
        
        return view('admin.produk.tambah_kategori', ['produk'=>$produk,'nama'=>$nama,'kategori'=>$kategori,'id'=>$id]);

    }

    public function tambahKategori(Request $request)
    {
        //role dari sebuat inputan
        $role = [
            'id_kategori'      => 'required',
        ];

        //pesan error
        $message = [
            'id_kategori.required'         => 'Kategori tidak boleh kosong',
        ];

        //proses melakukan validasi form
        $this->validate($request,$role,$message);

        //simpan data ke dalam database
        Detail::create([
            'produk_id'     => $request->id_produk,
            'kategori_id'   => $request->id_kategori,
        ]);

        return back()->with('msg', 'Kategori Produk Berhasil Ditambbahkan');
    }

    public function hapusKategoriProduk($id)
    {
        //mengahpus kategori
        Detail::where('id', '=', $id)->delete();

        return back()->with('msg', 'Kategori Produk Berhasil dihapus');
    }
}
