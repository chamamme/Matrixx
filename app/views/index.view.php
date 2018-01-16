<?php require ("../app/views/layouts/head.php") ?>
<h1> Users </h1>
<h4>Total of <?= count($users) ?> users available</h4>
<ul>
    <?php foreach ($users as $user): ?>

        <li> <?= $user->name ?></li>

    <?php endforeach; ?>
</ul>

<?php require ("../app/views/layouts/footer.php") ?>

