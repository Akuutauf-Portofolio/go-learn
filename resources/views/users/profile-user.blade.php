@extends('layouts.template-user')

@section('title')
    <title>Manajemen Profil User | Grow-lib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Akun</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Detail Profil</h5>
                <!-- Account -->
                <form action="{{ $action }}" id="formAccountSettings" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('template/assets/img/avatars/1.png') }}" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Unggah foto baru</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Batal</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 5Mb</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Username</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    id="name" name="name" value="{{ $user->name }}" placeholder="Username"
                                    autofocus />
                                @error('name')
                                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    id="email" name="email" value="{{ $user->email }}" placeholder="Alamat email" />
                                @error('email')
                                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="birthdate" class="form-label">Tanggal lahir</label>
                                <input class="form-control @error('birthdate') is-invalid @enderror" type="date"
                                    id="birthdate" name="birthdate" value="{{ $user->birthdate }}"
                                    placeholder="Tanggal lahir" />
                                @error('birthdate')
                                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="select2 form-select">
                                    <option value="">Pilih Gender</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('gender')
                                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Nomor Telp.</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                    id="phone" name="phone" value="{{ $user->phone }}" placeholder="Nomor Telepon" />
                                @error('phone')
                                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="change_password_button" class="form-label">Password</label><br>

                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modal_change_password" id="change_password_button"
                                    name="change_password_button">
                                    Ubah Password
                                </button>

                                <div class="modal fade" tabindex="-1" id="modal_change_password">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ganti Password Baru</h5>

                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span
                                                            class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>

                                            <form action="">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <label for="old_password" class="form-label">Password
                                                                Lama</label>
                                                            <input
                                                                class="form-control @error('old_password') is-invalid @enderror"
                                                                type="text" id="old_password" name="old_password"
                                                                placeholder="Password Lama Anda" />
                                                            @error('old_password')
                                                                <div id="passwordhelp" class="form-text">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label for="new_password" class="form-label">Password
                                                                Baru</label>
                                                            <input
                                                                class="form-control @error('new_password') is-invalid @enderror"
                                                                type="text" id="new_password" name="new_password"
                                                                placeholder="Password Baru Anda" />
                                                            @error('new_password')
                                                                <div id="passwordhelp" class="form-text">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label for="confirm_password_new"
                                                                class="form-label">Konfirmasi Password
                                                                Baru</label>
                                                            <input
                                                                class="form-control @error('confirm_password_new') is-invalid @enderror"
                                                                type="text" id="confirm_password_new"
                                                                name="confirm_password_new"
                                                                placeholder="Konfirmasi Password" />
                                                            @error('confirm_password_new')
                                                                <div id="passwordhelp" class="form-text">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <a href="#" type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Tutup</a>
                                                    <button type="button" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan perubahan</button>
                            <a href="#" type="button" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </div>
                </form>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
