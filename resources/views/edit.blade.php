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

    <div class="notification is-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
    <form method="get"  enctype="multipart/form-data" action="{{route('post.update', $Details->id) }}"  >
        {{ csrf_field() }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">post</div>


                    <textarea id="title"  class="form-control @error('title') is-invalid @enderror"  name="title">{{ $Details->title }}</textarea>
                    <textarea id="description"  class="form-control @error('description') is-invalid @enderror"  name="description">{{ $Details->description }}</textarea>
                    <input type="submit">
                </div>

            </div>
        </div>
    </div>
    </div>
    </form>
@endsection

