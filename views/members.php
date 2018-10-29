
<?php
require_once ('application/config.php');
include('elements/header.php');?>

<?php
if( is_array($user) ) {
	extract($user);?>

<div class="container">
	<div class="page-header">

<h1>Member <?php echo $user[uID];?></h1>
  </div>

<?php echo $user['first_name'];?> <?php echo $user['last_name'];?><br />
<a href="mailto:<?php echo $user['email'];?>"><?php echo $user['email'];?></a>

</div>
<?php }?>

<?php if( is_array($users) ) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($users as $u){?>
    <h3><a href="<?php echo BASE_URL?>members/view/<?php echo $u['uID'];?>" title="<?php echo $u['first_name'];?> <?php echo $u['last_name'];?>"><?php echo $u['email'];?></a></h3>
    <p><?php echo $u['first_name'];?> <?php echo $u['last_name'];?></p>
    <p><a href="mailto:<?php echo $u['email'];?>"><?php echo $u['email'];?></a></p>

<?php }?>

<?php } ?>

</div>

<?php include('elements/footer.php');?>
