<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">Cambiar estado del producto</h4>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="saveStatus">
            <div class="form-group mb-0">
                <label class="radio-inline mr-3"><input type="radio" name="status" wire:model.defer="status" value="1">
                    Borrador</label>
                <label class="radio-inline mr-3"><input type="radio" name="status" wire:model.defer="status" value="2">
                    Publicado</label>
                <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled">Cambiar</button>
                <div wire:loading wire:target="saveStatus"
                    wire:loading.class="d-flex align-items-center justify-content-center">
                    <x-loading />
                </div>

            </div>
        </form>

    </div>
</div>
