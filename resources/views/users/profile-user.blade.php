@extends('layouts.template-user')

@section('title')
    <title>Manajemen Profil User | Growlib App</title>
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
                    @method('put')
                    @csrf

                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $user->photo ? Storage::url($user->photo) : asset('template/assets/img/avatars/1.png') }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="photo" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Unggah foto baru</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="photo" name="photo" class="account-file-input" hidden />
                                </label>
                                <button type="reset" class="btn btn-outline-secondary account-image-reset mb-4"
                                    onclick="resetImage()">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Batal</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, JPEG, or PNG. Max size of 5Mb</p>
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
                                <select id="gender" name="gender"
                                    class="select2 form-select @error('gender') is-invalid @enderror">
                                    <option value="">Pilih Gender</option>
                                    <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                    id="phone" name="phone" value="{{ $user->phone }}"
                                    placeholder="Nomor Telepon" />
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
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                    </div>
                </form>
                <!-- /Account -->

                {{-- Modal Update Password --}}
                <div class="modal fade" tabindex="-1" id="modal_change_password">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ganti Password Baru</h5>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <form action="{{ $action_password }}" id="formAccountSettings" method="POST">
                                @method('put')
                                @csrf

                                <div class="modal-body">
                                    <div class="row">

                                        <div class="mb-3 col-md-12">
                                            <label for="old_password" class="form-label">Password
                                                Lama</label>

                                            <div class="input-group input-group-merge">
                                                <input type="password" id="old_password"
                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                    name="old_password" placeholder="Password Lama Anda"
                                                    aria-describedby="old_password" />
                                                <span class="input-group-text cursor-pointer" id="toggle_old_password"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                            @error('old_password')
                                                <div id="old_password" class="form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <label for="new_password" class="form-label">Password Baru</label>

                                            <div class="input-group input-group-merge">
                                                <input type="password" id="new_password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    name="new_password" placeholder="Password Lama Anda"
                                                    aria-describedby="new_password" />
                                                <span class="input-group-text cursor-pointer" id="toggle_new_password"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                            @error('new_password')
                                                <div id="new_password" class="form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <label for="confirm_new_password" class="form-label">Password Baru</label>

                                            <div class="input-group input-group-merge">
                                                <input type="password" id="confirm_new_password"
                                                    class="form-control @error('confirm_new_password') is-invalid @enderror"
                                                    name="confirm_new_password" placeholder="Password Lama Anda"
                                                    aria-describedby="confirm_new_password" />
                                                <span class="input-group-text cursor-pointer"
                                                    id="toggle_confirm_new_password"><i class="bx bx-hide"></i></span>
                                            </div>
                                            @error('confirm_new_password')
                                                <div id="confirm_new_password" class="form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a href="#" type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Tutup</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // for old password class
        const toggle_old_password = document.getElementById('toggle_old_password');
        const old_password = document.getElementById('old_password');

        // for new password class
        const toggle_new_password = document.getElementById('toggle_new_password');
        const new_password = document.getElementById('new_password');

        // for confirm new password class
        const toggle_confirm_new_password = document.getElementById('toggle_confirm_new_password');
        const confirm_new_password = document.getElementById('confirm_new_password');

        toggle_old_password.addEventListener('click', function() {
            if (old_password.type === 'password') {
                old_password.type = 'text';
                toggle_old_password.innerHTML = '<i class="bx bx-show"></i>';
            } else {
                old_password.type = 'password';
                toggle_old_password.innerHTML = '<i class="bx bx-hide"></i>';
            }
        });

        toggle_new_password.addEventListener('click', function() {
            if (new_password.type === 'password') {
                new_password.type = 'text';
                toggle_new_password.innerHTML = '<i class="bx bx-show"></i>';
            } else {
                new_password.type = 'password';
                toggle_new_password.innerHTML = '<i class="bx bx-hide"></i>';
            }
        });

        toggle_confirm_new_password.addEventListener('click', function() {
            if (confirm_new_password.type === 'password') {
                confirm_new_password.type = 'text';
                toggle_confirm_new_password.innerHTML = '<i class="bx bx-show"></i>';
            } else {
                confirm_new_password.type = 'password';
                toggle_confirm_new_password.innerHTML = '<i class="bx bx-hide"></i>';
            }
        });
    </script>

    {{-- Script Upload Foto --}}
    <script>
        function resetImage() {
            // Reset the input file by cloning it
            const fileInput = document.getElementById('photo');
            const newFileInput = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Reset the image source back to the original photo
            const uploadedAvatar = document.getElementById('uploadedAvatar');
            const originalPhoto =
                "{{ $user->photo ? Storage::url($user->photo) : asset('template/assets/img/avatars/1.png') }}";
            uploadedAvatar.src = originalPhoto;
        }

        const fileInput = document.getElementById('photo');
        const uploadedAvatar = document.getElementById('uploadedAvatar');

        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    uploadedAvatar.src = reader.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
