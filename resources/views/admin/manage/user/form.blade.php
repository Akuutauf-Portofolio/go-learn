@extends('layouts.template-user')

@section('title')
    <title>Ubah User | Growlib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">

                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Form ubah data user</h5>
                                <small class="text-muted float-end">Update user</small>
                            </div>
                            <div class="card-body">
                                <form action="{{ $action }}" method="POST">
                                    @method('put')
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="name">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Username"
                                            value="{{ $user->name }}" />
                                        @error('name')
                                            <div id="name" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select id="role" name="role"
                                            class="form-select @error('role') is-invalid @enderror">
                                            <option value="">Pilih Opsi Role</option>
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($role && $item->id == $role->id) selected @endif>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div id="role" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="example@email.com" aria-label="email" aria-describedby="email"
                                                value="{{ $user->email }}" />
                                        </div>
                                        @error('email')
                                            <div id="email" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Password with modal --}}

                                    <div class="mb-3">
                                        <label class="form-label" for="birthdate">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror"
                                            id="birthdate" name="birthdate" placeholder="Tanggal lahir user"
                                            value="{{ $user->birthdate }}" />
                                        @error('birthdate')
                                            <div id="birthdate" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select id="gender" name="gender"
                                            class="form-select @error('gender') is-invalid @enderror">
                                            <option value="">Pilih Opsi Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <div id="gender" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Nomor Telepon</label>
                                        <input type="text" id="phone" name="phone"
                                            class="form-control  @error('phone') is-invalid @enderror phone-mask"
                                            placeholder="Nomor telepon user" value="{{ $user->phone }}" />
                                        @error('phone')
                                            <div id="phone" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Ubah User</button>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modal_change_password" id="change_password_button"
                                        name="change_password_button">
                                        Ubah Password
                                    </button>
                                </form>

                                {{-- Modal Update Password --}}
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

                                            <form action="#" id="formAccountSettings" method="POST">
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
                                                                    name="old_password" placeholder="Password lama"
                                                                    aria-describedby="old_password" />
                                                                <span class="input-group-text cursor-pointer"
                                                                    id="toggle_old_password"><i
                                                                        class="bx bx-hide"></i></span>
                                                            </div>
                                                            @error('old_password')
                                                                <div id="old_password" class="form-text">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 col-md-12">
                                                            <label for="new_password" class="form-label">Password
                                                                Baru</label>

                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="new_password"
                                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                                    name="new_password" placeholder="Password baru"
                                                                    aria-describedby="new_password" />
                                                                <span class="input-group-text cursor-pointer"
                                                                    id="toggle_new_password"><i
                                                                        class="bx bx-hide"></i></span>
                                                            </div>
                                                            @error('new_password')
                                                                <div id="new_password" class="form-text">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 col-md-12">
                                                            <label for="confirm_new_password"
                                                                class="form-label">Konfirmasi Password
                                                                Baru</label>

                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="confirm_new_password"
                                                                    class="form-control @error('confirm_new_password') is-invalid @enderror"
                                                                    name="confirm_new_password"
                                                                    placeholder="Konfirmasi password"
                                                                    aria-describedby="confirm_new_password" />
                                                                <span class="input-group-text cursor-pointer"
                                                                    id="toggle_confirm_new_password"><i
                                                                        class="bx bx-hide"></i></span>
                                                            </div>
                                                            @error('confirm_new_password')
                                                                <div id="confirm_new_password" class="form-text">
                                                                    {{ $message }}</div>
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
@endsection
