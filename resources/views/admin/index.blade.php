<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>Album</strong>
                </a>

            </div>
        </div>
    </header>
    <main role="main" class="col-sm-12 d-flex justify-content-center text-center">
        <div class="card col-sm-8 mt-3">
            <h3 class="card-title">tabel siswa</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Siswa
            </button>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            {{-- <th scope="col">Password</th> --}}
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $key => $value)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $value->username }}</td>
                                {{-- <td>{{ $value->password }}</td> --}}
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->kelas }}</td>
                                <td><a href="{{ url('/admin/edit/' . $value->id) }}" class="btn btn-sm btn-warning"
                                        type="button">Edit</a>
                                    <form action="{{ url('/admin/delete/' . $value->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('Apakah anda ingin menghapus?')">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ Session::has('edit') ? url('/admin/update') : url('/admin/store') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="id" required name="id"
                            value="{{ Session::has('edit') ? Session::get('edit')->id : '' }}">
                        <div class="mb-3">
                            <label for="username" class="form-label">username</label>
                            <input type="text" class="form-control" id="username" required name="username"
                                value="{{ Session::has('edit') ? Session::get('edit')->username : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" required name="password">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">nama</label>
                            <input type="text" class="form-control" id="nama" required
                                name="nama"value="{{ Session::has('edit') ? Session::get('edit')->nama : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">kelas</label>
                            <input type="text" class="form-control" id="kelas" required name="kelas"
                                value="{{ Session::has('edit') ? Session::get('edit')->kelas : '' }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@if (Session::get('edit'))
    <script>
        let myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
        myModal.show();
    </script>
@endif

</html>
