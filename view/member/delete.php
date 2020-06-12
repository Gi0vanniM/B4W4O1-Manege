<?php
if (isset($member)) $member = $member;
?>

<div class="container">
    <div class="card mt-5 mx-auto" style="width: 30rem">
        <div class="card-body">
            <h5>Weet je zeker dat je Ruiter '<?= $member['name'] ?>' wilt verwijderen?</h5>
            <a href="<?= URL ?>member" class="btn btn-primary">Annuleer</a>
            <a href="<?= URL ?>member/deleteMember/<?= $member['id'] ?>" class="btn btn-danger float-right">Verwijder</a>

        </div>
    </div>
</div>