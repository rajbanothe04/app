<?php include_once('public_header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>

    <div class="container mt-2">

        <?= $page_content; ?>

    </div>

</body>

</html>

<!-- <script>
$(document).ready(function() {
    $('li').click(function() {
        $($this).animate({
            fontSize: '50'
        }, "500");
    });
});
</script> -->
<?php include_once('public_footer.php'); ?>