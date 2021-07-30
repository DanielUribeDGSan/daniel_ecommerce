<div x-data>
    <div class="product-details-action-wrap mt-3">
        <div class="product-quality" wire:loading.remove>
            <button class="dec qtybutton" disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement" style="border: none;
    background: transparent;
    margin: 0px;
    padding: 0px;
    color: #8f8f8f;">-</button>
            <input class="cart-plus-minus-box input-text " name="qtybutton" value="{{ $qty }}" readonly>
            <button class="inc qtybutton" x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                wire:target="increment" wire:click="increment" style="border: none;
    background: transparent;
    margin: 0px;
    padding: 0px;
    color: #8f8f8f;">+</button>
        </div>
        <div class="single-product-cart btn-hover" wire:loading.remove>
            <button wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem">Agregar al carrito</button>
        </div>
        <div wire:loading>
            <x-loading-cart />
        </div>
        <div class="single-product-wishlist" wire:loading.remove>
            <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
        </div>
        <div class="single-product-compare" wire:loading.remove>
            <a title="Compare" href="#"><i class="pe-7s-shuffle"></i></a>
        </div>
    </div>
</div>
