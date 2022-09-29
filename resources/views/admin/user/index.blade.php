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
                <form action="{{route('admin.user.search')}}" method="get">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="q" value="{{ request()->get('q')??'' }}" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
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
                    <td>
                      <a class="btn btn-success btn-sm" href="{{ route('admin.user.invoice', $user) }}"><i class="fas fa-file-invoice"></i> Invoice</a>
                      <a class="btn btn-secondary btn-sm" href="{{ route('admin.user.card', $user) }}"><i class="fas fa-credit-card"></i> Card</a>
                      <a class="btn btn-primary btn-sm" href="{{ route('admin.user.edit', $user) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix">
              {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
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