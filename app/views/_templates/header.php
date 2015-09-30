<?php
    $navLinks = [
        'home' => 'Home',
        'gallery' => 'Gallery'
    ];

    if( isset($_SESSION['username'])) {

        $adminLinks = [
            'admin/index' => 'Dashboard',
            'admin/logout' => 'Logout'
        ];
    } else {
        $adminLinks = [ 'admin' => 'Login'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Photo Gallery - Built with PHP &amp; MySQL using MVC Structure Pattern</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= URL ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= URL ?>css/style.css" rel="stylesheet">

    <!-- Bootstrap Theme CSS -->
    <link href="<?= URL ?>css/theme/flatly/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project Photo Gallery</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php foreach($navLinks as $navLink => $navLinkText ) : ?>
                    <?php if($page == $navLink) :
                        $link = sprintf('<li class="active"><a href="%s%s">%s</a></li>', URL , $navLink, $navLinkText);
                        echo $link; ?>
                    <?php else :
                        $link = sprintf('<li><a href="%s%s">%s</a></li>', URL , $navLink, $navLinkText);
                        echo $link; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </li>

                <!-- Display Admin Links -->
                <?php if(count($adminLinks) > 1) : ?>
                <li class="dropdown">
                    <a href="admin/index" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Welcome <?= $_SESSION['username'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <?php foreach($adminLinks as $url => $text) : ?>
                        <li><a href="<?= URL . $url ?>"><?= $text ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </li>
                <?php else : ?>
                <li><a href="<?= URL . 'admin/login'  ?>"><?= $adminLinks['admin'] ?></a></li>
                <?php endif; ?>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Page Content -->
<div class="container-fluid">
