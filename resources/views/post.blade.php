@extends('layouts.app')

@section('content')

    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif

    <div class="col-md-6 offset-md-2">
        @if( session('status'))
            <div class="alert alert-info">
                {{ session('status')}}
            </div>
        @endif
    </div>

    <div class="container">
<div class="row">

            <div class="col-md-6 offset-md-2">
                <form action= "{{route('search')}}"   method="POST">
                    @csrf
                    <input type="text" name="q" id="q" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2"> Search</button>
                </form>
            </div>
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post
                        @role('writer')
                        <a class="float-right" href="{{route('post.create')}}">new</a>
                        @endrole
                    </div>

                    <div class="card-body">
                        @foreach($allpost as $post)
                      <ul>
                 <li>
                     <a href="{{route('showdescription',$post->id)}}">{{$post->title}}</a>

                     @can('edit post')
                     <a class="float-right btn btn-primary btn-mini"href="{{route('post.edit',$post->id)}}">edit</a>
                      @endcan
                     @can('delete post')
                     <a class="float-right btn btn-danger btn-mini " href="{{route('delete',$post->id)}}">delete</a>
                     @endcan
                 </li>
                      </ul>

@endforeach



                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
