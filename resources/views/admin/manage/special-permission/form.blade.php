@extends('layouts.template-user')

@section('title')
    <title>Ubah Permission User | Growlib App</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">

                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Form ubah data permission user</h5>
                                <small class="text-muted float-end">Update special permission user</small>
                            </div>
                            <div class="card-body">
                                <form action="{{ $action }}" method="POST">
                                    @method('put')
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama User</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Nama Role"
                                            value="{{ $user->name }}" />
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
                                                                value="{{ $item->id }}" name="{{ $item->id }}"
                                                                id="{{ $item->id }}"
                                                                @if ($user_permissions->contains('id', $item->id)) checked @endif />
                                                            <label class="form-check-label" for="{{ $item->id }}">
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

                                    <button type="submit" class="btn btn-primary mt-3"><i
                                            class="fa-solid fa-floppy-disk"></i>&ensp; Ubah Permission User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
