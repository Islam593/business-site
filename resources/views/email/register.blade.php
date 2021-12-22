<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>

    <style>

      .mail-wrap{

        width: 800px;
        margin: 50px auto 0px;
        font-family: 'Poppins', sans-serif;


      }
      .mail-wrap .mail-header{

      width: 100%;
      background-color: rgb(38, 61, 192);
      height: 320px;
      display:block;
      text-align: center;


      }

      .mail-wrap .mail-header span{
        
        color: rgb(180, 76, 76);
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        padding: 0px 40px;
        font-weight: 700;
        font-size: 40px;
      
      }
      .mail-header img{

        width: 100%;
      }

      .mail-body p{

        margin-top: 350px;
      }

      .mail-wrap.mail-body p{

        height: 300px;
        border: 1px solid lightgrey;
      }
      
      .segment h3{

       background-color: rgb(143, 46, 46);
        
      }

      .segment p{

        background-color: lightsteelblue;
        padding: 10px 80px;
      }

    </style>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;800&family=Poppins:ital,wght@0,100;0,500;1,100;1,200;1,600;1,700&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="mail-wrap">


        <div class="mail-header">
            <span>Welcome to Ace International</span>
            <img src="https://www.aceinl.com/wp-content/uploads/2021/06/happy-team-scaled.jpg" alt="banner-picture">

          

        </div>
        <div class="mail-body">

      <p>We have been providing different IT services like Web Design and Development, Graphics Design, Content Writing and many more ensuring superior quality and matching customers' requirements.! We specialize in designing and developing website using WordPress and different page builders like Elementor and Divi. Our span of services also include Graphics Design and Content Writing.</p>

        </div>
        <div class="segment">

            <h1>Ace International Offers </h1>
            
            <p>Specialized in web content and</p>

            <h3>Web Content Development </h3>
            <img src="https://keenitsolutions.com/products/wordpress/braintech/wp-content/uploads/2020/11/15.png" alt="">
            <p>SEO friendly written contents for different genres of websites. Attractive graphic contents for websites like brochure, leaflet, pamphlet, logo, flyer, PowerPoint presentation and many more.</p>
            <ul>
            <li>Name: {{$mail_user['name']}} </li>
            <li>Email: {{$mail_user['email']}} </li>
            <li>Cell: {{$mail_user['cell']}} </li>
            <li>Username: {{$mail_user['username']}}</li>
            <li>Password: {{$mail_user['password']}} </li>



            </ul>


        </div>
    </div>

    
</body>
</html>