@extends('layouts.template-user')

@section('title')
    <title>Manajemen Special Permission User | Growlib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-table-user" role="tabpanel">
                        <div class="card">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-header">Tabel User</h5>
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
                                            <th width="15%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($users as $data)
                                            <tr>
                                                <th scope="row">{{ $no }}</th>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->roles->first()->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('manage.special.permission.edit', $data->id) }}"
                                                            class="btn btn-primary" title="Edit user">
                                                            <i class="bx bx-pencil"></i>
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
                </div>

            </div>
        </div>
    </div>
@endsection
