@extends('layouts.app')

@section('content')

@section('content')
<div class="container box">
    <h3 align="center">How Send an Email in Laravel</h3><br />
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form method="post" action="{{url('sendemail/send')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Enter Your Name</label>
            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" class="form-control" value="" />
        </div>
        <div class="form-group">
            <label>Enter Your Email</label>
            <input type="text" name="email"  class="form-control @error('email') is-invalid @enderror" value="" />
        </div>
        <div class="form-group">
            <label>Enter Your Message</label>
            <textarea name="message" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="send" class="btn btn-info" value="Send" />
        </div>
    </form>

</div>
</body>

@endsection
