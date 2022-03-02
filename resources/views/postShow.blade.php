@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2> <b>{{$post->title}}</b> </h2>
                                <h5>Dipublikasikan {{ date('d-m-Y',strtotime($post->created_at)) }}</h5>
                            </div>
                            <div class="panel-body">
                                <pre style="font-size:15px;">{{$post->content}}</pre>
                            </div>
                        </div>
                        <h4><a href="/post-index"> <i class="fas fa-arrow-left"></i> Kembali</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

