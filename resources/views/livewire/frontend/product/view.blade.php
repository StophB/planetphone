<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages)
                        <div class="exzoom" id="exzoom">

                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                  @foreach ($product->productImages as $imgItem)
                                      <li><img src="{{ asset($imgItem->image) }}"/></li>
                                  @endforeach
                                </ul>
                              </div>

                              <div class="exzoom_nav"></div>
                              <p class="exzoom_btn">
                                  <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                  <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                              </p>
                          </div>
                          @else
                              No Image Added
                          @endif
                      </div>
                  </div>
                  <div class="col-md-7 mt-3">
                      <div class="product-view">
                          <h4 class="product-name">
                              {{ $product->name }}
                          </h4>
                          <hr>
                          <p class="product-path">
                              Accueil / {{ $product->category->name }} / {{ $product->name }}
                          </p>
                          <div>
                              <span class="selling-price">{{ $product->selling_price }}Dhs</span>
                              <span class="original-price">{{ $product->original_price }}Dhs</span>
                          </div>
                          <div>
                              @if ($product->productColors->count() > 0)

                                  @if ($product->productColors)
                                      @foreach ($product->productColors as $color)
                                          <label class="colorSelectionLabel"
                                              wire:click="colorSelected({{ $color->id }})">
                                              {{  $color->color->name }}
                                          </label>
                                      @endforeach
                                  @endif

                              <div>
                                  @if ($this->productColorSelectedQuantity == 'outOfStock')
                                      <label class="btn-sm py-1 mt-2 text-white bg-danger">Rupture de stock</label>
                                  @elseif($this->productColorSelectedQuantity > 0)
                                      <label class="btn-sm py-1 mt-2 text-white bg-success">En stock</label>
                                  @endif
                              </div>
                              @else
                                  @if ($product->quantity)
                                      <label class="btn-sm py-1 mt-2 text-white bg-success">En stock</label>
                                  @else
                                      <label class="btn-sm py-1 mt-2 text-white bg-danger">Rupture de stock</label>
                                  @endif

                              @endif

                          </div>
                          <div class="mt-2">
                              <div class="input-group">
                                  <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                  <input type="text" wire:modal="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                  <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                              </div>
                          </div>
                          <div class="mt-2">
                              <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                  <i class="fa fa-shopping-cart"></i> Ajouter au panier
                              </button>
                              <button   type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                  <span wire:loading.remove wire:target="addToWishlist" >
                                  <i class="fa fa-heart"></i> Ajouter à la liste de souhaits
                                  </span>
                                  <span wire:loading wire:target="addToWishlist">Ajout en cours...</span>
                              </button>
                          </div>
                          <div class="mt-3">
                              <h5 class="mb-0">Petite description</h5>
                              <p>
                                  {!! $product->small_description !!}
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 mt-3">
                      <div class="card">
                          <div class="card-header bg-white">
                              <h4>Description</h4>
                          </div>
                          <div class="card-body">
                              <div>
                                  {!! $product->description !!}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>

@push('scripts')
<script>
    $(function(){

        $("#exzoom").exzoom({
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            "autoPlay": false,
            "autoPlayTimeout": 2000
        });

    });
</script>
@endpush
