<?php
if (isset($horse)) $horse = $horse;
?>

<div class="container">
    <div class="card mt-5 mx-auto" style="width: 30rem">
        <?php if (!empty($horse['image'])) { ?><img class="card-img-top"
                                                    src="<?= URL ?>public/images/<?= $horse['image'] ?>"
                                                    alt=""><?php } ?>
        <div class="card-body">
            <h5>Weet je zeker dat je <?= ucfirst($horse['type']) ?> '<?= $horse['name'] ?>' wilt verwijderen?</h5>
            <a href="<?= URL ?>horse" class="btn btn-primary">Annuleer</a>
            <a href="<?= URL ?>horse/deleteHorse/<?= $horse['id'] ?>" class="btn btn-danger float-right">Verwijder</a>

        </div>
    </div>
</div>
