@extends('layouts.app')

@section('title','My Order Details')

@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">

                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> Détails de ma commande
                        <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Retour</a>
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Détails de la commande</h5>
                            <hr>
                            <h6>ID de la commande : {{ $order->id }}</h6>
                            <h6>Numéro de suivi : {{ $order->tracking_no }}</h6>
                            <h6>Date de commande : {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Mode de paiement : {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Message d'état de la commande : <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>Détails de l'utilisateur</h5>
                            <hr>
                            <h6>Nom complet : {{ $order->fullname }}</h6>
                            <h6>Email : {{ $order->email }}</h6>
                            <h6>Téléphone : {{ $order->phone }}</h6>
                            <h6>Adresse : {{ $order->address }}</h6>
                            <h6>Code postal : {{ $order->pincode }}</h6>
                        </div>
                    </div>

                    <br>
                    <h5>Articles de la commande</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordred table-striped">
                            <thead>
                                <th>ID de l'article</th>
                                <th>Image</th>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $orderItem)
                                <tr>
                                    <td with='10%'>{{ $orderItem->id }}</td>
                                    <td with='10%'>
                                        @if ($orderItem->product->productImages)
                                            <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                            style="width: 50px; height: 50px" alt="">
                                        @else
                                            <img src="" style="width: 50px; height: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $orderItem->product->name }}
                                        @if ($orderItem->productColor)
                                            @if ($orderItem->productColor->color)
                                                <span>- Couleur : {{ $orderItem->productColor->color->name }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td with='10%'>{{ $orderItem->price }} Dhs</td>
                                    <td with='10%'>{{ $orderItem->quantity }}</td>
                                    <td with='10%' class="fw-bold">{{ $orderItem->quantity * $orderItem->price }} Dhs</td>
                                    @php
                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                    @endphp
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Montant total :</td>
                                    <td colspan="1" class="fw-bold">{{ $totalPrice }} Dhs</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
