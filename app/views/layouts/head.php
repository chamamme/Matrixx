<?php  use App\Core\App; ?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="description" content="<?= $config['app']['description'] ?>">
    <meta name="author" content="<?=  $config['app']['author'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title><?= App::get('config')['app']['name'] ?></title>
</head>
<header>
    <nav>
        <ul>
            <li> <a href="home"> Home </a> </li>
            <li> <a href="about"> About US </a> </li>
            <li> <a href="users"> Users </a> </li>
        </ul>
    </nav>
</header>
<body>