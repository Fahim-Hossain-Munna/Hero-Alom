@extends('layouts.dashboardmaster')


@section('content')

<div class="row">
    <div class="col-xl-6">
        {{-- success msg --}}
        @if (session('name_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{session('name_update')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- success msg --}}
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">username update</h5>

                <form action="{{ route('home.profile.name.update') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name')
                        is-invalid
                        @enderror" id="floatingnameInput" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                        <label for="floatingnameInput">Name</label>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>


    <div class="col-xl-6">
        {{-- success msg --}}
        @if (session('password_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{session('password_update')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- success msg --}}
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Password update</h5>

                <form action="{{ route('home.profile.password.update') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('name')
                        is-invalid
                        @enderror" id="floatingnameInput" placeholder="Enter Name" name="current_password" value="{{ old('current_password') }}">
                        <label for="floatingnameInput">current password</label>
                        @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password')
                        is-invalid
                        @enderror" id="floatingnameInput" placeholder="Enter Name" name="password" value="{{ old('password') }}">
                        <label for="floatingnameInput">password</label>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password_confirmation')
                        is-invalid
                        @enderror" id="floatingnameInput" placeholder="Enter Name" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        <label for="floatingnameInput">Confirm password</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-6">
        {{-- success msg --}}
        @if (session('image_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{session('image_update')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- success msg --}}
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Image update</h5>

                <form action="{{ route('home.profile.image.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control @error('image')
                        is-invalid
                        @enderror" id="floatingnameInput" name="image">
                        <label for="floatingnameInput">Image</label>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>

@endsection
