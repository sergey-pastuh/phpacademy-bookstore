<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    .myfooter {
        background-color: black;
        position: fixed;
        height: 50px;
        bottom: 0;
        width: 100%;
    }
    ._a {
        color: grey;
    }
    ._a:hover {
        color: lightgray;
        text-decoration: none;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <title>Generic Book Store</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

    <script src="/js/scripts.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Generic Book Store</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <!--  -->
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/books">Books</a></li>
                <li><a href="/contact-us">Contact</a></li>                                      
                <?php if (!isset($_COOKIE['user'])) : ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>   
                <?php endif?>             
            </ul>   
            <?php if(isset($_COOKIE['user'])) {?>
            <div style="margin-top: 8px;" class="dropdown pull-right">
            <button style="border:none; background: none;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?=$_COOKIE['user']?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="/cart">Cart</a></li> 
                <?php if (isset($_COOKIE['admin'])) : ?>
                <li><a href="/admin/books">Admin</a></li>                    
                <?php endif?>    
                <li><a href="/logout">Logout</a></li>
            </ul>
            </div>
            <?php } ?>
           
            
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">



    <div class="starter-template">
        
        <b><?=\Library\Session::getFlash()?></b>

        <?=$content ?>

        <br>
        <hr>
    </div>


</div><!-- /.container -->
 <footer class="myfooter">
      <div class="container" style="font-size: x-large; padding-top: 10px;">
        <a class="_a" href="/contact-us">Contacts</a> 
        |
        <a class="_a" href="/books">Books</a>
        | 
        <div style="float: right">(c)Spjuns 2017-2018</div>
      </div>
    </footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>