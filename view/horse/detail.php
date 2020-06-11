<?php
if (isset($horse)) $horse = $horse;
if (isset($reservations)) $reservations = $reservations;
?>

<div class="container">

    <div class="m-5 bg-primary rounded">
        <div class="horse-card ml-2 mt-1">#<?= $horse['id'] ?></div>
        <h1 class="text-white text-center"><?= $horse['name'] ?></h1>
        <div class="row m-0 text-white">
            <?php if (!empty($horse['image'])) { ?><img class="col-6 h-50"
                                                        src="<?= URL ?>public/images/<?= $horse['image'] ?>"
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
            <div class="col-6">
                <h4 class="ml-3">Reserveringen:</h4>
                <?php if (!empty($reservations)) { ?>

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Van</th>
                            <th scope="col">Tot</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reservations as $reservation) { ?>
                            <tr>
                                <th scope="row"><?= date_format(new DateTime($reservation['start_time']), 'd M H:i') ?></th>
                                <th scope="row"><?= date_add(new DateTime($reservation['start_time']), new DateInterval('PT' . $reservation['duration'] . 'M'))->format('H:i') ?></th>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h5 class="ml-3">Geen reserveringen.</h5>
                <?php } ?>
            </div>

            <?php if ($horse['type'] == 'pony') { ?>
                <div class="col">
                    <div id="info_no_jumpsport" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                         title="<?= VERSCHIL_PAARD_EN_PONY ?>">
                        ❗ Pony niet beschikbaar voor springsport!
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col">
                <a class="btn btn-warning text-white float-right mb-1 mr-1" href="<?= URL ?>horse/update/<?= $horse['id'] ?>">Update</a>
            </div>
        </div>

    </div>

</div>
