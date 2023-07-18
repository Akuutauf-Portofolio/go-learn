@extends('layouts.template-user')

@section('title')
    <title>Setting User Akun | Growlib App</title>
@endsection


@section('css')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const accountActivationCheckbox = document.getElementById('accountActivation');
            const deleteAccountBtn = document.getElementById('deleteAccountBtn');

            accountActivationCheckbox.addEventListener('change', function() {
                deleteAccountBtn.disabled = !accountActivationCheckbox.checked;
            });
        });
    </script>
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

                    <form id="formAccountDeactivation" action="{{ route('do.delete.account.user', $user_id) }}"
                        method="POST">
                        @csrf

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation"
                                required />
                            <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi
                                penonaktifan/penghapusan akun.</label>
                        </div>
                        <button type="button" class="btn btn-danger deactivate-account mt-2" data-bs-toggle="modal"
                            data-bs-target="#modal_delete_account">Lanjutkan Hapus Akun</button>

                        {{-- Modal Delete Account --}}
                        <div class="modal fade" tabindex="-1" id="modal_delete_account">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Hapus Akun?</h3>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <b>Apakah anda yakin ingin menghapus akun?</b>
                                        <small>Jika anda melanjutkan untuk menghapus akun, maka seluruh data milik akun Anda
                                            akan permanen dihapus dari aplikasi..</small>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Batalkan</button>

                                        <button type="submit" class="btn btn-danger" id="deleteAccountBtn" disabled>Hapus
                                            Akun</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
