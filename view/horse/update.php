<?php
if (isset($horse)) $horse = $horse;
?>
<div class="container">

    <h2 class="mt-3"><?= $horse['name'] ?> bijwerken</h2>

    <form class="" name="updateHorse" method="post" action="<?= URL ?>horse/updateHorse" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $horse['id'] ?>">

        <label for="name" class="col-form-label">*Naam:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $horse['name'] ?>" required>

        <label for="race" class="col-form-label">*Ras:</label>
        <input type="text" name="race" id="race" class="form-control" value="<?= $horse['race'] ?>" required>

        <label for="age" class="col-form-label">*Leeftijd:</label>
        <input type="number" name="age" id="age" class="form-control" value="<?= $horse['age'] ?>" required>

        <label for="wither_height" class="col-form-label">*Schofhoogte (in cm):</label>
        <input type="number" name="wither_height" id="wither_height" class="form-control"
               value="<?= $horse['wither_height'] ?>" required>

        <label for="type" class="col-form-label">*Type:</label>
        <select type="text" name="type" id="type" class="form-control custom-select" required>
            <option value="">- Kies type -</option>
            <option value="paard" <?php if ($horse['type'] == "paard") echo "selected" ?> >Paard</option>
            <option value="pony" <?php if ($horse['type'] == "pony") echo "selected" ?>>Pony</option>
        </select>

        <label for="image" class="col-form-label">Foto:</label>
        <input type="file" name="image" id="image" class="form-control"">

        <input type="submit" class="btn btn-warning mt-3" value="Bewerk">
        <a class=" btn btn-danger text-white float-right mt-3 mb-1"
           href="<?= URL ?>horse/delete/<?= $horse['id'] ?>">Verwijder</a>
    </form>
</div>
