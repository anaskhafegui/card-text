@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-4">Single Card Image</h1>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <img id="myImage" src="{{asset('images/my-image-with-text.jpg')}}" class="card-img-top" alt="card-image">
                    <div class="card-body">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    
                        <button onclick="downloadImage()" class="btn btn-primary">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
function downloadImage() {
  const image = document.getElementById('myImage');
  const url = image.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
  const downloadLink = document.createElement('a');
  downloadLink.href = url;
  downloadLink.download = image.alt + '.jpg';
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);
}
</script>