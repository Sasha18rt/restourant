@extends('layout')

@section('title') Review @endsection
@section('review') active @endsection
@section('main_content')


  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="review-form-container">
          
          @if(Auth::check())
          <h2 class="text-center mb-4">Leave a Review</h2>
            @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="post" action="review/check">
              @csrf
              <div class="mb-3">
    <label for="email" class="form-label">Your Email Address:</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
           value="{{ Auth::user()->email ?? '' }}" readonly required>
  </div>
              <div class="mb-3">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter review subject" maxlength="255" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Your Review:</label>
                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Write your review here" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Review</button>
              </div>
            </form>
            @else
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Login Required</h5>
      <p class="card-text">You need to be logged in to leave a review.</p>
      <a href="/login" class="btn btn-primary">Login</a> </div>
  </div>
@endif

        </div>
      </div>
    </div>
  </div>

  <h1 class="text-center mt-5">All Reviews</h1>

  <div class="carousel slide carousel-dark" data-bs-ride="carousel" id="reviewCarousel">
    <div class="carousel-inner">
      @foreach($reviews as $key => $el)
      <div class="carousel-item @if($key == 0) active @endif">
        <div class="col-lg-6 offset-lg-3">
          <div class="alert alert-warning">
            <h3>{{ $el->subject }}</h3>
            <p><strong>{{ $el->email }}</strong></p>
            <p>{{ $el->message }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev" style="top: 50%; transform: translateY(-50%);">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next" style="top: 50%; transform: translateY(-50%);">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@endsection

