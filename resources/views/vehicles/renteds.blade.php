<?php

use Illuminate\Support\Facades\Auth;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">{{ __('Veículos alugados por você') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container-fluid d-flex justify-content-around">
                        @guest
                        <p>É preciso estar logado para ver seus veículos.</p>

                        @else

                        @foreach ($vehicles as $vehicle)
                        <?php
                        if ($vehicle->client_id == Auth::id()) { ?>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('/storage/vehicles/'.$vehicle->image_path) }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$vehicle->model}}</h5>
                                    <p class="card-text">Ano: {{$vehicle->year}}</p>
                                    <p class="card-text">Proprietário: {{$vehicle->name}}</p>
                                    <p class="card-text">Disponível: {{$vehicle->available === 1 ? 'sim' : 'não'}}</p>
                                    <h5 class="card-title">Preço por dia: R$ {{$vehicle->day_price}}</h5>
                                    <form action="{{route('rents.destroy', $vehicle->rent_id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-success">Devolver</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>

                        @endforeach

                        @endguest
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection