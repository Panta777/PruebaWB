<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title><?php echo $titleWeb; ?></title>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet"> 
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
    </head>

    <body>
        <?php $this->load->view("theme_admin/head.php"); ?>
        <div class="container-fluid">
            <?php
            if (isset($mainContent)) {
                $this->load->view($mainContent);
            }
            ?>
        </div>
        <?php $this->load->view("theme_admin/footer.php"); ?>
    </body>
</html>
