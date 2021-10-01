<div class="modal-body">
    <div class="p2">
        <div class="form-group">
            <input type="text" name="name" id="category-name" class="form-control" placeholder="Kategori"
                value="{{ $category->category_name }}">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-warning btn-sm" onClick="update({{ $category->id }})">Perbarui</button>
        </div>
    </div>
</div>
