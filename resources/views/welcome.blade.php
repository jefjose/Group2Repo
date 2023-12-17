<x-app-layout>

<div class="shrink-0 flex items-center">
    <a href="{{ route('index') }}">
        {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" class="block h-9 w-auto" /> --}}
    </a>
</div>

<head>
<style>
.container-home{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(images/background.jpg);
    background-position: center;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
}
.col{
    flex-basis: 50%;
}
h1{
    color: #fff;
    font-size: 100px;
}
p{
    color: #fff;
    font-size: 20px;
    line-height: 15px;
}
.venue {
    width: 200px;
    height: 230px;
    display: inline-block;
    border-radius: 10px;
    padding: 15px 25px;
    box-sizing: border-box;
    cursor: pointer;
    margin: 10px 15px;
    background-position: center;
    background-size: cover;
    transition: transform 0.5s;
}
.venue1{
    background-image: url(images/pic-1.jpg);
}
.venue2{
    background-image: url(images/pic-2.jpg);
}
.venue3{
    background-image: url(images/pic-3.jpg);
}
.venue4{
    background-image: url(images/pic-4.jpg);
}
.venue5{
    background-image: url(images/pic-5.jpg);
}
.venue6{
    background-image: url(images/pic-6.jpg);
}

.venue:hover{
    transform: translateY(-10px);
}

h5{
    color: #fff;
    text-shadow: 0 0 5px #999;
}

</style>
</head>

<body>
        <div class="container-home">
            <div class="row">
                <div class="col">
                    <h1>UrbanReserve</h1>
                    <p>Unlocking Premier Venue Experiences</p>
                    <div style="text-align: justify; margin-bottom: 20px;">
                <a href="{{ route('book') }}">
                <button style="padding: 10px 20px; background-color: orange; color: #000; border: none; border-radius: 4px; cursor: pointer;
                width: 180px; font-size: 12px; padding: 12px 0; border: 0; border-radius: 20px; outline: none; margin-top: 30px;">
                <b>Book Now</b>
            </button>
        </a>
    </div>
                </div>

                <div class="col">
                    <div class="venue venue1">
                        <h5>Birthday Parties</h5>
                    </div>

                    <div class="venue venue2">
                        <h5>Wedding Receptions</h5>
                    </div>

                    <div class="venue venue3">
                        <h5>Corporate Events</h5>
                    </div>

                    <div class="venue venue4">
                        <h5>Baptism Receptions</h5>
                    </div>

                    <div class="venue venue5">
                        <h5>Family Reunion</h5>
                    </div>

                    <div class="venue venue6">
                        <h5>Engagement Party</h5>
                    </div>
                </div>
            </div>


        </div>

    </body>
            </div>

</x-app-layout>
