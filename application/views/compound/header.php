<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="theme-color" content="#000000" />
    <title><?php echo $page_title;?></title>
    <meta name="description" content="King Profit | Online Earning Application" />
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/img/icon/192x192.png" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
    <link rel="manifest" href="<?php echo base_url()?>__manifest.json" />
</head>

<body>
    <!-- loader -->
    <div id="loader">
        <img src="<?php echo base_url()?>assets/img/loader/loading-icon4.gif" alt="icon" class="loading-icon" />
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-warning text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <a href="<?php echo site_url('Dashboard')?>">
                <div class="pageTitle">King Profit</div>
                <!--<div class="pageTitle"><?php // echo $page_title;?></div>-->
                <!--<h1 class="text-light"><u>King Profit</u></h1>-->
            <!--<img src="<?php // echo base_url()?>assets/img/logo.png" alt="logo" class="logo" />-->
            </a>
        </div>
        <div class="right">
            <ion-icon name="notifications-outline" class="pe-1 text-light"></ion-icon>
        <ion-icon name="refresh-outline" onclick="location.reload();"></ion-icon>
            

        </div>
    </div>
    <!-- * App Header -->