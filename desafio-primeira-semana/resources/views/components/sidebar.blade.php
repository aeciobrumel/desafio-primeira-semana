<div class="home-left">
        <img class="edus-logo-img" src="{{asset ('img/edus-logo.svg')}}" alt="">
        <nav class="nav-items">
            <button class="button-nav-left" onclick="window.location='{{ route('home') }}'">
                <img src="{{asset ('img/house.svg')}}" alt="">
            </button>
            <button class=" button-nav-left btn-logout " onclick="logoutPost()" >
                <img class="" src="{{asset ('img/sign-out.svg')}}" alt=""> 
            </button>
        </nav>
</div>