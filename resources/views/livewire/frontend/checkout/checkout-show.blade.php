<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            @if ($totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Montant total de la commande :
                            <span class="float-end">{{ $totalProductAmount }} Dhs</span>
                        </h4>
                        <hr>
                        <small>* Les articles seront livrés dans un délai de 3 à 5 jours.</small>
                        <br/>
                        <small>* Les taxes et autres frais sont-ils inclus ?</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Informations de base
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nom complet</label>
                                <input type="text" wire:model.defer="fullname" class="form-control" placeholder="Entrez votre nom complet" />
                                @error('fullname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Numéro de téléphone</label>
                                <input type="number" wire:model.defer="phone" class="form-control" placeholder="Entrez votre numéro de téléphone" />
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Adresse e-mail</label>
                                <input type="email" wire:model.defer="email" class="form-control" placeholder="Entrez votre adresse e-mail" />
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Code postal</label>
                                <input type="number" wire:model.defer="pincode" class="form-control" placeholder="Entrez votre code postal" />
                                @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Adresse complète</label>
                                <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Mode de paiement :</label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Paiement à la livraison</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Paiement en ligne</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Mode de paiement à la livraison</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click='codOrder' class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Passer la commande (Paiement à la livraison)
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                    Passage de la commande
                                                </span>
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Mode de paiement en ligne</h6>
                                            <hr/>
                                            <button wire:loading.attr="disabled" type="button" class="btn btn-warning">Payer maintenant (Paiement en ligne)</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @else
            <div class="card card-body shadow text-center p-md-5">
                <h4>Aucun article dans le panier pour effectuer la commande</h4>
                <a href="{{ url('collections') }}" class="btn btn-warning">Acheter maintenant</a>
            </div>
        @endif
    </div>
</div>

</div>
