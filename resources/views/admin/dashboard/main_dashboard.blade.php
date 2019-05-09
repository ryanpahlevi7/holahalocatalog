@extends('admin.layout.master')

@section('active_dashboard','active')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- callout -->
      <div class="callout callout-info">
        <h4>Selamat Datang {{Auth::user()->name}}</h4>
        <p>Untuk menggunakan web ini harap diperhatikan bagian-bagian dari inti yang perlu dipersiapkan sebelumnya sebelum digunakan.</p>
      </div>
      <!-- ./callout -->

      <!-- box -->
      <div class="box">
        <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-tittle">Penting !!</h3>
          <div class="box-tools pull-right">
            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- ./box header -->
        <div style="display:block;" class="box-body">
          Data penting yang perlu disiapkan antar lain :
          <ul>
            <li>1. Data Katerogi</li>
            <li>2. Data Produk</li>
        </div>
      </div>
      <!-- ./box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection