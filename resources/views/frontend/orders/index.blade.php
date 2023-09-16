@extends('layouts.app')

@section('title','My Orders')

@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4"> Mes commandes </h4>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordred table-striped">
                            <thead>
                                <th>ID de la commande</th>
                                <th>Numéro de suivi</th>
                                <th>Nom d'utilisateur</th>
                                <th>Mode de paiement</th>
                                <th>Date de commande</th>
                                <th>Message d'état</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->tracking_no }}</td>
                                        <td>{{ $order->fullname }}</td>
                                        <td>{{ $order->payment_mode }}</td>
                                        <td>{{ $order->created_at->format('d-m-y') }}</td>
                                        <td>{{ $order->status_message }}</td>
                                        <td><a href="{{ url('orders/'.$order->id) }}" class="btn btn-primary btn-sm">Voir</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Aucune commande disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
