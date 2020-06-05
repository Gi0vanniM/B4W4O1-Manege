<?php
if (isset($horses)) $horses = $horses;
?>
<div class="container">
    <div class="row m-0">
        <h1 class="col my-2 p-0 pl-2">Alle paarden in de manege:</h1>
        <a href="horse/add" class="btn btn-primary float-right m-2">Nieuw paard</a>
    </div>

    <div class="card-columns">

        <?php foreach ($horses as $horse) { ?>
            <a href="horse/detail/<?= $horse['id'] ?>" class="card h-100 text-decoration-none text-body bg-light">
                <?php if (!empty($horse['image'])) { ?><img class="card-img img-fluid"
                                                            src="<?= URL ?>public/images/<?= $horse['image'] ?>"
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