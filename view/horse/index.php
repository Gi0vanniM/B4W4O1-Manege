<?php
if (isset($horses)) $horses = $horses;
?>

<div class="container">

    <h1 class="">Alle paarden in de manege:</h1>

    <div class="card-columns">

        <?php foreach ($horses as $horse) { ?>
            <a href="horse/detail/<?= $horse['id'] ?>" class="card h-100 text-decoration-none text-body bg-light">
                <?php if (!empty($horse['image'])) { ?><img class="card-img img-fluid"
                                                            src="<?= URL ?>images/<?= $horse['image'] ?>"
                                                            alt=""><?php } ?>
                <div class="card-body">
                    <h4 class="card-title"><?= $horse['name'] ?></h4>
                    <p class="card-title"><?= $horse['type'] ?></p>
                    <p class="card-text">
                        Ras: <?= $horse['race'] ?><br>
                        Leeftijd: <?= $horse['age'] ?><br>
                        Schofhoogte: <?= $horse['wither_height'] ?>cm
                    </p>
                </div>
            </a>

        <?php } ?>

    </div>

</div>