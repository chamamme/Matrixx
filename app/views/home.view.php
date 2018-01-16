<?php require ("../app/views/layouts/head.php") ?>

<h1> Home </h1>
<h2> Welcome to <?= config('app')['name'] ?></h2>
<h4> <?= config('app')['description'] ?></h4>
<!--<form method="post" enctype="application/x-www-form-urlencoded" action="http://localhost/xtenzaadmin/index.php?action=index&pg=1">-->
<!--    <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" />-->
<!--    <input type="text" name="uname" value="manager@XTENZA">-->
<!--    <input type="password" name="pwd" value="admin123">-->
<!--    <button type="submit">Submit</button>-->
<!--</form>-->

<!-- <form method="post" enctype="application/x-www-form-urlencoded" action="save">
    <input type="text" name="name" value="" placeholder="Name">
    <button type="submit">Submit</button>
</form> -->

<?php require ("../app/views/layouts/footer.php") ?>

