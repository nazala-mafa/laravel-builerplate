@extends('adminlte::page')

@section('title', 'Edit Profile')

@section('content_header')
    <h1 class="m-0 text-dark">Profile</h1>
@stop

@section('content')
    <div class="max-1200">
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="mb-0">Biodata</h4>
            </div>
            <div class="card-body">
                <x-alert prefix="update_biodata" />

                <form action="{{ route('profile.update.biodata') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', auth()->user()->name) }}" placeholder="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', auth()->user()->email) }}" placeholder="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Password</h4>
            </div>
            <div class="card-body">
                <x-alert prefix="update_password" />
                
                <form action="{{ route('profile.update.password') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                            name="old_password" value="{{ old('old_password') }}" placeholder="Old Password"
                            autocomplete="">
                        @error('old_password')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}" placeholder="Password">
                        @error('password')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="new_password" value="{{ old('new_password') }}" placeholder="New Password">
                        @error('new_password')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
