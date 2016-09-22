<?php require_once 'controller.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Class</title>
        <link type="text/css" rel="stylesheet" href=<?php echo ROOT . "style/style.css"?>>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href=<?php echo ROOT . "style/articles-style.css"?>>
        <link rel="stylesheet" type="text/css" href=<?php echo ROOT . "style/contacts-style.css"?>>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-editable.css">
        <meta charset="utf-8"/>
        <script language="javascript" type="text/javascript" src=<?php echo ROOT . "js/jquery-1.10.2.js"?>></script>
        <script language="javascript" type="text/javascript" src=<?php echo ROOT . "js/jquery-ui.js"?>></script>
        <script language="javascript" type="text/javascript" src=<?php echo ROOT . "js/jquery-ui1.js"?>></script>
        <script language="javascript" type="text/javascript" src=<?php echo ROOT . "js/bootstrap.js"?>></script>
        <script src=<?php echo ROOT . "js/GlobalFunctions.js"?>></script>
        <script src=<?php echo ROOT . "js/ValidationForms.js"?>></script>
        <script src=<?php echo ROOT . "js/main.js"?>></script>
    </head>
    <body class="middle">
        <div class="row-fluid span12 big-container">
            <div class="row-fluid span12" id="headerWrapper">
                
            </div>
            <nav class="row-fluid span12" id="menu">
                <ul>
                    <li class="pull-left nav-buttons btn">
                        <div id="search-form">
                            <div id='search_container'>
                                <input type="search" value="" id="search-input" placeholder="Търси..." name='search_text'>
                            </div>
                        </div>
                    </li>
                    <li class="pull-left nav-buttons btn welcome_message">
                        Добре дошли в сайта на 1Б клас на XII ОУ "Св. св. Кирил и Методий"
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Content Sections -->
        <div class="row-fluid span12 big-container">
        <!-- Left Side Vertical Bar -->
        <div class="span3 pull-left left-menu" style="background-color: #f9f9f9; margin-bottom:25px;">
            <ul class="nav nav-list">
                <li class="nav-buttons btn"><a data-id="index" id="nav_index" href="index.php">Начало</a></li>
                <li class="nav-buttons btn"><a data-id="homeworks" id="nav_index" href="homeworks.php">Домашни</a></li>
                <li class="nav-buttons btn"><a data-id="studentbook" id="nav_index" href="studentbook.php">Е - бележник</a></li>
                <li class="nav-buttons btn"><a data-id="schedule" id="nav_index" href="schedule.php">Програма</a></li>
                <li class="nav-buttons btn"><a data-id="index" id="nav_index" href="index.php">Класация</a></li>
                <li class="nav-buttons btn"><a data-id="calendar" id="nav_index" href="calendar.php">Ваканции</a></li>
                <li class="nav-buttons btn"><a data-id="index" id="nav_index" href="index.php">Учебен план</a></li>
                <li class="nav-buttons btn"><a data-id="gallery" id="nav_index" href="gallery.php">Галерия</a></li>
                <li class="nav-buttons btn"><a data-id="contacts" id="nav_contacts" href="contacts.php">Контакти</a></li>
            </ul>
        </div>
        <div class="span9 pull-right" id="wrapper1">