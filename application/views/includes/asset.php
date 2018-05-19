<?php
/*
 * @Date    :25-3-2018
 * @return  :assets (css) for website.
 */
?>


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<?php if (!empty($style)) { ?>
    <link rel = "stylesheet" href = "<?php echo base_url(); ?>assets/css/<?php echo $style; ?>">
<?php } else {
    ?>
    <link rel = "stylesheet" href = "<?php echo base_url(); ?>assets/css/style.css">
<?php }
?>

