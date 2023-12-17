<x-app-layout>

<head>
    
    <style>
.container-about{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(images/background.jpg);
    background-position: center;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
} 
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    color: #FFFFFF;
    text-align: center;
    font-size: 30px;
}
p {
    line-height: 1.6;
    color: #FFFFFF;
}
.col {
    flex-basis: 50%;
    margin-left: 75px;
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

    </style>
</head>
<body>

<div class="container-about">

    <div class="section">
<br><br><br><br>
        <strong><h2>ABOUT US</h2></strong>
<br><br>
        <p>UrbanReserve is a platform for unlocking extraordinary venue experiences. At UrbanReserve, we understand that every event is a unique celebration, and we are here to make your vision come to life. As a developing event booking system, we pride ourselves on providing a seamless and stress-free experience for event organizers and attendees alike.</p>
<br>
        <p>Our platform offers a curated selection of venues that cater to a variety of occasions, including birthday parties, wedding receptions, corporate events, baptism receptions, family reunions, and engagement parties. We believe that the perfect venue is the cornerstone of any memorable event, and UrbanReserve is dedicated to connecting you with the ideal space for your special moments.</p>
<br>
        <p> With user-friendly navigation and a straightforward booking process, UrbanReserve simplifies the event planning journey. Our commitment to excellence extends beyond the digital realm—we are passionate about creating a community of event enthusiasts and ensuring that each gathering is a resounding success.</p>
<br>
        <p>
        Whether you're a seasoned event planner or organizing a celebration for the first time, UrbanReserve is your trusted partner in turning your event dreams into reality. Join us in reshaping the way events are booked and experienced. Welcome to UrbanReserve, where unforgettable moments begin.
        </p>
    </div>

<br><br>

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


</x-app-layout>
