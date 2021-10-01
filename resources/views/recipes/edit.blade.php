@extends('layout')

@section('title', 'Resep')

@section('content_header', 'Resep')

@section('button_right')

@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/startbootstrap/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/startbootstrap/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content_main')
    <div class="card">
        <form action="{{ route('recipes.update', $recipes->id) }}" role="form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit Resep</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="recipes-name"><b>Nama Resep</b></label>
                    <input type="text" class="form-control" id="recipes-name" name="recipes_name" placeholder="Nama resep"
                        value="{{ $recipes->recipes_name }}" required>
                </div>
                <div class="form-group">
                    <label><b>Kategori</b></label>
                    <select class="form-control select2" name="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}"
                                {{ $cat->id == $recipes->category_id ? 'selected="selected"' : '' }}>
                                {{ $cat->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('recipes.index') }}" class="btn btn-sm btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-sm btn-primary ml-2">
                    Simpan
                </button>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/startbootstrap/vendor/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            $('.select2').select2();
        })
    </script>
@endsection
