<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plant Hub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

<body>
    <div id="wrapper">


        @include('backend.partials.nav')

        <div class="custom-form-section">
            <div class="row">
                <div class="col-md-5 offset-md-3">
                   <div class="custom-form-container">
                       <div class="form-title">
                           Edit Product
                       </div>
                        <form action="/dashboard/product/edit/{{$id}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}
                            <div class="form-group">
                        <label >Image</label><br>
                        <img class="img-fluid" src="{{asset('images/products/'.$product['image'])}}" style="max-height:250px;" >
                        <input  name="image" type="file" class="form-control"  style="border:none;">
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input required name="name" type="text" class="form-control" placeholder="Enter Product Name" value="{{$product['name']}}">

                    </div>
                    <div class="form-group">
                        <label >Price</label>
                        <input name="price" required type="text" class="form-control" placeholder="Price" value="{{$product['price']}}">
                    </div>
                    <button type="submit" class="btn submit-btn">Update Product</button>
                    </form>
                   </div>
                </div>
            </div>
        </div>


        <!--  Footer  section -->
@include('frontend.partials.footer')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
  >
</body>

</html>
