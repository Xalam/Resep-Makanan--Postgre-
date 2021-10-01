<div class="modal-body">
    <div class="p2">
        <div class="form-group">
            <input type="text" name="name" id="ingredients-name" class="form-control" placeholder="Bahan"
                value="{{ $ingredients->ingredients_name }}">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-warning btn-sm" onClick="update({{ $ingredients->id }})">Perbarui</button>
        </div>
    </div>
</div>
