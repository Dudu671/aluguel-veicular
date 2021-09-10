<?php

use Illuminate\Support\Facades\Auth;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">{{ __('Veículos disponíveis para alugar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container-fluid d-flex justify-content-around">
                        @foreach ($vehicles as $vehicle)
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('/storage/vehicles/'.$vehicle->image_path) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{$vehicle->model}}</h5>
                                <p class="card-text">Ano: {{$vehicle->year}}</p>
                                <p class="card-text">Proprietário: {{$vehicle->name}}</p>
                                <p class="card-text">Disponível: {{$vehicle->available === 1 ? 'sim' : 'não'}}</p>
                                <h5 class="card-title">Preço por dia: R$ {{$vehicle->day_price}}</h5>
                                
                                @guest
                                <span class="badge rounded-pill bg-warning text-dark">É preciso estar logado para alugar um veículo.</span>

                                @else
                                <?php
                                if (Auth::id() != $vehicle->owner_id && $vehicle->available === 1) { ?>
                                    <form action="{{route('rents.new')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                        <input type="hidden" name="client_id" value="<?php echo Auth::id(); ?>">
                                        <button type="submit" class="btn btn-success">Alugar</button>
                                    </form>
                                <?php }
                                if (Auth::id() == $vehicle->owner_id) { ?>
                                    <form action="{{route('vehicles.destroy', $vehicle->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('vehicles.edit', $vehicle->id)}}" class="btn btn-primary">Editar</a>
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                <?php } ?>
                                @endguest

                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection