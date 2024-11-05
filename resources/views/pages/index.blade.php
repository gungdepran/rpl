<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Daftar Destinasi Wisata</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Tambah Data</a> <!-- Tambah tombol ini -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Destinasi</th>
                <th>Kabupaten/Kota</th>
                <th>Harga Tiket</th>
                <th>Rating</th>
                <th>Contact Person</th>
                <th>Alamat Lengkap</th>
                <th>Jenis Wisata</th>
                <th>Reservasi</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($destinasiWisata as $dw) <!-- Pastikan nama variabel konsisten -->
                <tr>
                    <td><img src="{{ asset('storage/' . $dw->img_url) }}" alt="Gambar Destinasi" width="100"></td>
                    <td>{{ $dw->nama_destinasi }}</td>
                    <td>{{ $dw->kabupaten_kota }}</td>
                    <td>{{ $dw->harga_tiket }}</td>
                    <td>{{ $dw->rating_destinasi }}</td>
                    <td>{{ $dw->contact_person }}</td>
                    <td>{{ $dw->alamat_lengkap }}</td>
                    <td>{{ $dw->jenis_wisata }}</td>
                    <td>{{ $dw->reservasi }}</td>
                    <td>{{ $dw->jam_buka }}</td>
                    <td>{{ $dw->jam_tutup }}</td>
                    <td>
                        {{-- <a href="{{ route('pages.edit', ['id' => $dw->id]) }}" class="btn btn-primary">Edit</a> --}}
                        <a href="{{ route('pages.edit', $dw->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pages.destroy', $dw->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>