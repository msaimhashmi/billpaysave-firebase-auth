@extends('admin.layouts.master')
{{-- @section('page-title')
@endsection
@section('meta-description')
@endsection --}}
@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       @if (Session::has('errors'))
      <div class="alert alert-danger">
            <strong>{{ $errors }}</strong>
      </div>
      @endif
        @if (Session::has('success'))
        <div class="alert alert-success">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{route('admin.user.index')}}" class="btn btn-success">Back</a>

            {{-- <h1>General Form</h1> --}}
          </div>
          <div class="col-sm-6">
      			<form action="{{route('admin.user.destroy', $user)}}" method="post">
      				@csrf
      				@method('delete')
      				<button type="submit" class="btn float-sm-right btn-pill btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i> DELETE</button>
      			</form>
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol> --}}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit user</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.user.update', $user) }}">
                @csrf
                {{ method_field('PUT') }}

                <div class="card-body">
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input name="first_name" type="text" class="form-control" id="first_name" value="{{ $user->first_name }}" placeholder="Enter first name" required>
                  </div>

                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input name="last_name" type="text" class="form-control" id="last_name" value="{{ $user->last_name }}" placeholder="Enter last name" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Enter email" required>
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" type="number" class="form-control" id="phone" value="{{ $user->phone }}" placeholder="+1XXXXXXXXXX" required>
                  </div>

                  <div class="form-group">
                    <label for="account_no">Account Number</label>
                    <input name="account_no" type="text" class="form-control" id="account_no" value="{{ $user->account_no }}" placeholder="Enter account number" required>
                  </div>

                  <div class="form-group">
                    <label for="provider">Provider</label>
                    <input name="provider" type="text" class="form-control" id="provider" value="{{ $user->provider }}" placeholder="Enter Provider" required>
                  </div>

                  <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <input name="dob" type="date" min="1000-01-01" max="3000-12-31" class="form-control" id="dob" value="{{ $user->dob }}">
                  </div>

                  <div class="form-group">
                    <label for="service_address">Service Address</label>
                    <textarea name="service_address" class="form-control" id="service_address" rows="3" placeholder="Enter service address">{{ $user->service_address }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection