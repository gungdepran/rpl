<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tabel</title>
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
<form method="POST" action="{{ route('pages.update', $wisata->id ?? 0) }}" enctype="multipart/form-data">
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Gambar</label>
                            <input type="file" name="img_url" class="form-control" id="img_url"
                                aria-describedby="img_url" value="{{ $wisata->img_url }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">nama</label>
                            <input type="text" name="nama" class="form-control" id="name"
                                aria-describedby="name" value="{{ $wisata->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="adres" class="form-label">Alamat</label>
                            <input type="text" name="Alamat" class="form-control" id="adress"
                                aria-describedby="adress"value="{{ $wisata->alamat }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">harga</label>
                            <input type="text" name="harga" class="form-control" id="price"
                                aria-describedby="price"value="{{ $wisata->harga }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="description"
                                aria-describedby="desciption"value="{{ $wisata->deskripsi }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>