@extends('layouts.vue')

@section('title', 'IM Chat - Login')

@section('app')
  @vite(['resources/js/appLogin.js'])
@endsection

@section('content')
  <div class="column items-center">
    <h1 class="row text-h2">IM Chat</h1>
    <div class="row full-width justify-center">
      @if (session('error'))
        <the-login-form
          class="q-gutter-md col-md-3 col-sm-5 col-xs-12"
          error="{{ session('error') }}"
          name="{{ old('name') }}"
        />
      @else
        <the-login-form class="q-gutter-md col-md-3 col-sm-5 col-xs-12" />
      @endif
    </div>
  </div>
@endsection