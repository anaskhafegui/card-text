@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Designs</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="{{ route('designs.create') }}" class="btn btn-primary mb-2">Create Design</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>X Axis</th>
                            <th>Y Axis</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($designs as $design)
                            <tr>
                                <td>{{ $design->id }}</td>
                                <td>{{ $design->name }}</td>
                                <td>{{ $design->x_axis }}</td>
                                <td>{{ $design->y_axis }}</td>
                                <td><img src="{{ asset('storage/' . $design->image) }}" alt="{{ $design->name }}" width="100"></td>
                                <td>{{ $design->created_at }}</td>
                                <td>
                                    <a href="{{ route('designs.show', $design->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('designs.edit', $design->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('designs.destroy', $design->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this design?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
