<?php
?>
<div class="container">

    <h2 class="mt-3">Registreer nieuwe ruiter</h2>

    <form class="" name="register" method="post" action="registerMember">

        <label for="name" class="col-form-label">Naam:</label>
        <input type="text" name="name" id="name" class="form-control" required>

        <label for="name" class="col-form-label">Adres:</label>
        <input type="text" name="address" id="address" class="form-control" required>

        <label for="name" class="col-form-label">Telefoon nummer:</label>
        <input type="tel" name="phone" id="phone" class="form-control" required>

        <input type="submit" class="btn btn-primary mt-3" value="Registreer">
    </form>
</div>