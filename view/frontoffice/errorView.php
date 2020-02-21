<?php ob_start(); ?>
<div class="error">
    <?= $errorMessage; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>