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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">


<body>
    <div id="wrapper">


        <!-- {{-- Main Navigation --}} -->
        @include('frontend.partials.nav')
        <!-- {{-- Main Navigation ends --}} -->

          <div class="main-banner-slider">
            <a href="">
                <div style="background-image:url(/images/banner_2.jpg)">
                </div>
            </a>
        </div>

        <div class="popular-products">
            <div class="main-title">
                Popular on shop
            </div>

            <div class="container-fluid">
                <div class="popular-products-container">
                <div class="row">
                    @if (!empty($products))
                        @foreach ($products  as $product)
                        <div class="col-md-3 col-6">
                            <div class="single-popular-products" >
                                <div class="image-container">
                                    <img class="img-fluid" src="{{asset('/images/products/'.$product['image'])}}">
                                </div>
                                <div class="single-title">
                                    {{$product['name']}}
                                </div>
                                <div class="single-price">
                                    Rs. {{$product['price']}}
                                </div>
                                <div class="add-to-cart">
                                    <a href="/add-to-cart/{{$product['id']}}" class="btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            </div>
        </div>
        <div class="view-more">
            <a href="" class="btn">View More</a>
        </div>


        <!--  Footer  section -->
@include('frontend.partials.footer')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script>
    $(document).ready(function () {



    //for slick
    $(".main-banner-slider").slick({
        arrows: false,
        dots: false,
        autoplay: true
    });

});
</script>
</body>

</html>
