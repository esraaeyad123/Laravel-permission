@extends('layouts.app')

@section('content')

@section('content')
    <div>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class="notification is-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">post</div>
<br>

                <form action= "{{route('post.store')}}"    method="post" enctype="multipart/form-data">{{ csrf_field() }}
                    <div class="form-group">
                    <input name="title"  class="form-control @error('title') is-invalid @enderror" value="{{ old('title')}}"  name="title">
                    </div>
                    <br>
                    <div class="form-group">
            <textarea  id="description"  class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description')}}</textarea>

                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="btn btn-info" value="Send" />
                    </div>
                    <div></div>
                </form>
        </div>
    </div>


            </div>
        </div>
    </div>
</div>
@endsection
