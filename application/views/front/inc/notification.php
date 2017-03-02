<?php
$notification = $this->session->flashdata('notification');
$error = $notification['error'];
$valid = $notification['success'];
if (isset($valid)) $error = $valid;
if (isset($error)) {
    ?>
    <div
        class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        <?= $error ?>
    </div>
    <?php
}
?>