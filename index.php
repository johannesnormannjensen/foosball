<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foosball</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
          rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            <a href="#top"><?php if (isset($_SESSION['username'])) echo 'Welcome, '.$_SESSION['username']; else echo 'Not logged in' ?></a>
        </li>
        <li >
            <a href="#top">Home</a>
        </li>
        <li>
            <a href="#about">About</a>
        </li>
        <li>
            <a href="#services">Services</a>
        </li>
        <li>
            <a href="php/amiloggedin.php">Am I logged in?</a>
        </li>
        <li>
            <a href="php/logout.php">Logout</a>
        </li>
    </ul>
</nav>

<!-- Header -->
<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center">
        <h1>KEA Foosball</h1>

        <h3>Claim the top of the highscore!</h3>
        <br>
        <a href="<?php if (isset($_SESSION['loginfailure'])) echo 'html/loginfail-modal.html'; else echo 'html/login-modal.html'; ?>"
           id="mymom" class="btn btn-light btn-lg" data-toggle="modal"
           data-target="#logModal">Login</a>
        <a href="html/register-modal.html" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#regModal">Register</a>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="logModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Register Modal -->
    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</header>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong>KEA Foosball</strong>
                </h4>

                <p>K&oslash;benhavn NV<br>Lygten, 37 & 16</p>
                <ul class="list-unstyled">
                    <!--<li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>-->
                    <!--<li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>-->
                    </li>
                </ul>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                    </li>
                </ul>
                <!--<hr class="small">
                <p class="text-muted">Copyright &copy; Your Website 2014</p>-->
            </div>
        </div>
    </div>
</footer>

<!-- jQuery Version 1.11.0 -->
<script src="../js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script>
    // Closes the sidebar menu
    $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
<script type='text/javascript'>
    var myLink = document.getElementById('mymom');
    <?php if (isset($_SESSION['loginfailure'])) echo 'myLink.click();';?>
</script>


</body>

</html>
