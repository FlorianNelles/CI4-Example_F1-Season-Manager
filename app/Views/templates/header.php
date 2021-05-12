<html >
<head>
    <title>CI4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>


<?php $session = \Config\Services::session();?>

<!-- Language  -->
<?php $language = \Config\Services::language(); ?>

<?php if ($session->get('language') == 'en'): ?>
    <?php $language->setLocale('en');?>
<?php endif; ?>

<?php if ($session->get('language') == 'ger'): ?>
    <?php $language->setLocale('ger');?>
<?php endif; ?>


<nav class="navbar navbar-expand-sm navbar-light bg-danger">
    <a class="navbar-brand" >F1 2020 Season Manager</a>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>"><?php echo lang('navbar.home'); ?><span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>/drivers" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo lang('navbar.driver'); ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>/drivers"><?php echo lang('navbar.driverlist'); ?></a>
                    <a class="dropdown-item" href="<?php echo site_url('/drivers/create');?>"><?php echo lang('navbar.driver_create'); ?></a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>/teams"><?php echo lang('navbar.teams'); ?></a>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>posts" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo lang('navbar.news'); ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>/posts"><?php echo lang('navbar.news'); ?></a>
                    <a class="dropdown-item" href="<?php echo site_url('/posts/create');?>"><?php echo lang('navbar.news_create'); ?></a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>/tests"><?php echo lang('navbar.tests'); ?></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>/about"><?php echo lang('navbar.about'); ?></a>
            </li>
        </ul>


            <ul class="nav navbar-nav navbar-right">

                <!-- Language-->


                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo lang('navbar.language'); ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/languages/english">    <img src="<?php echo base_url();?>/upload/language/english.jpg" height="20px" width="30px">  <?php echo lang('navbar.lang_eng'); ?></a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/languages/german">     <img src="<?php echo base_url();?>/upload/language/german.jpg" height="20px" width="30px">  <?php echo lang('navbar.lang_ger'); ?></a>
                    </div>
                </li>


                <?php if(!$session->get('logged_in')):?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>/users/register"><?php echo lang('navbar.user_create'); ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>/users/login"><?php echo lang('navbar.login'); ?><span class="sr-only">(current)</span></a>
                </li>
                <?php endif;?>
                <?php if($session->get('logged_in')):?>
                    <a class="navbar-brand"><?php echo lang('navbar.username'); ?><?php echo $session->get('username');?></a>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>/users/logout"><?php echo lang('navbar.logout'); ?><span class="sr-only">(current)</span></a>
                    </li>
                <?php endif;?>
            </ul>

    </div>
</nav>
<br>


<div class = "container">

    <!-- messages -->

    <?php if($session->getFlashdata('driver_update')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('driver_update').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('driver_created')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('driver_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('driver_delete')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('driver_delete').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('team_created')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('team_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('team_edit')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('team_edit').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('team_delete')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('team_delete').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('post_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('post_edit')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('post_edit').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('post_delete')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('post_delete').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('login')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('login').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('logout')): ?>
        <?php echo '<p class="alert alert-success">'.$session->getFlashdata('logout').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('no_login')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('no_login').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('false_user')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('false_user').'</p>'; ?>
    <?php endif; ?>

    <?php if($session->getFlashdata('not_admin')): ?>
        <?php echo '<p class="alert alert-danger">'.$session->getFlashdata('not_admin').'</p>'; ?>
    <?php endif; ?>
