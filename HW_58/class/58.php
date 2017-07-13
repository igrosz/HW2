<?php
    $amount  = "";
    $rate = "";
    $years ="";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['amount'])) {
        #if(!empty($_POST['amount'])) { // empty checks that exists and is 0 or empty string
            if(! is_numeric($_POST['amount']) || $_POST['amount'] < .01) {
                $errors[] = "Amount must be a number greater than 0";
            }
            $amount = $_POST['amount'];
        } else {
            #exit
            $errors[] = "Amount is a required field";
        }
        if(isset($_POST['rate'])) {
        #if(!empty($_POST['rate'])) { // empty checks that exists and is 0 or empty string
            if(! is_numeric($_POST['rate']) || $_POST['rate'] < .01) {
                $errors[] = "Rate must be a number greater than 0";
            }
            $rate = $_POST['rate'];
        } else {
            #exit
            $errors[] = "Rate is a required field";
        }
        if(isset($_POST['years'])) {
        #if(!empty($_POST['years'])) { // empty checks that exists and is 0 or empty string
            if(! is_numeric($_POST['years']) || $_POST['years'] < 1) {
                $errors[] = "Years must be a number greater than 0";
            }
            $years = $_POST['years'];
        } else {
            #exit
            $errors[] = "Years is a required field";
        }
        if(empty($errors)) {
            $rateToUse = $rate * .01;
            $result = $amount;
            for($i = 0; $i < $years; $i++) {
                $result += $result * $rateToUse;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>PCS Interest Calculator</h1>
        </div>

        <form class="form-horizontal" method="post">
            <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Amount</label>
                <div class="col-sm-10">
                    <input type="xnumber" min=".01" step=".01" class="form-control" id="amount" name="amount" placeholder="Amount" xrequired
                        value="<?= $amount ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="rate" class="col-sm-2 control-label">Rate</label>
                <div class="col-sm-10">
                    <input type="xnumber" min=".01" step=".01" class="form-control" id="rate" name="rate" placeholder="Rate" xrequired
                        value="<?= $rate ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="years" class="col-sm-2 control-label">Years</label>
                <div class="col-sm-10">
                    <input type="xnumber" min="1" step="1" class="form-control" id="years" name="years" placeholder="Years" xrequired
                        value="<?= $years ?>"
                    >
                </div>
            </div>
            <?php if(isset($result)) : ?>
            <div>
                <div class="well col-sm-2 text-right">Result</div>
                <div class="col-sm-10 well">$<?= number_format($result, 2) ?></div>
            </div>
            <?php endif ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Calculate</button>
                </div>
            </div>
        </form>

    </div>
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>