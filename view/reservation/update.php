<?php
if (isset($members)) $members = $members;
if (isset($horses)) $horses = $horses;
if (isset($reservations)) $reservations = $reservations;
if (isset($reservation)) $reservation = $reservation;

$dateTime = new DateTime($reservation['start_time']);
$date = $dateTime->format("Y-m-d");
$time = $dateTime->format("H:i");
?>

<div class="container">

    <form class="mt-3" name="updateReservation" action="<?= URL ?>reservation/updateReservation" method="post">

        <h2>Reservering bewerken</h2>

        <!-- SEND ID -->
        <input type="hidden" name="id" value="<?= $reservation['id'] ?>">

        <div class="row">

            <div class="col">
                <!-- RUITER // MEMBER -->
                <label class="col-form-label" for="ruiter">Ruiter:</label>
                <select class="form-control" name="member_id" id="ruiter" required>
                    <option value="">- selecteer ruiter -</option>
                    <?php foreach ($members as $member) { ?>
                        <option value="<?= $member['id'] ?>" <?php if ($member['id'] == $reservation['member_id']) echo "selected" ?>><?= $member['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col">
                <!-- PAARD // HORSE -->
                <label class="col-form-label" for="paard">Paard:</label>
                <select class="form-control" name="horse_id" id="paard" required>
                    <option value="">- selecteer paard -</option>
                    <?php foreach ($horses as $horse) { ?>
                        <option value="<?= $horse['id'] ?>" <?php if ($horse['id'] == $reservation['horse_id']) echo "selected" ?>><?= $horse['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>

        <!-- SELECT DATE AND TIME -->
        <label for="dateAndTime" class="col-form-label" id="dateTimeLabel">Datum en tijd:</label>
        <div id="dateAndTime" class="row input-group m-0">
            <input name="date" type="date" class="form-control col" id="date" value="<?= $date ?>" required>
            <input name="time" type="time" class="form-control col" id="time" value="<?= $time ?>" required>
        </div>


        <!-- DURATION -->
        <label for="duration" class="col-form-label">Duur:</label>
        <span class="col-form-label float-right">Kosten zijn €<?= COST_PER_HOUR ?> per uur</span>
        <select name="duration" id="duration" class="form-control" required>
            <option value="">- selecteer duur -</option>
            <?php for ($i = 1; $i <= MAX_TIME; $i++) {
                $dur = 60 * $i; ?>
                <option value="<?= $dur ?>" <?php if ($dur == $reservation['duration']) echo "selected" ?>><?= $dur ?>
                    minuten
                </option>
            <?php } ?>
        </select>

        <input id="submitButton" class="mt-3 btn border-warning" type="submit" value="Bewerk" disabled>
        <a class=" btn btn-danger text-white float-right ml-1 mt-3 mb-1"
           href="<?= URL ?>reservation/delete/<?= $reservation['id'] ?>">Verwijder</a>

        <!-- Modal menu to view the reservations of the horse selected -->
        <button id="modal_button" type="button" class=" mt-3 btn btn-primary float-right" data-toggle="modal"
                data-target="#horseReservationModal" disabled>
            Bekijk Paard Reserveringen
        </button>
        <div class="modal fade" id="horseReservationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Reserveringen van <span id="modal_horse"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal_text">
                        . . .
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!-- info screen of the reservation -->
    <div class="bg-primary mt-5 text-white p-3 rounded">

        <div class="row">
            <div class="col">
                <span>Ruiter: </span><span id="info_member"></span>
            </div>
            <div class="col">
                <span>Paard: </span><span id="info_horse"></span>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div id="info_no_jumpsport" class="badge badge-danger" hidden data-toggle="tooltip" data-placement="top"
                     title="<?= VERSCHIL_PAARD_EN_PONY ?>">
                    ❗ Pony niet beschikbaar voor springsport!
                </div>
            </div>
            <div class="col">
                <div id="info_not_available" class="badge badge-danger" hidden>❗ Paard niet beschikbaar van <span
                            id="info_not_start_time"></span> tot <span id="info_not_end_time"></span>!
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span>Prijs: €<span id="info_price">0</span>,-</span>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span>Tijd: van <span id="info_start_time">--:--</span> tot <span id="info_end_time">--:--</span></span>
            </div>
            <div class="col">
                <span> Datum: <span id="info_date">-</span></span>
            </div>
        </div>

    </div>

    <!-- send information so javascript can use it -->
    <script>
        let reservation = <?= $reservation['id'] ?>;
        let reservations = <?= json_encode($reservations) ?>;
        let horses = <?= json_encode($horses) ?>;
        let members = <?= json_encode($members) ?>;
    </script>
    <script src="<?= URL ?>public/js/reservationScript.js"></script>

</div>

<!-- Enable tooltips with jQuery -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
