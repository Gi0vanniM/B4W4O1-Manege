<?php
if (isset($horse)) $horse = $horse;
?>

<div class="container">

    <div class="m-5 bg-primary rounded">

        <h1 class="text-white text-center"><?= $horse['name'] ?></h1>
        <div class="row m-0 text-white">
            <?php if (!empty($horse['image'])) { ?><img class="col-6 h-50"
                                                        src="<?= URL ?>images/<?= $horse['image'] ?>"
                                                        alt=""><?php } ?>
            <div class="col-6">
                <h5 class=""><?= $horse['type'] ?></h5>
                <p class="text-white">
                    Ras: <?= $horse['race'] ?><br>
                    Leeftijd: <?= $horse['age'] ?><br>
                    Schofhoogte: <?= $horse['wither_height'] ?>cm
                </p>
            </div>
        </div>
        <div class="row m-0 text-white">

            <h4 class="ml-3">Reserveringen:</h4>

        </div>

    </div>

</div>
