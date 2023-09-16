@extends('layouts.app')

@section('title','Change Password')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('message'))
                <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="card shadow">
                <div class="card-header">
                    <h4 class="mb-0">Changer le mot de passe
                        <a href="{{ url('profile') }}" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('change-password') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Mot de passe actuel</label>
                            <input type="password" name="current_password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Confirmez le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                        <div class="mb-3 text-end">
                            <hr>
                            <button type="submit" class="btn btn-primary">Mettre à jour le mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
