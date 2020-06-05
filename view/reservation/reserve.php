<?php
if (isset($members)) $members = $members;
if (isset($horses)) $horses = $horses;
if (isset($reservations)) $reservations = $reservations;
?>

<div class="container">

    <form class="" action="registerReservation" method="post">

        <h2>Paard reserveren</h2>

        <div class="row">

            <div class="col">
                <!-- RUITER // MEMBER -->
                <label class="col-form-label" for="ruiter">Ruiter:</label>
                <select class="form-control" name="member_id" id="ruiter" required>
                    <option value="">- selecteer ruiter -</option>
                    <?php foreach ($members as $member) { ?>
                        <option value="<?= $member['id'] ?>"><?= $member['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col">
                <!-- PAARD // HORSE -->
                <label class="col-form-label" for="paard">Paard:</label>
                <select class="form-control" name="horse_id" id="paard" required>
                    <option value="">- selecteer paard -</option>
                    <?php foreach ($horses as $horse) { ?>
                        <option value="<?= $horse['id'] ?>"><?= $horse['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>

        <!-- SELECT DATE AND TIME -->
        <label for="dateAndTime" class="col-form-label" id="dateTimeLabel">Datum en tijd:</label>
        <div id="dateAndTime" class="row input-group m-0">
            <input name="date" type="date" class="form-control col" id="date" required>
            <input name="time" type="time" class="form-control col" id="time" required>
        </div>

        <label for="duration" class="col-form-label">Duur:</label>
        <span class="col-form-label float-right">Kosten zijn €<?= COST_PER_HOUR ?> per uur</span>
        <select name="duration" id="duration" class="form-control" required>
            <option value="">- selecteer duur -</option>
            <?php for ($i = 1; $i <= MAX_TIME; $i++) { ?>
                <option value="<?= 60 * $i; ?>"><?= 60 * $i; ?> minuten</option>
            <?php } ?>
        </select>
        <input class="mt-3 btn border-primary" type="submit" value="Reserveer">
    </form>

    <div class="bg-primary mt-5">

        <div class="row">
            <div class="col">
                <span>Ruiter: </span><span id="info_Member"></span>
            </div>
            <div class="col">
                <span>Paard: </span><span id="info_Horse"></span>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <span id="no_jumpsport" class="badge badge-danger" hidden>❗ Paard niet beschikbaar voor springsport!</span>
            </div>
            <div class="col">
                <span id="not_available" class="badge badge-danger" hidden>❗ Paard niet beschikbaar van %START_TIME% tot %END_TIME%!</span>
            </div>
        </div>

    </div>


    <script>
        let reservations = <?= json_encode($reservations) ?>;
        let horses = <?= json_encode($horses) ?>;
        let members = <?= json_encode($members) ?>;
    </script>
    <script src="<?= URL ?>public/js/reservationScript.js"></script>

</div>

