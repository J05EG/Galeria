@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($files as $file)
            <div class="col-4">
                <div class="card">
                    <img src="{{asset($file->url)}}" alt="" class="img-fluid">
                    <div class="card-footer">
                        <form action="{{route('files.destroy', $file)}}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <br>
        <div class="col-12">
            {{$files->links()}}
        </div>
    </div>
</div>
@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado.',
                'Tu imagen ha sido eliminada',
                'OK'
            )
        </script>
    @endif

@endsection