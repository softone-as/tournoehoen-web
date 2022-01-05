@extends('layouts.success')

@section('title', 'Checkout Success | Tournoehoen')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
      <div class="col text-center">
        <img src="{{url('frontend/icon/mail.png')}}" alt="mail" />
        <h1 class="mt-2">Yeay! Success</h1>
        <p>
          We've sent you email for trip instruction <br />
          please read it as well
        </p>
        <a href="{{route('home')}}" class="btn btn-home-page mt-3 px-5">
          Home Page</a
        >
      </div>
    </div>
</main>
@endsection
