@extends('layouts.template-user')

@section('title')
    <title>Manajemen User | Growlib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#nav-table-user" aria-controls="nav-table-user" aria-selected="true">
                            Daftar User
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#nav-form-user" aria-controls="nav-form-user" aria-selected="false">
                            Tambah User Baru
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-table-user" role="tabpanel">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-header">Tabel User</h5>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <div class="btn btn-primary my-4" onclick="window.print()">
                                        Cetak Data User
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>#</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th width="15%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>
                                                <center>
                                                    <a href="#" class="btn btn-primary">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger">
                                                        <i class="bx bx-trash">
                                                        </i>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>
                                                <center>
                                                    <a href="#" class="btn btn-primary">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger">
                                                        <i class="bx bx-trash">
                                                        </i>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>
                                                <center>
                                                    <a href="#" class="btn btn-primary">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger">
                                                        <i class="bx bx-trash">
                                                        </i>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-form-user" role="tabpanel">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Form tambah data user</h5>
                                        <small class="text-muted float-end">Insert new user</small>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label class="form-label" for="name">Username</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Username" />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="email" name="email" class="form-control"
                                                        placeholder="example@email.com" aria-label="email"
                                                        aria-describedby="email" />
                                                </div>
                                            </div>

                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="password" class="form-control"
                                                        name="password"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        aria-describedby="password" />
                                                    <span class="input-group-text cursor-pointer">
                                                        <i class="bx bx-hide"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="birthdate">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="birthdate"
                                                    name="birthdate" placeholder="Tanggal lahir user" />
                                            </div>

                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                                <select id="gender" name="gender" class="form-select">
                                                    <option>Pilih Opsi Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Nomor Telepon</label>
                                                <input type="text" id="phone" name="phone"
                                                    class="form-control phone-mask" placeholder="Nomor telepon user" />
                                            </div>

                                            <button type="submit" class="btn btn-primary">Tambah User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
