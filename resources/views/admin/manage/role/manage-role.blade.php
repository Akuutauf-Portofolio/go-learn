@extends('layouts.template-user')

@section('title')
    <title>Manajemen Role | Growlib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#nav-table-role" aria-controls="nav-table-role" aria-selected="true">
                            Daftar Role
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#nav-form-user" aria-controls="nav-form-user" aria-selected="false">
                            Tambah Role Baru
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-table-role" role="tabpanel">

                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-header">Tabel Role</h5>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <div class="btn btn-primary my-4" onclick="window.print()">
                                        Cetak Data Role
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th width="10%">#</th>
                                            <th class="text-center">Nama Role</th>
                                            <th class="text-center">Guard Name</th>
                                            <th width="15%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($roles as $item)
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->guard_name }}</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('manage.role.edit', $item->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>

                                                        <a href="{{ route('manage.role.destroy', $item->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="bx bx-trash">
                                                            </i>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>

                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
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
                                        <h5 class="mb-0">Form tambah data role</h5>
                                        <small class="text-muted float-end">Insert new role</small>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('manage.role.store') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label class="form-label" for="name">Nama</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" placeholder="Nama Role" />
                                                @error('name')
                                                    <div id="name" class="form-text">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th width="10%">#</th>
                                                        <th>Nama Permission</th>
                                                        <th>Guard Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp

                                                    @foreach ($permissions as $item)
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            <td class="d-flex">
                                                                <div class="form-check my-auto">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="{{ $item->id }}"
                                                                        name="{{ $item->id }}"
                                                                        id="{{ $item->id }}" />
                                                                    <label class="form-check-label"
                                                                        for="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>{{ $item->guard_name }}</td>
                                                        </tr>
                                                        @php
                                                            $no++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <button type="submit" class="btn btn-primary mt-3">Tambah Role</button>
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
