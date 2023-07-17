@extends('layouts.template-user')

@section('title')
    <title>Setting User Akun | Grow-lib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-cog me-1"></i> Pengaturan</a>
                </li>
            </ul>
            <div class="card">
                <h5 class="card-header">Hapus Akun</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin mau menghapus akun?</h6>
                            <p class="mb-0">Setelah Anda memutuskan untuk menghapus akun, maka operasi tidak dapat
                                dibatalkan.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi
                                penonaktifan/penghapusan akun.</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account mt-2">Hapus Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
