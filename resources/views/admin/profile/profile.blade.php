@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form action="{{ route('profile.update') }}" method="POST" class="needs-validation" novalidate="">
                @csrf
                @method('patch')
              <div class="card-header">
                <h4>Profile Information</h4>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Name</label>
                        <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Email</label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </div>
            </form>
          </div>

          <div class="card">
            <form action="{{ route('password.update') }}" method="POST" class="needs-validation" novalidate="">
                @csrf
                @method('put')
              <div class="card-header">
                <h4>Update Password</h4>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4 col-12">
                        <label>Current Password</label>
                        <input id="current_password" type="password" name="current_password" class="form-control" autocomplete="current-password">
                        @if ($errors->updatePassword->has('current_password'))
                            <code>{{ $errors->updatePassword->first('current_password') }}</code>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <label>New Password</label>
                        <input id="password" type="password" name="password" class="form-control" autocomplete="new-password">
                        @if ($errors->updatePassword->has('current_password'))
                            <code>{{ $errors->updatePassword->first('password') }}</code>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <label>Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                        @if ($errors->updatePassword->has('password_confirmation'))
                            <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
