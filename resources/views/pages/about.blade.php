@extends('main')
@section('title','About')
@section('css')
  <style>
   nav.navbar{margin-bottom:0px}
  </style>
@endsection
@section('hero')
  <div class="container-fluid hero-cover">
        <div class="jumbotron">
            <h1>About stuff...</h1>
        </div>
  </div>
@endsection

@section('content')
 <div class="row about">
  <div class="col-md-12">
   {!! \App\Config::where(['name' => 'about_content'])->first()->value !!}
  </div>
 </div>
@endsection