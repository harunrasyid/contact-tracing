@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($notifications as $notification)
                            <div class="panel">
                                @if($notification->type == 'App\Notifications\VerifikasiLaporan')
                                    <div class="panel-heading">
                                        <h3>[{{$notification->created_at}}] {{$notification->data['title']}}</h3>
                                    </div>

                                    <div class="panel-body">
                                        <p>{{$notification->data['pesan']}}</p>
                                    </div>
                                @endif

                                @if($notification->type == 'App\Notifications\notifikasiAwalKontak')
                                    <div class="panel-heading">
                                        <h3>[{{$notification->created_at}}] {{$notification->data['title']}}</h3>
                                    </div>

                                    <div class="panel-body">
                                        <p style="margin-bottom: 20px;">{{$notification->data['pesan']}}</p>

                                        <h4><b>Tanggal Kontak</b></h4>
                                        <p style="margin-bottom: 20px;">{{$notification->data['tanggal kontak']}}</p>

                                        <h4><b>Waktu Kontak</b></h4>
                                        <p style="margin-bottom: 20px;">{{$notification->data['waktu kontak']}} WIB</p>

                                        <h4><b>Lokasi Kontak</b></h4>
                                        <p style="margin-bottom: 20px;">{{$notification->data['ruangan']}}</p>
                                    </div>
                                @endif
                   
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection