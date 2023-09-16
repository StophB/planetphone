@extends('layouts.app')

@section('title','Thank You for shopping')

@section('content')

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if (session('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                    <h2 class="text-primary">PanetPhone</h2>
                    <h4>Merci d'avoir acheté chez PlanetPhone</h4>
                    <a href="{{ url('collections') }}" class="btn btn-primary">Faire du shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
