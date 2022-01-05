@extends('layouts.app')

@section('title')
    Tournoehoen
@endsection

@section('content')
     <!-- Header -->
     <header class="text-center">
        <h1>
          Around the Beautiful World
          <br />
          in One Click
        </h1>
        <p class="mt-3">
          Explore the world to find many culture,
          <br />
          value and kindness people
        </p>
  
        <a href="#popularTitle" class="btn btn-get-started px-4 mt-4">
          Get Started
        </a>
      </header>
  
      <main>
        <div class="container">
          <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
              <h2>20K</h2>
              <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
              <h2>12</h2>
              <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
              <h2>3K</h2>
              <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
              <h2>72</h2>
              <p>Partners</p>
            </div>
          </section>
        </div>
  
        <section class="section-popular" id="popular">
          <div class="container">
            <div class="col text-center section-popular-heading">
              <h2 id="popularTitle">Wisata Popular</h2>
              <p>
                Most people say it heaven
                <br />
                in the world
              </p>
            </div>
          </div>
        </section>
  
        <section class="section-popular-content" id="popularContent">
          <div class="container">
            <div class="section-popular-travel row justify-content-center">
              @foreach ($items as $item)    
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="card-travel text-center d-flex flex-column" 
                    style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}')"
                    >
                    <div class="travel-country">{{ $item->location }}</div>
                    <div class="travel-location">{{ $item->title }}</div>
                    <div class="travel-button mt-auto">
                      <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4"
                        >View Details</a
                      >
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </section>
  
        <section class="section-networks">
          <div class="container">
            <div class="row">
              <div class="col-md-4 align-self-center">
                <h2>Our Networks</h2>
                <p>
                  Companies are trusted us more than
                  <br />
                  just trip
                </p>
              </div>
              <div class="col-md-8 text-center">
                <img
                  src="frontend/images/partners.png"
                  alt="Logo Partner"
                  class="img-partner"
                />
              </div>
            </div>
          </div>
        </section>
  
        <section class="section-testimonial-heading" id="testimonialsHeading">
          <div class="container">
            <div class="row">
              <div class="col text-center">
                <h2>They Are Loving Us</h2>
                <p>
                  Moments were giving them
                  <br />
                  the best experience
                </p>
              </div>
            </div>
          </div>
        </section>
  
        <div class="section section-testimonial-content" id="testimonialContent">
          <div class="container">
            <div class="section-popular-travel row justify-content-center">
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                  <div class="testimonial-content">
                    <img
                      class="mb-4 rounded-circle"
                      src="frontend/images/face-person.png"
                      alt="User"
                    />
                    <h3 class="mb-4">Sebuah Nama</h3>
                    <p class="testimonial">
                      "Pokoknyaa rame banget bangsatt, pertama kali ke ubud broww
                      "
                    </p>
                  </div>
                  <hr />
                  <p class="trip-to mt-2">Trip to Ubud</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                  <div class="testimonial-content">
                    <img
                      class="mb-4 rounded-circle"
                      src="frontend/images/face-person.png"
                      alt="User"
                    />
                    <h3 class="mb-4">Sebuah Nama</h3>
                    <p class="testimonial">
                      "Pokoknyaa rame banget bangsatt, pertama kali ke ubud broww
                      "
                    </p>
                  </div>
                  <hr />
                  <p class="trip-to mt-2">Trip to Ubud</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                  <div class="testimonial-content">
                    <img
                      class="mb-4 rounded-circle"
                      src="frontend/images/face-person.png"
                      alt="User"
                    />
                    <h3 class="mb-4">Sebuah Nama</h3>
                    <p class="testimonial">
                      "Pokoknyaa rame banget bangsatt, pertama kali ke ubud broww
                      "
                    </p>
                  </div>
                  <hr />
                  <p class="trip-to mt-2">Trip to Ubud</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                  I Need Help
                </a>
                <a
                  href="{{ route('register') }}"
                  class="btn btn-get-started px-4 mt-4 mx-1"
                >
                  Get Started
                </a>
              </div>
            </div>
          </div>
        </div>
      </main>
  
@endsection