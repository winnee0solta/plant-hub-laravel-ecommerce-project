<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plant Hub | About </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

<body>
    <div id="wrapper">


        <!-- {{-- Main Navigation --}} -->
        @include('frontend.partials.nav')
        <!-- {{-- Main Navigation ends --}} -->

        <div class="container-fluid">
            <div class="about-us-section">
                <div class="main-title">
                    <span>
                        About us
                    </span>
                </div>

                <div class="about-us-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="img-container">
                                <img class="img-fluid" src="{{asset('/images/zero-two.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-story">
                                <div class="story-title">
                                    Our story
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus unde dicta
                                    nostrum natus id, quasi veritatis molestiae temporibus cupiditate. Aliquam tempora
                                    quidem ab quas cum. Atque debitis deserunt perspiciatis autem.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus unde dicta
                                    nostrum natus id, quasi veritatis molestiae temporibus cupiditate. Aliquam tempora
                                    quidem ab quas cum. Atque debitis deserunt perspiciatis autem.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus unde dicta
                                    nostrum natus id, quasi veritatis molestiae temporibus cupiditate. Aliquam tempora
                                    quidem ab quas cum. Atque debitis deserunt perspiciatis autem.
                                </p>
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
