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
          <a href="{{route('admin.user.card', $card->user_id)}}" class="btn btn-success">Back</a>

            {{-- <h1>General Form</h1> --}}
          </div>
          <div class="col-sm-6">
      			<form action="{{route('admin.card.destroy', $card)}}" method="post">
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
              <form method="POST" action="{{ route('admin.card.update', $card) }}">
                @csrf
                {{ method_field('PUT') }}

                <div class="card-body">

                  <div class="form-group">
                    <input name="user_id" type="hidden" value="{{$card->user_id}}" required>
                  </div>

                  <div class="form-group">
                    <label for="name_on_card">Name On Card</label>
                    <input name="name_on_card" type="text" class="form-control" id="name_on_card" value="{{$card->name_on_card}}" placeholder="xxxxxxx xxxxxxxxx" required>
                  </div>

                  <div class="form-group">
                    <label for="card_no">Card Number</label>
                    <input name="card_no" type="number" class="form-control" id="card_no" value="{{$card->card_no}}" placeholder="xxxxxxxxxxxxxxxx" required>
                  </div>

                  <div class="form-group">
                    <label for="exp_month">Expire Month</label>
                    <input name="exp_month" type="number" class="form-control" id="exp_month" value="{{$card->exp_month}}" placeholder="xx" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exp_year">Expire Year</label>
                    <input name="exp_year" type="number" class="form-control" id="exp_year" value="{{$card->exp_year}}" placeholder="xxxx" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="cvv_no">CVV Number</label>
                    <input name="cvv_no" type="number" class="form-control" id="cvv_no" value="{{$card->cvv_no}}" placeholder="xxx" required>
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ $card->status == '1' ? 'selected' : ''}}>Active</option>
                        <option value="0" {{ $card->status == '0' ? 'selected' : ''}}>Deactivate</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('admin.user.card', $card->user_id)}}" class="btn btn-secondary">Cancel</a>
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