<div class="d-flex align-content-stretch flex-wrap card-columns-group">
    @foreach ($recipes as $item)
        <div class="card col-12 col-sm-6 col-md-4 col-lg-3">
            <img class="card-img-top"
                src="{{ $item->image == null ? 'https://www.riobeauty.co.uk/images/product_image_not_found.gif' : asset('storage/image/' . $item->image) }}"
                alt="{{ $item->recipes_name }}" style="max-height: 160px;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->recipes_name }}</h5>
                <p class="card-text">{{ $item->category->category_name }}</p>
                <button class="btn btn-success btn-sm" onclick="show({{ $item->id }})">Lihat</button>
                <a href="{{ route('recipes.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" onclick="destroy({{ $item->id }})">Hapus</button>
            </div>
        </div>
    @endforeach
</div>
