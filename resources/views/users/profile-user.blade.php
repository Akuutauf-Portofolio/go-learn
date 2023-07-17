@extends('layouts.template-user')

@section('title')
    <title>Profile User Management | Grow-lib App</title>
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

                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 5Mb</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Username</label>
                                <input class="form-control" type="text" id="firstName" name="firstName" value="John"
                                    autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="john.doe@example.com" placeholder="john.doe@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Role</label>
                                <input type="text" class="form-control" id="organization" name="organization"
                                    value="ThemeSelection" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Password</label>
                                <input class="form-control" type="text" id="state" name="state"
                                    placeholder="California" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <textarea type="text" class="form-control" id="address" name="address" placeholder="Address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
