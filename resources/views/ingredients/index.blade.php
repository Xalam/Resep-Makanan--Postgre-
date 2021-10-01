@extends('layout')

@section('title', 'Bahan')

@section('content_header', 'Bahan')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content_main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan</h6>
            <button class="btn btn-primary btn-sm float-right btn-tambah">Tambah</button>
        </div>
        <div class="card-body">
            <div id="read" class="mt-3"></div>
        </div>
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
    <script src="{{ asset('assets/startbootstrap/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/startbootstrap/js/demo/datatables-demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            read()
        });

        $('.btn-tambah').on('click', function() {
            $.get('{{ route('ingredients.create') }}', {}, function(data, status) {
                $('#modal-add-label').html('Tambah Bahan')
                $('#page').html(data);
                $('#modal-add').modal('show');

            });
        })

        function read() {
            $.get('{{ route('ingredients.read') }}', {}, function(data, status) {
                $('#read').html(data);
                $('#dataTable').DataTable();
            });
        }

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
                        read();
                    }
                });
            }
        }

        function edit(id) {
            $.get('/ingredients/' + id + '/edit', {}, function(data, status) {
                $('#modal-add-label').html('Edit Bahan')
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
            if (confirm('Apakah ingin menghapus bahan?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/ingredients/' + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    success: function(data) {
                        $('.close').click();
                        read()
                    }
                });
            }
        }
    </script>
@endsection
