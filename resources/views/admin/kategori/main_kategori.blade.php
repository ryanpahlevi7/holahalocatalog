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
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- Messasge -->
            @if (session('msg'))
            <br>
            <div class="alert alert-success alert-dismissible fade in">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <p>{!!session('msg')!!} </p>
            </div>
            @endif @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
                @endforeach
              </ul>
            </div>
            @endif
            <!-- /end Massage -->

            <!-- box header -->
            <div class="box-header">
              <h3 class="box-tittle">Daftar Kategori <a class="btn btn-success btn-flat btn-sm" id="tambahPengguna" title="Tambah">
              <i class="fa fa-plus"></i></a></h3>
            </div>
            <!-- /box header -->

            <div class="box-body table-responsive">
              <table id="myTable" class="table table-striped table-bordered" style="width:50%">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Nama Kategori</th>
                  <th style="text-align:center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1;?>
                  @foreach($kategori as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->nama}}</td>
                      <td style="text-align:center">
                          <a href="{{route('editKategori',['id'=>$data->id])}}"><span class="text-align: center"label label-info>
                          <i class="fa fa-pencil">Update</i></span></a>
                          <a href="{{route('hapusKategori',['id'=>$data->id])}}" onclick="return confirm('Apakah anda yakin ingin menghapus kategori {{$data->nama}}?')"><span class="text-align: center"label label-info>
                          <i class="fa fa-trash">Hapus</i></span></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" arial-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title" id="myModalLabel">Kategori - Tambah</h4>
      </div>
      <div class="modal-body">
        <form id="formPengguna" class="form-horizontal" role="form" method="POST" action="{{route('addKategori')}}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-4 control-label">Nama Kategori</label>
            <div class="col-md-6"><input type="text" class="form-control" name="nama"><small class="help-block"></small></div>
            <p style="color:red">* wajib diisi</p>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary" id="button-reg">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- / End Modal -->

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  $(function(){
    $('#tambahPengguna').click(function(){
      $('#myModal').modal('show');
    })
  });
</script>

@endsection
