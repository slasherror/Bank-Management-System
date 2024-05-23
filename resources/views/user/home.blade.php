<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>KUET BANK</title>

    <!-- Bootstrap core CSS -->
    <link href="user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="user/assets/css/fontawesome.css">
    <link rel="stylesheet" href="user/assets/css/templatemo-574-mexant.css">
    <link rel="stylesheet" href="user/assets/css/owl.css">
    <link rel="stylesheet" href="user/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">


<!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  @include('user.home.header')
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  @include('user.home.home')

  <!-- ***** Main Banner Area End ***** -->

  @include('user.home.services')

  @include('user.home.about')
  
  @include('user.home.communicate')
  
  @include('user.home.testimonial')
  <div class="container mt-5">
<h1 class="text-center">Contact Address</h1>
<hr>
  <div class="row">
    <div class="col-sm-8">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14701.389756401648!2d89.5023565!3d22.9005524!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9bda1d0ff6e5%3A0x123a926908efcd0c!2sKhulna%20University%20of%20Engineering%20%26%20Technology!5e0!3m2!1sen!2sbd!4v1715797772146!5m2!1sen!2sbd" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="col-sm-4" id="contact2">
        <h3>Contact</h3>
        <hr align="left" width="50%">
        <h4 class="pt-2">KUET Bank</h4>
        <i class="fas fa-globe" style="color:#000"></i> address<br>
        <h4 class="pt-2">Khulna University of Engineering & Technology,</h4>
        <i class="fas fa-phone" style="color:#000"></i> <a href="tel:+"> 123456 </a><br>
        <i class="fab fa-whatsapp" style="color:#000"></i><a href="tel:+"> 123456 </a><br>
        <h4 class="pt-2">Email</h4>
        <i class="fa fa-envelope" style="color:#000"></i> <a href="">test@test.com</a><br>
      </div>
  </div>
</div>

  @include('user.home.partner')
  
  @include('user.home.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="user/vendor/jquery/jquery.min.js"></script>
  <script src="user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="user/assets/js/isotope.min.js"></script>
  <script src="user/assets/js/owl-carousel.js"></script>

  <script src="user/assets/js/tabs.js"></script>
  <script src="user/assets/js/swiper.js"></script>
  <script src="user/assets/js/custom.js"></script>
  <script>
    function toggleSection() {
      var hiddenSection = document.getElementById("hiddenSection");
      if (hiddenSection.style.display === "none") {
        hiddenSection.style.display = "block";
      } else {
        hiddenSection.style.display = "none";
      }
    }
  </script>
    
  </body>
</html>