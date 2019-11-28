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


        <!-- table -->
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="custom-table-container">
                   <div class="table-responsive">
                       <table class="table">
                           <thead>
                               <tr>
                                   <th scope="col">S.N</th>
                                   <th scope="col">Image</th>
                                   <th scope="col">Ordered Date</th>
                                   <th scope="col">Product Name</th>
                                   <th scope="col">Product Price</th>
                                   <th scope="col">Customer Name</th>
                                   <th scope="col">Customer Phone</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               @if (!empty($datas))
                               @php
                               $count = 1;
                               @endphp
                               @foreach ($datas as $data)
                               <tr>
                                   <th scope="row">{{$count}}</th>
                                   <td>
                                       <img src="{{asset('images/products/'.$data['image'])}}" class="img-fluid"
                                           style="max-height:120px;">
                                   </td>
                                   <td>{{$data['date']}}</td>
                                   <td>{{$data['name']}}</td>
                                   <td>Rs. {{$data['price']}}</td>
                                   <td>{{$data['customer_name']}}</td>
                                   <td>{{$data['customer_phone']}}</td>
                                   <td>
                                       <a href="/dashboard/order/remove/{{$data['id']}}"
                                           class="btn remove_btn">Remove</a>
                                   </td>

                               </tr>
                               @php
                               $count++;
                               @endphp
                               @endforeach
                               @endif

                           </tbody>
                       </table>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
  >
</body>

</html>
