@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">

                <!-- FITUR 1 -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/admin/{{auth()->user()->id}}/editakun">
                        <i class="fas fa-cog fa-7x"></i>
                        <h4>Pengaturan Admin</h4>  
                    </a>
                </div>
                
                <!-- FITUR 2 -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/admin/akunPengguna">
                        <i class="fas fa-list fa-7x"></i>
                        <h4>Pengaturan Akun Pengguna</h4>  
                    </a>
                </div>

                <!-- FITUR 2 -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/admin/posts">
                        <i class="fas fa-newspaper fa-7x"></i>
                        <h4>Manajemen Informasi</h4>  
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection