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
						<a href="{{route('admin.user.index')}}" class="btn btn-success">Back</a>
					</div>
				{{-- </div> --}}
				{{-- <div class="row mb-2"> --}}
					<div class="col-sm-6">
						<a href="{{route('admin.invoice.create', $user)}}" class="btn float-sm-right btn-pill btn-info">Add Invoice</a>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
		        <div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">
								<i class="fas fa-text-width"></i>
								user Details
								</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<dl class="row">
									<dt class="col-sm-4">First Name:</dt>
									<dd class="col-sm-8">{{ $user->first_name }}</dd>
									<dt class="col-sm-4">Last Name:</dt>
									<dd class="col-sm-8">{{ $user->last_name }}</dd>
									<dt class="col-sm-4">Email:</dt>
									<dd class="col-sm-8">{{ $user->email }}</dd>
									<dt class="col-sm-4">Phone:</dt>
									<dd class="col-sm-8">{{ $user->phone }}</dd>
									<dt class="col-sm-4">Account Number:</dt>
									<dd class="col-sm-8">{{ $user->account_no }}</dd>
									<dt class="col-sm-4">Provider:</dt>
									<dd class="col-sm-8">{{ $user->provider }}</dd>
									<dt class="col-sm-4">Service Provider:</dt>
									<dd class="col-sm-8">{{ $user->service_address }}</dd>
								</dl>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Invoice List</h3>
								<div class="card-tools">
                				<form action="{{route('admin.invoice.search', $user)}}" method="get">
									<div class="input-group input-group-sm" style="width: 150px;">
										<input type="text" name="q" value="{{ request()->get('q')??'' }}" class="form-control float-right" placeholder="Search">
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
											<th>Service Type</th>
											<th>Bill Number</th>
											<th>Payment Type</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Card Number</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@php
										$id = 1;
										@endphp
										@foreach($invoices as $invoice)
										<tr>
											<th>{{ $id++ }}</th>
											<td>{{ $invoice->service_type }}</td>
											<td>{{ $invoice->bill_no }}</td>
											<td>{{ $invoice->payment_type }}</td>
											<td>{{ $invoice->amount }}</td>
											<td>{{ $invoice->date }}</td>
											<td>{{ $invoice->card->card_no }}</td>
											<td><span class="badge {{$invoice->status == 'completed' ? 'badge-success' : ($invoice->status ==='canceled' ? 'badge-danger' : 'badge-warning')}} ">{{ $invoice->status }}</span></td>
											<td>
												<a class="btn btn-primary btn-sm" href="{{ route('admin.invoice.show', $invoice) }}"><i class="fas fa-eye"></i> View</a>
												<a class="btn btn-info btn-sm" href="{{ route('admin.invoice.edit', $invoice) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix">
          						{!! $invoices->withQueryString()->links('pagination::bootstrap-5') !!}
	            			</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	@endsection