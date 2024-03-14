@extends('layouts.admin')


@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h2 class="section-title">Users</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                            is-invalid
                        @enderror"
                                    name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')
                            is-invalid
                        @enderror"
                                        name="password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-primary">
                                        <input type="radio" name="roles" value="ADMIN" class="selectgroup-input"
                                            checked="">
                                        <span>Admin</span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="roles" value="STAFF" class="selectgroup-input">
                                        <span>Staff</span>
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="roles" value="USER" class="selectgroup-input">
                                        <span>User</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection
