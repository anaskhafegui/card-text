@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Create Design</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('designs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="x_axis">X Axis:</label>
                    <input type="number" name="x_axis" id="x_axis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="y_axis">Y Axis:</label>
                    <input type="number" name="y_axis" id="y_axis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control-file" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
