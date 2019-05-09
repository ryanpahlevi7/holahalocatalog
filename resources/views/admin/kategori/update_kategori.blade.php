@extends('admin.layout.master')

@section('active_kategori','active')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-th"></i> Home</a></li>
        <li class="active">Kategori</li>
        <li class="active">Ubdate Kategori</li>
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
            <form method="POST" action="{{route('updateKategori')}}">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Kategori</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" id="inputEmail3" value="{{$kategori->nama}}">
                  <input type="hidden" name="id" value="{{$kategori->id}}">
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