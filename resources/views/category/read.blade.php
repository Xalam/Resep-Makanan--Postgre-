<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($category as $cat)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $cat->category_name }}</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" onclick="edit({{ $cat->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="destroy({{ $cat->id }})">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
