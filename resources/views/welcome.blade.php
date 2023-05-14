@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-4">بطاقة تهنئة</h1>
        <div class="card mx-auto" style="width: 18rem;">
            <img src="{{asset('storage/'.$design->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">أضف اسمك لبطاقة التهنئة</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
        <form action="{{url('testimage/'.$design->id)}}" method="post" class="mt-4">
            @csrf
            <div class="form-group">
                <input type="text"  name="text" class="form-control" placeholder="Enter your text here...">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"
            integrity="sha256-FVZFW6Vn4kkwsNcXGcE7r2Lgk8H1n+TfEiL+UnweZ7k="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection