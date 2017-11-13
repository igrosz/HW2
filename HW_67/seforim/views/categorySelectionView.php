<?php
?>

<form>
    <?php foreach($categories as $category) :?>
    <div class="checkbox">
        <label>
        <input type="checkbox" name="category[]" value="<?= $category ?>"
            <?php if (in_array($category, $categoryFilter)) echo ' checked' ?>
        /><?= $category ?>
        </label>
    </div>
    <?php endforeach ?>

    <input type="submit" value="filter"/>
</form>
