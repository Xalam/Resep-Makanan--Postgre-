<div class="modal-body">
    <h3>{{ $recipes->recipes_name }}</h3>
    <ul>
        @foreach ($ingredients as $item)
            <li>{{ $item->ingredients->ingredients_name }}</li>
        @endforeach
    </ul>
</div>
