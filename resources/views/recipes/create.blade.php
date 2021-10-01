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
        <form action="{{ route('recipes.store') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Resep</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="recipes-name"><b>Nama Resep</b></label>
                    <input type="text" class="form-control" id="recipes-name" name="recipes_name" placeholder="Nama resep"
                        required>
                </div>
                <div class="form-group">
                    <label><b>Kategori</b></label>
                    <select class="form-control select2" name="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-foto"><b>Upload Gambar</b></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="input-foto" name="image" required>
                            <label class="custom-file-label" for="input-foto">Pilih file</label>
                        </div>
                    </div>
                    <img id="preview-foto" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                        alt="Preview Image" style="max-height: 150px; margin-top: 10px">
                </div>
                <div class="row">
                    <button type="button" name="add" id="add" class="btn btn-sm btn-success ml-4">
                        <i class="fas fa-plus"></i>&nbsp; Tambah Bahan
                    </button>
                    <button type="button" name="add_new" id="add-new" class="btn btn-sm btn-warning ml-2 btn-tambah">
                        <i class="fas fa-edit"></i>&nbsp; Tambah Bahan Baru
                    </button>
                </div>
                <table class="table table-borderless">
                    <tbody id="lists">

                    </tbody>
                </table>
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

    <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-add-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-label">Tambah Bahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/startbootstrap/vendor/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            let array = [];
            let count = 0;
            $('#add').click(function() {
                count += 1;
                array.push(count);
                $('#lists').append(
                    '<tr class="list">' +
                    '<input type="hidden" name="rows[]" value="' + count + '">' +
                    '<td width="500">' +
                    '<select name="ingredients_id[]" id="id-ing' + count +
                    '" required class="form-control">' +
                    '<option value="">Pilih bahan</option>' +
                    @foreach ($ingredients as $a)
                        '<option value="{{ $a->id }}">{{ $a->ingredients_name }}</option>' +
                    @endforeach '</select></td>' +
                    '<td><button type="button" id="remove' + count +
                    '" class="btn btn-danger btn-flat btn-sm" data-remove="' + count +
                    '"><i class="fa fa-times"></i></button></td>' +
                    '</tr>'
                );
                $('#remove' + count).on('click', function(e) {
                    if (e.type == 'click') {
                        array.splice(array.indexOf($(this).data('remove')), 1);
                        $(this).parents(".list").fadeOut();
                        $(this).parents(".list").remove();
                    }
                });

                $('#id-ing' + count).select2();
            });

            $('.select2').select2();

            $('#input-foto').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            });
        })

        $('.btn-tambah').on('click', function() {
            $.get('{{ route('ingredients.create') }}', {}, function(data, status) {
                $('#modal-add-label').html('Tambah Bahan')
                $('#page').html(data);
                $('#modal-add').modal('show');

            });
        })

        function store() {
            let ingredientsName = $('#ingredients-name').val();

            if (ingredientsName == '') {
                alert('Nama bahan harap diisi');
            } else {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('ingredients.store') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'ingredients_name': ingredientsName
                    },
                    success: function(data) {
                        $('.close').click();
                        location.reload(true);
                    }
                });
            }
        }
    </script>
@endsection
