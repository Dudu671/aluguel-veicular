@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastre um veículo para aluguel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @guest
                    <p>É preciso estar logado para cadastrar um veículo.</p>

                    @else
                    <form action="{{ route('vehicles.new')}}"method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputModel">Modelo</label>
                            <input type="text" class="form-control" name="model" id="inputModel">
                        </div>
                        <div class="form-group">
                            <label for="inputYear">Ano</label>
                            <input type="text" class="form-control" name="year" id="inputYear">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Preço diário</label>
                            <input type="text" class="form-control" name="day_price" id="inputPrice">
                        </div>
                        <div class="form-group">
                            <label for="inputImage">Imagem do veículo</label>
                            <input type="file" class="form-control" name="image" id="inputImage">
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar veículo</button>
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection