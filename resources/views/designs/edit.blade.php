@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit Design</h1>
  <form method="POST" action="{{ route('designs.update', $design->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $design->name }}" required>
    </div>

    <div class="form-group">
      <label for="x_axis">X Axis</label>
      <input type="number" class="form-control" id="x_axis" name="x_axis" value="{{ $design->x_axis }}" required>
    </div>

    <div class="form-group">
      <label for="y_axis">Y Axis</label>
      <input type="number" class="form-control" id="y_axis" name="y_axis" value="{{ $design->y_axis }}" required>
    </div>

    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control-file" id="image" name="image">
      @if($design->image)
        <div class="mt-2">
          <img src="{{ asset('storage/' . $design->image) }}" alt="Design Image" style="max-width: 200px;">
        </div>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
