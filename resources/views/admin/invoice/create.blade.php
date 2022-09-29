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
          <a href="{{route('admin.user.invoice', $user->id)}}" class="btn btn-success">Back</a>

            {{-- <h1>General Form</h1> --}}
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> --}}
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
                <h3 class="card-title">Create Invoice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.invoice.store') }}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <input name="user_id" type="hidden" value="{{$user->id}}" required>
                  </div>

                  <div class="form-group">
                    <label for="service_type">Service Type</label>
                    <input name="service_type" type="text" class="form-control" id="service_type" placeholder="Enter phone, internet, wireless, TV, etc." required>
                  </div>

                  <div class="form-group">
                    <label for="bill_no">Bill Number</label>
                    <input name="bill_no" type="number" class="form-control" id="bill_no" placeholder="xxxxxxxxxxxx" required>
                  </div>

                  <div class="form-group">
                    <label for="payment_type">Payment Type</label>
                    <select name="payment_type" class="form-control" required>
                        <option value="">---Select---</option>
                        <option value="partial">Partial</option>
                        <option value="full">Full</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input name="amount" type="number" class="form-control" id="amount" placeholder="xxxx" required>
                  </div>

                  <div class="form-group">
                    <label for="date">Date</label>
                    <input name="date" type="date" class="form-control" id="date" placeholder="xxxx" required>
                  </div>

                  <div class="form-group">
                    <label for="merchant_id">Merchant Id</label>
                    <input name="merchant_id" type="number" class="form-control" id="merchant_id" placeholder="xxxx" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" class="form-control" id="note" rows="3" placeholder="Enter Note"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="payment_type">Cards</label>
                    <select name="card_id" class="form-control" required>
                        <option value="">---Select---</option>
                        @foreach($user->cards as $card)
                        <option value="{{$card->card_unique_id}}">{{$card->card_no}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">---Select---</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="canceled">Canceled</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('admin.user.invoice', $user->id)}}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary float-right">Create</button>
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