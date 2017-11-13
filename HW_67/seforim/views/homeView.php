<?php
    include 'models/categoryModel.php';
    include 'top.php'
?>
<div class="row">
    <div class="col-sm-3">
        <div class="well">Filters</div>
        <?php include "views/categorySelectionView.php" ?>
    </div>
    <div class="col-sm-9">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="sefer" class="col-sm-2 control-label">Select A Sefer</label>
                <div class="col-sm-10">
                <select class="form-control" id="sefer" name="sefer">
                        <?php foreach($seforim as $sefer) :?>
                        <option value="<?= $sefer['id'] ?>"
                        <?php if (!empty($selectedSefer) && $sefer['id'] == $selectedSefer['id']) echo "selected" ?>
                        ><?= $sefer["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Get Info</button>
                </div>
            </div>
        </form>

        <?php if(!empty($selectedSefer)) : ?>
            <h2 class="text-center">
                <?= $selectedSefer['name'] ?> is $<?= number_format($selectedSefer['price'], 2) ?>
            </h2>
        <?php endif ?>
    </div>
</div>

<?php if(!empty($errors)) : ?>
    <h2 class="text-center alert alert-danger">
        <ul>
            <?php foreach($errors as $error) :?>
            <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </h2>
<?php 
endif; 
include 'bottom.php'
?>
    