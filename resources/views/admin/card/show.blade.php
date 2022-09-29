@extends('admin.layouts.master')
@section('page-title')
@endsection
@section('meta-description')
@endsection
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
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
						<i class="fas fa-text-width"></i>
						card Detail
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<dl class="row">
							<dt class="col-sm-4">Name On Card:</dt>
							<dd class="col-sm-8">{{ $card->name_on_card }}</dd>
							<dt class="col-sm-4">Card Number:</dt>
							<dd class="col-sm-8">{{ $card->card_no }}</dd>
							<dt class="col-sm-4">Expire Month:</dt>
							<dd class="col-sm-8">{{ $card->exp_month }}</dd>
							<dt class="col-sm-4">Expire Year:</dt>
							<dd class="col-sm-8">{{ $card->exp_year }}</dd>
							<dt class="col-sm-4">CVV Number:</dt>
							<dd class="col-sm-8">{{ $card->cvv_no }}</dd>
							<dt class="col-sm-4">Status:</dt>
							<dd class="col-sm-8"><span class="badge {{$card->status == '1' ? 'badge-success' : 'badge-danger'}} ">{{$card->status == '1' ? 'Active' : 'Deactivate'}}</span></dd>

							{{-- <dt class="col-sm-4">First Name:</dt>
							<dd class="col-sm-8">{{ ($card->first_name)? $card->first_name: '-' }}</dd>
							<dt class="col-sm-4">Last Name:</dt>
							<dd class="col-sm-8">{{ ($card->last_name)? $card->last_name:'-' }}</dd>
							<dt class="col-sm-4">Email:</dt>
							<dd class="col-sm-8">{{ $card->email }}</dd>
							<dt class="col-sm-4">Phone:</dt>
							<dd class="col-sm-8">{{ $card->phone }}</dd>
							<dt class="col-sm-4">Account Number:</dt>
							<dd class="col-sm-8">{{ $card->account_no }}</dd>
							<dt class="col-sm-4">Provider:</dt>
							<dd class="col-sm-8">{{ $card->provider }}</dd>
							<dt class="col-sm-4">Service Provider:</dt>
							<dd class="col-sm-8">{{ $card->service_address }}</dd> --}}
						</dl>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
@endsection