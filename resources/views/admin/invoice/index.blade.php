@extends('admin.layouts.master')
@section('page-title')
@endsection
@section('meta-description')
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
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
          {{-- <h1>users</h1> --}}
          <a href="{{route('admin.user.create')}}" class="btn btn-success">Add user</a>

        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Simple Tables</li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">users List</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Account No</th>
                    <th>Provider</th>
                    <th>Date of birth</th>
                    <th>Service Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $id = 1;
                  @endphp
                  @foreach($users as $user)
                  <tr>
                    <th>{{ $id++ }}</th>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->account_no }}</td>
                    <td>{{ $user->provider }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ Str::limit($user->service_address, 50, '...') }}</td>
                    <td>
                      <a href="{{ route('admin.invoice.edit', $user) }}" class="btn btn-pill btn-success"><i class="far fa-edit"></i></a>
                      <a href="{{ route('admin.invoice.show', $user) }}" class="btn btn-pill btn-info"><i class="far fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>
@endsection