@extends('layouts.master')
@section('page-title')
@endsection
@section('meta-description')
@endsection
@section('main-content')
<!-- HERO SECTION -->
<div class="hero-section">
  <div class="container">
    <div class="row hero-info">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <h1><span>Save 15% - 30% <br></span> on your bills with us.</h1>
        <p>The first bill payment platform that bring amazing savings to your existing bills.</p>
        <a class="btn btn-light" href="tel:+44 (234) 8765 8765">Call Us</a>
        <img class="arrow" src="{{ URL::to('/') }}/frontend/assets/img//icons/arrow.png" alt="">
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="calculate-info">
          <div class="ribbon">
            <h4>You Saved!!</h4>
          </div>
          <h2>Calculate Your Discount</h2>
          <h3><span class="text-span">You will save</span> <span class="dollar">$</span> <span class="price">0.00</span></h3>
          <input type="text" class="form-control" placeholder="Enter your bill amount">
          <button type="button" class="btn btn-light">Calculate</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- HERO SECTION -->
<!-- BRAND SECTION -->
<div class="brand-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>We settle <span>payments</span> for</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="owl-carousel">
          <div class="item">
            <img src="{{ URL::to('/') }}/frontend/assets/img/Verizon-Logo.svg" alt="">
          </div>
          <div class="item">
            <img src="{{ URL::to('/') }}/frontend/assets/img/at-t-logo-3352.svg" alt="">
          </div>
          <div class="item">
            <img src="{{ URL::to('/') }}/frontend/assets/img/Charter-Spectrum-Logo.svg" alt="">
          </div>
          <div class="item">
            <img src="{{ URL::to('/') }}/frontend/assets/img/Xfinity.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BRAND SECTION -->
<!-- HOW ITS WORKS -->
<div class="about-timeline">
  <div class="container">
    <h2>How it <span>works?</span></h2>
    <div class="timeline">
      <div class="timeline-left">
        <div class="card left" data-aos="fade-right">
          <div class="row">
            <div class="col-12">
              <h3>1</h3>
              <p>Call us to Signup</p>
            </div>
          </div>
        </div>
      </div>
      <div class="timeline-right">
        <div class="card right" data-aos="fade-left">
          <div class="row">
            <div class="col-12">
              <h3>2</h3>
              <p>Login to your account</p>
            </div>
          </div>
        </div>
      </div>
      <div class="timeline-left">
        <div class="card left" data-aos="fade-right">
          <div class="row">
            <div class="col-12">
              <h3>3</h3>
              <p>Enter your bill info</p>
            </div>
          </div>
        </div>
      </div>
      <div class="timeline-right">
        <div class="card right" data-aos="fade-left">
          <div class="row">
            <div class="col-12">
              <h3>4</h3>
              <p>Click pay & save</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-more">
      <a href="#" type="button" class="btn btn-light">Show Demo</a>
    </div>
  </div>
</div>
<!-- HOW ITS WORKS -->
<!-- CALL TO ACTION SECTION -->
<div class="call-to">
  <div class="container">
    <div class="action-sec">
      <div class="row">
        <div class="col-12">
          <div class="info">
            <h2>Want to save on your bills?</h2>
            <h3>Call Us: +461 412 3224</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- CALL TO ACTION SECTION -->
@endsection