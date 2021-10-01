@extends('layout')

@section('title', 'Resep')

@section('content_header', 'Resep')

@section('button_right')
    <a href="{{ route('recipes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Resep</a>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/startbootstrap/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/startbootstrap/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content_main')
    <div class="row">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-white border-0 small" placeholder="Cari resep ..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <h5 class="mr-2">Filter</h5>
        <select class="form-control select2 mr-3" style="max-width: 20%;" name="ingredients_search">
            <option>Bahan</option>
        </select>

        <select class="form-control select2 mr-3" style="max-width: 20%;" name="category_search">
            <option>Kategori</option>
        </select>
    </div>

    <div id="read" class="mt-3">

    </div>

    <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-add-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-label">Tampil Resep</h5>
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
        $(document).ready(function() {
            $('.select2').select2();
            read();
        })

        function read() {
            $.get('{{ route('recipes.read') }}', {}, function(data, status) {
                $('#read').html(data);
            });
        }

        function edit(id) {
            $.get('/recipes/' + id + '/edit', {}, function(data, status) {
                $('#modal-add-label').html('Edit Resep')
                $('#page').html(data);
                $('#modal-add').modal('show');
            });
        }

        function show(id) {
            $.get('/recipes/' + id, {}, function(data, status) {
                $('#modal-add-label').html('Tampil Resep')
                $('#page').html(data);
                $('#modal-add').modal('show');
            });
        }

        function update(id) {
            let ingredientsName = $('#ingredients-name').val();

            if (ingredientsName == '') {
                alert('Nama kategori harap diisi');
            } else {
                $.ajax({
                    type: 'PUT',
                    url: '/ingredients/' + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'ingredients_name': ingredientsName
                    },
                    success: function(data) {
                        $('.close').click();
                        read();
                    }
                });
            }
        }

        function destroy(id) {
            if (confirm('Apakah ingin menghapus resep?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/recipes/' + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    success: function(data) {
                        read()
                    }
                });
            }
        }
    </script>
@endsection
