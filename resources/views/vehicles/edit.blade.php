@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edição de registro') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @guest
                    <p>É preciso estar logado para editar um registro.</p>

                    @else
                    <form action="{{route('vehicles.update', $vehicle->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputModel">Modelo</label>
                            <input type="text" class="form-control" name="model" id="inputModel" value="{{$vehicle->model}}">
                        </div>
                        <div class="form-group">
                            <label for="inputYear">Ano</label>
                            <input type="text" class="form-control" name="year" id="inputYear" value="{{$vehicle->year}}">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Preço diário</label>
                            <input type="text" class="form-control" name="day_price" id="inputPrice" value="{{$vehicle->day_price}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Editar regitro</button>
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection