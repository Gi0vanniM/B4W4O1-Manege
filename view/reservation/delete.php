<?php
if (isset($reservation)) $reservation = $reservation;
?>

<div class="container">
    <div class="card mt-5 mx-auto" style="width: 30rem">
        <div class="card-body">
            <h5>Weet je zeker dat je reservering #<?= $reservation['id'] ?> wilt verwijderen?</h5>
            <a href="<?= URL ?>reservation" class="btn btn-primary">Annuleer</a>
            <a href="<?= URL ?>reservation/deleteReservation/<?= $reservation['id'] ?>"
               class="btn btn-danger float-right">Verwijder</a>

        </div>
    </div>
</div>