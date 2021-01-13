<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MyWeb</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/lib/font-awesome/css/font-awesome.css">
    <script src="<?php echo base_url();?>public/lib/jquery-1.8.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/lib/jquery.validate.min.js"></script>
 </head>

  <body> 
    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    <li> <h5>Admin</h5> </li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>index.php/path/about">About Us</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>index.php/clogin/logout">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
               <a class="brand" href="<?php echo base_url();?>index.php/path"><span class="first">Sistem  Informasi</span> <span class="second">Bioskop</span></a>
				
            </div>
        </div>
    </div>
      <script src="<?php echo base_url();?>public/lib/bootstrap/js/bootstrap.js"></script>