@extends('layouts.dashboardmaster')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Exists User Role Management</h4>

                <form role="form" action="{{ route('management.role.assign') }}" method="POST" >
                    @csrf
                    <div class="row mb-2">
                        <label for="inputPassword5" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="role">
                                <option value="">select roles</option>
                                <option value="manager">Manager</option>
                                <option value="blogger">Blogger</option>
                                <option value="user">User</option>
                            </select>
                            @error('role')
                            <p class="text-danger">{{ $message }}</p>

                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputPassword5" class="col-sm-3 col-form-label">Manage Users</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="user_id">
                                <option value="">select roles</option>
                                @foreach ($dustotanvir as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <p class="text-danger">{{ $message }}</p>

                            @enderror
                        </div>
                    </div>
                    <div class="justify-content-end row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Blogger's Table</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                               @if (Auth::user()->role == 'admin')
                                 <th>Status</th>
                                 <th>Action</th>
                               @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bloggers as $blogger)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td>{{ $blogger->name }}</td>
                                    <td>{{ $blogger->role }}</td>
                                    @if (Auth::user()->role == 'admin')

                                    <td>
                                    <form id="herouser{{ $blogger->id }}" action="{{ route('management.role.blogger.down',$blogger->id) }}" method="POST">
                                        @csrf
                                        <div class="form-check form-switch">
                                            <input onchange="document.querySelector('#herouser{{ $blogger->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $blogger->role == $blogger->role ? 'checked' : '' }}>
                                        </div>
                                    </form>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-danger text-center">no blogger found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div>
        </div> <!-- end card -->
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">User's Table</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                               @if (Auth::user()->role == 'admin')
                                 <th>Status</th>
                                 <th>Action</th>
                               @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dustotanvir as $user)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    @if (Auth::user()->role == 'admin')

                                    <td>
                                    <form id="herouser{{ $user->id }}" action="{{ route('management.role.user.down',$user->id) }}" method="POST">
                                        @csrf
                                        <div class="form-check form-switch">
                                            <input onchange="document.querySelector('#herouser{{ $user->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $user->role == $user->role ? 'checked' : '' }}>
                                        </div>
                                    </form>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>

                                @empty
                                <tr>
                                <td colspan="5" class="text-danger text-center">no user found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div>
        </div> <!-- end card -->
    </div>

</div>


@endsection


@section('script')

@if (session('assignrole'))
    <script>
        Toastify({
        text: "{{ session('assignrole') }}",
        duration: 5000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function(){} // Callback after click
        }).showToast();
    </script>
@endif

@endsection
