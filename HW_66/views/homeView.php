
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <?php include 'top.php';?>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>PCS Seforim Center</h1>
        </div>
    </div>
    <?php include'filters.php'?>
    <div class="container col-sm-2">
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

        <?php if(!empty($error)) : ?>
            <h2 class="text-center alert alert-danger">
                <?= $error ?>
            </h2>
        <?php endif ?>
    </div>
</body>

</html>