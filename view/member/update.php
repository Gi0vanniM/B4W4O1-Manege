<?php
if (isset($member)) $member = $member;
?>
<div class="container">

    <h2 class="mt-3">Ruiter bijwerken</h2>

    <form class="" name="updateMember" method="post" action="<?= URL ?>member/updateMember">

        <input type="hidden" name="id" value="<?= $member['id'] ?>">

        <label for="name" class="col-form-label">Naam:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $member['name'] ?>" required>

        <label for="name" class="col-form-label">Adres:</label>
        <input type="text" name="address" id="address" class="form-control" value="<?= $member['address'] ?>" required>

        <label for="name" class="col-form-label">Telefoon nummer:</label>
        <input type="tel" name="phone" id="phone" class="form-control" value="<?= $member['phone'] ?>" required>

        <input type="submit" class="btn btn-warning mt-3" value="Bewerk">
        <a class=" btn btn-danger text-white float-right mt-3 mb-1"
           href="<?= URL ?>member/delete/<?= $member['id'] ?>">Verwijder</a>
    </form>
</div>
