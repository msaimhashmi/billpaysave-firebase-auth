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
					<a href="{{route('admin.user.invoice', $invoice->user_id)}}" class="btn btn-success">Back</a>
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
						Invoice Detail
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<dl class="row">
							<dt class="col-sm-4">Service Type:</dt>
							<dd class="col-sm-8">{{ $invoice->service_type }}</dd>
							<dt class="col-sm-4">Bill Number:</dt>
							<dd class="col-sm-8">{{ $invoice->bill_no }}</dd>
							<dt class="col-sm-4">Payment Type:</dt>
							<dd class="col-sm-8">{{ $invoice->payment_type }}</dd>
							<dt class="col-sm-4">Amount:</dt>
							<dd class="col-sm-8">{{ $invoice->amount }}</dd>
							<dt class="col-sm-4">Date:</dt>
							<dd class="col-sm-8">{{ $invoice->date }}</dd>
							<dt class="col-sm-4">Merchant Id:</dt>
							<dd class="col-sm-8">{{ $invoice->merchant_id }}</dd>
							<dt class="col-sm-4">Note:</dt>
							<dd class="col-sm-8">{{ $invoice->note }}</dd>
							<dt class="col-sm-4">Card Number:</dt>
							<dd class="col-sm-8">{{ $invoice->card->card_no }}</dd>
							<dt class="col-sm-4">Status:</dt>
							<dd class="col-sm-8"><span class="badge {{$invoice->status == 'completed' ? 'badge-success' : ($invoice->status ==='canceled' ? 'badge-danger' : 'badge-warning')}} ">{{ $invoice->status }}</span></dd>

							{{-- <dt class="col-sm-4">First Name:</dt>
							<dd class="col-sm-8">{{ ($invoice->first_name)? $invoice->first_name: '-' }}</dd>
							<dt class="col-sm-4">Last Name:</dt>
							<dd class="col-sm-8">{{ ($invoice->last_name)? $invoice->last_name:'-' }}</dd>
							<dt class="col-sm-4">Email:</dt>
							<dd class="col-sm-8">{{ $invoice->email }}</dd>
							<dt class="col-sm-4">Phone:</dt>
							<dd class="col-sm-8">{{ $invoice->phone }}</dd>
							<dt class="col-sm-4">Account Number:</dt>
							<dd class="col-sm-8">{{ $invoice->account_no }}</dd>
							<dt class="col-sm-4">Provider:</dt>
							<dd class="col-sm-8">{{ $invoice->provider }}</dd>
							<dt class="col-sm-4">Service Provider:</dt>
							<dd class="col-sm-8">{{ $invoice->service_address }}</dd> --}}
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