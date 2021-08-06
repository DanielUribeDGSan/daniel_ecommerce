<div x-data>
    @if ($product_clean == 1)
        <x-product-no-disponible />
    @endif
    <div class="product-quality" wire:loading.remove>
        <button class="dec qtybutton" disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
            wire:target="decrement" wire:click="decrement" type="button">-</button>
        <input class="cart-plus-minus-box input-text " name="qtybutton" value="{{ $qty }}" readonly>
        <button class="inc qtybutton" x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
            wire:target="increment" wire:click="increment" type="button">+</button>
    </div>
    <div wire:loading>
        <x-loading-add-cart />
    </div>
</div>
