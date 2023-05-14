@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Designs</h1>
  <div class="row">
    @foreach ($designs as $design)
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('storage/' . $design->image) }}" class="card-img-top" alt="{{ $design->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $design->name }}</h5>
            <a href="{{ route('addtext', $design->id) }}" class="btn btn-primary">add Text</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection