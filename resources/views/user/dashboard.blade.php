@extends('user.layouts.master')
@section('page-title')
@endsection
@section('meta-description')
@endsection
@section('main-content')
<!-- TOP HEAD START -->
<div class="top-head">
    <div class="container">
        <div class="row">
            @if (Session::has('errors'))
            <div class="alert alert-danger">
                {{ $errors }}
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <h1 class="title">Your Bills</h1>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <!-- Button trigger modal -->
                <div class="modal-info">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus"></i> Add Bill
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('user.invoice.create')}}">
                                    @csrf
                                    <h2 class="modal-title">Add Bill</h2>
                                    <div class="modal-main">
                                        <div class="row">
                                            {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Company</label>
                                                <select id="normal-select-2" placeholder-text="At&T">
                                                    <option value="1" class="select-dropdown__list-item active">AT&T </option>
                                                    <option value="2" class="select-dropdown__list-item">Phone</option>
                                                    <option value="3" class="select-dropdown__list-item">Internet</option>
                                                    <option value="4" class="select-dropdown__list-item">Wireless</option>
                                                    <option value="5" class="select-dropdown__list-item">TV</option>
                                                </select>
                                            </div> --}}
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Service Type</label>
                                                <input type="text" name="service_type" class="form-control" placeholder="Enter Service Type" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Bill Number</label>
                                                <input type="number" name="bill_no" class="form-control" placeholder="Enter Bill Number" value="" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Merchant ID</label>
                                                <input type="number" name="merchant_id" class="form-control" placeholder="Enter Merchant Id" value="" required>n
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Payment Type</label>
                                                <select id="normal-select-2" name="payment_type" placeholder-text="Select Payment Type">
                                                    <option value="partial" class="select-dropdown__list-item">Partial </option>
                                                    <option value="full" class="select-dropdown__list-item">Full</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Amount</label>
                                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount" value="" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Credit Card</label>
                                                @if($card)
                                                <div class="card-field">
                                                    <input class="form-check-input" type="radio" name="card_id" id="flexRadioDefault1" checked>
                                                    <img src="assets/images/credit-card.png" alt="Credit Card">
                                                    <p>**** **** **** {{$card}}</p>
                                                </div>
                                                @else
                                                <div class="card-field">
                                                    <input class="form-check-input" type="radio" name="card_id" id="flexRadioDefault1" disabled>
                                                    <img src="assets/images/credit-card.png" alt="Credit Card">
                                                    <p>No Card Available</p>
                                                </div>
                                                @endif
                                                <!-- <input id="cardnumber" class="form-control" type="text" placeholder="**** **** **** 7331" pattern="[0-9]*" inputmode="numeric"> -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <label for="company">Date</label>
                                                <input type="date" name="date" id="date" onload="getDate()" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Confirm & Pay</button>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm & Pay</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-form">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <form action="{{route('user.dashboard')}}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="serach-icon" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" name="q" value="{{ request()->get('q')??'' }}" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <form action="{{route('user.dashboard')}}" method="get">
                        <select id="normal-select-1" name="sort" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" placeholder-text="Sort by">
                            <option class="select-dropdown__list-item" value="{{ request()->fullUrlWithQuery(['sort' => 'date']) }}" {{(!empty($applied_filters['sort']) && $applied_filters['sort'] == 'date')  ? 'selected' : ''}}>Date</option>
                            <option class="select-dropdown__list-item" value="{{ request()->fullUrlWithQuery(['sort' => 'amount']) }}" {{(!empty($applied_filters['sort']) && $applied_filters['sort'] == 'amount')  ? 'selected' : ''}}>Amount</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TOP HEAD END -->
<section class="table-section">
    <div class="container">
        <!-- TABLE DESKTOP START -->
        <div class="table-wrapper">
            <div class="table-top-head">
                <div class="row">
                    <div class="col">
                        <div class="date">
                            <p>Date</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="company">
                            <p>Service Type</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="company">
                            <p>Merchant ID</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bill-no">
                            <p>Bill Number</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="payment-type">
                            <p>Payment Type</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bill-ammount">
                            <p>Bill Amount</p>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="discount">
                            <p>Discount</p>
                        </div>
                    </div> --}}
                    <div class="col">
                        <div class="status">
                            <p>Status</p>
                        </div>
                    </div>
                </div>
            </div>
            @forelse($invoices as $invoice)
            <div class="table-head" id="thead">
                <div class="row">
                    <div class="col">
                        <div class="date">
                            <p>{{date('d/m/Y', strtotime($invoice->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="company">
                            <p>{{$invoice->service_type}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bill-no">
                            <p>{{$invoice->merchant_id}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bill-no">
                            <p>{{$invoice->bill_no}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="payment-type">
                            <p>{{$invoice->payment_type}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bill-ammount">
                            <p>${{$invoice->amount}}</p>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="discount">
                            <p class="discount-color">$40.00</p>
                        </div>
                    </div> --}}
                    <div class="col">
                        @if($invoice->status == 'completed')
                        <div class="status"><button class="btn-paid">{{ucfirst($invoice->status)}}</button></div>
                        @elseif($invoice->status == 'pending')
                        <div class="status"><button class="btn-paid" id="pending-btn">{{ucfirst($invoice->status)}}</button></div>
                        @else
                        <div class="status"><button class="btn-danger">{{ucfirst($invoice->status)}}</button></div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="table-head" id="thead">
                <div class="row">
                    <p>No Records Available.</p>
                </div>
            </div>
            @endforelse
        </div>
        <!-- TABLE DESKTOP END -->
        <!-- TABLE MOBILE START -->
        <div class="table-responsive">
            @forelse($invoices as $invoice)
            <div class="table-head" id="thead">
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Date</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>{{date('d/m/Y', strtotime($invoice->created_at)) }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Service Type</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>{{$invoice->service_type}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Merchant ID</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>{{$invoice->merchant_id}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Bill Number</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>{{$invoice->bill_no}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Payment Type</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>{{$invoice->payment_type}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Bill Amount</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>${{$invoice->amount}}</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Discount</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="info-text">
                            <p>$40.00</p>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-6">
                        <div class="info">
                            <p>Status</p>
                        </div>
                    </div>
                    <div class="col-6">
                        @if($invoice->status == 'completed')
                        <div class="status"><button class="btn-paid">{{ucfirst($invoice->status)}}</button></div>
                        @elseif($invoice->status == 'pending')
                        <div class="status"><button class="btn-paid" id="pending-btn">{{ucfirst($invoice->status)}}</button></div>
                        @else
                        <div class="status"><button class="btn-paid btn-danger">{{ucfirst($invoice->status)}}</button></div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="table-head" id="thead">
                <div class="row">
                    <p>No Records Available.</p>
                </div>
            </div>
            @endforelse
        </div>
        <!-- TABLE MOBILE END -->
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-12">
            {{ $invoices->links('vendor.pagination.custom-user') }}
            {{-- <div class="paginate">
                <button class="btn btn-light"><i class="bi bi-chevron-left"></i></button>
                <div class="link"><a href="#">1</a> <span>of</span> <a href="#">10</a></div>
                <button class="btn btn-light"><i class="bi bi-chevron-right"></i></button>
            </div> --}}
        </div>
    </div>
</div>
@endsection
{{-- @section('custom_js') --}}
<script>
function getDate(){
var today = new Date();
document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}
</script>
{{-- @endsection --}}