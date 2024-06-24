@extends('layout')
@section('title') main page @endsection
@section('main') active @endsection
@section('main_content')

<section class="hero-section d-flex bg-dark">
  <div class="reservation-container col-lg-4 d-flex flex-column align-items-center justify-content-center text-center position-relative">
    <div class="reservation-text  text-white p-4 rounded">
      <h1>{{ $reservationText }}</h1>
      <p>Experience the finest dining in town.</p>
      <a href="#reservation" class=" btn btn-dark">Reserve Now</a>
    </div>
  </div>
  <div class="carousel-container col-lg-8">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/images/1.jpg" class="d-block w-100" alt="Restaurant Image 1">
        </div>
        <div class="carousel-item">
          <img src="assets/images/2.jpg" class="d-block w-100" alt="Restaurant Image 2">
        </div>
        <div class="carousel-item">
          <img src="assets/images/3.jpg" class="d-block w-100" alt="Restaurant Image 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

 <!-- ***** About Area Starts ***** -->
 <section class="section bg-gray" id="about">
        <div class="section-heading">
                    <h1 class="text-center mt-5">About us</h1>
                </div>      
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                    <div class="section-heading">
                          <h1 class="color">Welcome to name</h1>
                      </div>
                      <p style="color:black;">Experience culinary excellence at name, where every dish is a masterpiece crafted with passion and care. Our menu features a delightful fusion of flavors, combining the finest ingredients with innovative techniques to tantalize your taste buds.<br><br>Indulge in a dining experience like no other as our expert chefs create culinary wonders that will leave you craving for more. Whether you're craving classic comfort food or adventurous gastronomic delights, we have something to satisfy every palate.<br><br>Join us at Name and embark on a culinary journey that promises to leave a delicious memory you'll cherish forever.</p>
                      <div class="row">

                            <div class="col-4">
                                <img src="assets/images/tab-icon-01.png" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/tab-icon-02.png" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/tab-icon-03.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->


  <!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h4 color-white>Contact Us</h4>
                            <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                        </div>
                        <p>No reservation needed to enjoy a delicious meal at our restaurant. Feel free to come visit us any time!</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Phone Numbers</h4>
                                    <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Emails</h4>
                                    <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="contact-form bg-dark">
                   <form class="form" id="contact" action="{{ route('reservation') }}" method="post">
                  @csrf  <div class="row ">
                    <div class="col-lg-12">
                      <h4>Table Reservation</h4>
                    </div>
                   
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        <script>
                            $(document).ready(function() {
                                var scrollOffset = 50;
                                var contactOffset = $("#contact").offset().top - scrollOffset;
                                $('html, body').animate({
                                    scrollTop: contactOffset
                                }, 0); 
                            });
                        </script>
                    @endif


                    @if($errors->any())
                    
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red;">{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                @endif
                    <div class="col-lg-6 col-sm-12">
                      <fieldset>
                        <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <fieldset>
                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <fieldset>
                        <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                      </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                    <fieldset>
                      <input type="number" name="number" id="number" placeholder="number of guests" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <input type="time" name="time" required>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" rows="6" id="message" placeholder="Message" ></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                      </fieldset>
                    </div>
                  </div>
                </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ***** Reservation Area Ends ***** -->


    <section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h1 class="mt-5">Menu</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-tabs text-center">
                    <ul class="list-inline">
                        
                        <li class="list-inline-item">
                            <a onclick="showTab(1, this)" href='#menu' >Pasta</a>
                        </li>
                        <li class="list-inline-item">
                            <a onclick="showTab(2, this)" href='#menu' >Pizza</a>
                        </li>
                        <li class="list-inline-item">
                            <a onclick="showTab(3, this)" href='#menu' >Snack</a>
                        </li>
                        <li class="list-inline-item">
                            <a onclick="showTab(4, this)" href='#menu' >Drink</a>
                        </li>
                        <li class="list-inline-item">
                            <a onclick="showTab(0, this)" href='#menu' >All</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <div class="col-lg-12">
                        <section class="tabs-content" id="tab-1"> 
                        <div class="menu-divider "> Pasta </div>

                            @foreach($menu->where('type', 'Pasta')->chunk(2) as $key => $chunk)
                                <article id='tabs-{{ $key + 1 }}'>
                                    <div class="row">
                                        @foreach($chunk as $index => $dish)
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="{{ ($index % 2 == 0) ? 'left-list' : 'right-list' }}">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="/foodimage/{{ $dish->image }}" alt="{{ $dish->title }}" class="menu-image">  
                                                                <h4>{{ $dish->title }}</h4>
                                                                <p>{{ $dish->description }}</p>
                                                                <div class="price">
                                                                    <h6>{{ $dish->price }}$</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            @endforeach
                        </section>

                        <div class="menu-divider"> Pizza</div>

                        <section class="tabs-content" id="tab-2">
                            @foreach($menu->where('type', 'Pizza')->chunk(2) as $key => $chunk)
                                <article id='tabs-{{ $key + 1 }}'>
                                    <div class="row">
                                        @foreach($chunk as $index => $dish)
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="{{ ($index % 2 == 0) ? 'left-list' : 'right-list' }}">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="/foodimage/{{ $dish->image }}" alt="{{ $dish->title }}" class="menu-image">  
                                                                <h4>{{ $dish->title }}</h4>
                                                                <p>{{ $dish->description }}</p>
                                                                <div class="price">
                                                                    <h6>{{ $dish->price }}$</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            @endforeach
                        </section>
                        <div class="menu-divider "> Snack </div>
                        <section class="tabs-content tab-3" id="tab-3">
                            @foreach($menu->where('type', 'Snack')->chunk(2) as $key => $chunk)
                                <article id='tabs-{{ $key + 1 }}'>
                                    <div class="row">
                                        @foreach($chunk as $index => $dish)
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="{{ ($index % 2 == 0) ? 'left-list' : 'right-list' }}">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="/foodimage/{{ $dish->image }}" alt="{{ $dish->title }}" class="menu-image">  
                                                                <h4>{{ $dish->title }}</h4>
                                                                <p>{{ $dish->description }}</p>
                                                                <div class="price">
                                                                    <h6>{{ $dish->price }}$</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            @endforeach
                        </section>

                        <div class="menu-divider "> Drink </div>
                        <section class="tabs-content tab-4" id="tab-4">
                            @foreach($menu->where('type', 'Drink')->chunk(2) as $key => $chunk)
                                <article id='tabs-{{ $key + 1 }}'>
                                    <div class="row">
                                        @foreach($chunk as $index => $dish)
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="{{ ($index % 2 == 0) ? 'left-list' : 'right-list' }}">
                                                        <div class="col-lg-12">
                                                            <div class="tab-item">
                                                                <img src="/foodimage/{{ $dish->image }}" alt="{{ $dish->title }}" class="menu-image">  
                                                                <h4>{{ $dish->title }}</h4>
                                                                <p>{{ $dish->description }}</p>
                                                                <div class="price">
                                                                    <h6>{{ $dish->price }}$</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showTab(tabNumber, linkElement) {
        var tabs = document.querySelectorAll('.tabs-content');
        tabs.forEach(function(tab) {
            tab.style.display = 'none';
        });

        if (tabNumber === 0) {
            tabs.forEach(function(tab) {
                tab.style.display = 'block';
            });

            var dividers = document.querySelectorAll('.menu-divider');
            dividers.forEach(function(divider) {
                divider.style.display = 'block';
            });
        } else {
            var selectedTab = document.getElementById('tab-' + tabNumber);
            selectedTab.style.display = 'block';

            var dividers = document.querySelectorAll('.menu-divider');
            dividers.forEach(function(divider) {
                divider.style.display = 'none';
            });
        }

        var links = document.querySelectorAll('.heading-tabs a');
        links.forEach(function(link) {
            link.classList.remove('active');
        });
        linkElement.classList.add('active');
    }

    window.onload = function() {
        var firstLink = document.querySelector('.heading-tab a');
        showTab(0, firstLink);
    };
</script>









<h1 class="text-center mt-5">All Reviews
  
</h1>


<div class="carousel slide carousel-dark" data-bs-ride="carousel" id="reviewCarousel" style="height: fit-content;">  <div class="carousel-inner">
    @foreach($reviews as $key => $el)
      <div class="carousel-item @if($key == 0) active @endif">
        <div class="col-lg-6 offset-lg-3">
          <div class="alert alert-secondary">
            <h3>{{ $el->subject }}</h3>
            <!-- <p><strong>{{ $el->email }}</strong></p> -->
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
