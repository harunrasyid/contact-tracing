@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($posts as $post)
                            <div class="panel">

                                <div class="panel-heading">
                                    <a href="/show-posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
                                    <h5>Dipublikasikan {{ date('d-m-Y',strtotime($post->created_at)) }}</h5>      
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

