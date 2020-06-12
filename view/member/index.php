<?php
if (isset($members)) $members = $members;
?>
<div class="container">
    <div class="row m-0">
        <h2 class="col my-2 p-0 pl-2">Ruiters</h2>
        <a class=" btn btn-primary float-right m-2" href="member/register">Registreer</a>
    </div>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">Adres</th>
            <th scope="col">Telefoon nummer</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($members as $member) { ?>
            <tr>
                <td scope="row"><?= $member['id'] ?></td>
                <td scope="row"><?= $member['name'] ?></td>
                <td scope="row"><?= $member['address'] ?></td>
                <td scope="row"><?= $member['phone'] ?></td>
                <td scope="row"><a class="btn btn-warning text-white float-right mr-1"
                                   href="<?= URL ?>member/update/<?= $member['id'] ?>">Update</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>