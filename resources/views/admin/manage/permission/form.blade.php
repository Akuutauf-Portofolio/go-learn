@extends('layouts.template-user')

@section('title')
    <title>Ubah Permission | Growlib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">

                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Form ubah data permission</h5>
                                <small class="text-muted float-end">Update permission</small>
                            </div>

                            <div class="card-body">

                                <form action="{{ $action }}" method="POST">
                                    @method('put')
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Nama Permission"
                                            value="{{ $permission->name }}" />
                                        @error('name')
                                            <div id="name" class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-floppy-disk"></i>&ensp; Ubah Permission</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
