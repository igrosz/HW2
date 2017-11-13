<?php include "top.php" ?>
<h2 class="alert alert-danger">Something went wrong!</h2>
<?php if(!empty($errors)) :
        foreach($errors as $error) : ?>
            <h3 class="text-danger"><?= $error ?></h3>
        <?php endforeach;
    endif ?>
<?php include "bottom.php" ?>