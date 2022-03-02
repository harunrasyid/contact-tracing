@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <form action="/mahasiswa/{{auth()->user()->id}}/postPemRutin" method="POST">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Tidak Ada Data Pemantauan Rutin</h3>
                            </div>
                            <div class="panel-body">
                                <a href="/mahasiswa/id/surveipemantauan">Kembali</a>
                            </div>        
                        </div>                
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection