@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Subir imagenes</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" id="" accept="image/*"><br>
                                @error('file')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Subir imagen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection