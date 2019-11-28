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


        <!-- {{-- Main Navigation --}} -->
        @include('frontend.partials.nav')


        <div class="container">
            <div class="cart-section">
                <div class="row">
                    <div class="col-md-8 col-12">
                        @if (!empty($datas))
                            @foreach ($datas as $data)
                                <div class="cart-section-container">
                                <div class="single-item">
                                    <img class="img-fluid" src="{{asset('images/products/'.$data['image'])}}" >
                                    <div class="title">
                                        {{$data['name']}}
                                    </div>
                                    <div class="price">
                                        Rs. {{$data['price']}}
                                    </div>
                                    <div class="remove-btn">
                                        <a href="/remove-from-cart/{{$data['cart_id']}}" class="btn">Remove </a>
                                    </div>
                                </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="total-amount-container">

                            <div class="item-count">
                               Items : {{$itemcount}}
                            </div>
                            <div class="total-amount">
                               Amount : Rs. {{$totalamount}}
                            </div>
                            <div class="checkout-btn">
                                <a href="/checkout" class="btn">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--  Footer  section -->
        @include('frontend.partials.footer')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>

</body>

</html>
