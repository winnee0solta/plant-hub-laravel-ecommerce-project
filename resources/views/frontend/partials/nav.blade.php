<div class="nav-brand">
    <span>
        Plant
    </span>
    <Span>Hub</Span>
</div>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about-us">About</a></li>
        <li><a href="/shop">Shop</a></li>
        @if (\Auth::check())
            @if (\Auth::user()->title == 'customer')
            @php
                 //get cart count for user
                 $cartcount =  \DB::table('carts')->where('user_id', \Auth::user()->id)->count();
            @endphp
              <li><a href="/cart">Cart  ( {{$cartcount }} ) </a></li>
              <li><a href="/logout">Logout </a></li>

              {{-- loggedin as admin --}}
              @elseif (\Auth::user()->title == 'admin')
              <li><a href="/dashboard">Dashboard </a></li>
            @endif
        @else
        <li><a href="/login">Login</a></li>
        @endif

    </ul>
</nav>
