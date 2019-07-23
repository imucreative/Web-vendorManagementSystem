<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo get_data_info('name');?></title>
    <link rel="shortcut icon" href="<?php echo base_url()."uploads/".get_data_info('logo');?>" />

    <link href="<?php echo base_url()?>template/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url()?>template/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div class='text-center'>
                <h1 class="logo-name">
                    <img width='50%' src="<?php echo base_url()?>uploads/<?php echo get_data_info('logo');?>"/>
                </h1>
            </div>
            <h3><?php echo get_data_info('name');?></h3>
            <p>Please Sign in.</p>
            <?PHP
				echo form_open("auth", "class='m-t'");
			?>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small><?php echo get_data_info('name');?> &copy; 2019</small> </p>
            <p class="text-muted text-center"><?php echo $error;?></p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>template/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/bootstrap.min.js"></script>

</body>

</html>
