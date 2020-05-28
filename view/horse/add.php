<?php
?>
<div class="container">

    <h2 class="mt-3">Nieuw paard toevoegen</h2>

    <form class="" name="addHorse" method="post" action="addHorse" enctype="multipart/form-data">

        <label for="name" class="col-form-label">*Naam:</label>
        <input type="text" name="name" id="name" class="form-control" required>

        <label for="race" class="col-form-label">*Ras:</label>
        <input type="text" name="race" id="race" class="form-control" required>

        <label for="age" class="col-form-label">*Leeftijd:</label>
        <input type="number" name="age" id="age" class="form-control" required>

        <label for="wither_height" class="col-form-label">*Schofhoogte (in cm):</label>
        <input type="number" name="wither_height" id="wither_height" class="form-control" required>

        <label for="type" class="col-form-label">*Type:</label>
        <select type="text" name="type" id="type" class="form-control custom-select" required>
            <option value="">- Kies type -</option>
            <option value="paard">Paard</option>
            <option value="pony">Pony</option>
        </select>

        <label for="image" class="col-form-label">Foto:</label>
        <input type="file" name="image" id="image" class="form-control">

        <input type="submit" class="btn btn-primary mt-3" value="Registreer">
    </form>
</div>
