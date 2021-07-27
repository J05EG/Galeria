@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Galeria') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido a su galeria') }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="card-columns">
                @foreach ($files as $file)
                    <div class="card">
                        <img class="card-img-top" src="{{asset($file->url)}}">
                    </div>
                @endforeach
            </div>
            {{$files->links()}}
        </div>
    </div>
</div>
@endsection
