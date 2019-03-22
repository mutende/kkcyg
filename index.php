<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="MDB/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="MDB/css/mdb.min.css" rel="stylesheet">
    <!--  font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <!-- local css -->
    <link rel="stylesheet" href="css/style.css">
    <title>kkcyg</title>
  </head>
  <body>
    <!-- navbar -->
    <head class="">
        <?php include 'includes/nav.html'; ?>
         </head>
         <!-- landing page -->
    <div class="row">
      <div class="col-md-12">
      <?php include 'includes/landingpage.html'; ?>
      </div>
    </div>
    <!-- posts -->
    <div id="posts-div">
      <a name="posts"></a>
      <?php include 'includes/posts.html'; ?>
    </div>
    <!-- join us contact us about us -->
    <div >
      <a name="jac"></a>
      <?php include 'includes/jac.html'; ?>
    </div>
    <!-- footer -->
    <div>
      <?php include 'includes/footer.html'; ?>
      
    </div>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- Jquery -->
    <script src="MDB/js/jquery-3.3.1.min.js"></script>
    <!-- popper js -->
    <script src="MDB/js/popper.min.js"></script>
    
    <!-- bootsrap.js -->
    <script src="MDB/js/bootstrap.min.js"></script>
  </body>
</html>