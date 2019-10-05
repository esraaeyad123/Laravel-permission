@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show description</div>

                <div class="card-body">

                   <p id="description" name="description">{{ $description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
