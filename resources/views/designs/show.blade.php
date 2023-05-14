@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>{{ $design->name }}</h1>
      <p>X Axis: {{ $design->x_axis }}</p>
      <p>Y Axis: {{ $design->y_axis }}</p>
      <p>Created At: {{ $design->created_at }}</p>
      @if($design->image)
        <img src="{{ asset('storage/' . $design->image) }}" alt="Design Image" style="max-width: 500px;">
      @endif
    </div>
    <div class="col-md-4">
      <a href="{{ route('designs.edit', $design->id) }}" class="btn btn-primary">Edit Design</a>
      <form action="{{ route('designs.destroy', $design->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Design</button>
      </form>
    </div>
  </div>
</div>
@endsection
