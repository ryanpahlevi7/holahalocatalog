@extends('admin.layout.master')

@section('active_lihat_produk','active')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Produk
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lihat Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- box header -->
            <div class="box-header">
              <h3 class="box-tittle">
                <form class="form-inline" action="{{route('cariProduk')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                      <option value="">--- Cari Berdasarkan Kategori ---</option>
                      @foreach($kategori as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Cari</button>
                </form>
              </h3>
            </div>
            <!-- /box header -->

          </div>
        </div> 
        <!-- card -->
        
              @foreach($produk as $data)
              <div class="col-sm-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{URL::asset('storage/images/245/'.$data->foto)}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$data->nama}}</h5>
                  <p class="card-text">{{$data->deskripsi}}</p>
                  <a href="#" class="btn btn-primary">Detail</a>
                </div>
              </div>
              </div>
              @endforeach
             
              <!-- .End Card -->    
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




@endsection
