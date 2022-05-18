@extends('auth.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="border p-4 rounded">
            <div class="text-center">
                <h3 class="">Login</h3>
            </div>
            <div class="form-body">
                <form method="POST" action="{{ route('login') }}" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="username" @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
