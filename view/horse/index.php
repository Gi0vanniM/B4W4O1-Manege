<?php
if (isset($horses)) $horses = $horses;
?>

<div class="container">

    <h1 class="">Alle paarden in de manege:</h1>

    <div class="card-columns">

        <?php foreach ($horses as $horse) { ?>
            <div class="card h-100 text-decoration-none">
                <?php if (isset($horse['image'])) { ?><img src="<?= URL ?>public/images/<?= $horse['image'] ?>"
                                                           alt=""><?php } ?>
                <div class="card-body">
                    <h4 class="card-title"><?= $horse['name'] ?></h4>
                    <p class="card-text"></p>
                </div>

            </div>

        <?php } ?>

    </div>

</div>