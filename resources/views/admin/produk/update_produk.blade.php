@extends('admin.layout.master')

@section('active_produk','active')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produk
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-th"></i> Home</a></li>
        <li class="active">Produk</li>
        <li class="active">Ubdate Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6 ">
          <div class="box">

          <!-- Message -->
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li> {{$error}} </li>
                @endforeach
              </ul>
            </div>
          @endif
          <!-- /end Massage -->

          <div class="box-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('updateProduk')}}" >
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Produk</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" id="inputEmail3" value="{{$produk->nama}}">
                  <input type="hidden" name="id" value="{{$produk->id}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Foto</label>
                <div class="col-sm-8">
                  <img src="{{URL::asset('storage/images/245/'.$produk->foto)}}" >
                  <input type="file" class="file" name="foto">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea class="form-control" name="deskripsi" rows="8">{{$produk->deskripsi}}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>

          </div>
        </div>    
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection