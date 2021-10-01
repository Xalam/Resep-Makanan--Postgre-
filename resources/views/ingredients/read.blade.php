<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Bahan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($ingredients as $ing)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $ing->ingredients_name }}</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" onclick="edit({{ $ing->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="destroy({{ $ing->id }})">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
