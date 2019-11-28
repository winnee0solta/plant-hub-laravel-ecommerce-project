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

     <div class="custom-form-section">
            <div class="row">
                <div class="col-md-5 offset-md-3">
                   <div class="custom-form-container">
                       <div class="form-title">
                          Checkout
                       </div>
                        <form action="/checkout" method="POST" >

                            {{ csrf_field() }}
                    <div class="form-group">
                        <label>Customer Name</label>

                        @if ($name != '')
                        <input required name="name" type="text" class="form-control" placeholder="Enter Name" value="{{$name}}">
                        @else
                        <input required name="name" type="text" class="form-control" placeholder="Enter Name">
                        @endif



                    </div>
                    <div class="form-group">
                        <label >Customer Phone</label>

                        @if ($phone != '')
                          <input name="phone" required type="text" class="form-control" placeholder="Enter Phone Number"value="{{$phone}}">

                        @else
                         <input name="phone" required type="text" class="form-control" placeholder="Enter Phone Number">
                        @endif


                    </div>
                    <button type="submit" class="btn submit-btn">Proced to checkout</button>
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
    <script src="{{asset('/js/app.js')}}"></script>

</body>

</html>
