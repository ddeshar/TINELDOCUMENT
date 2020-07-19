<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
        <?php
        if (empty($s_login_avatar)) {
          $manucha = "user.png";
        }else{
          $manucha = $s_login_avatar;
       }
        ?> 
      <div class="pull-left image"><img class="img-circle" src="assets/images/users/<?=$manucha?>" alt="User Image"></div>
      <div class="pull-left info">
        <p><?=$s_login_username?></p>
        <p class="designation"><?=$s_login_email?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li <?php if($page == 'manual') {echo 'class="active"';} ?>><a href="manual.php"><i class="fa fa-dashboard"></i><span>Manual</span></span></a></li>
      <?php if (isset($_SESSION['is_admin'])): ?>
        <li <?php if($page == 'user') {echo 'class="active"';} ?>><a href="user.php"><i class="fa fa-dashboard"></i><span>user</span></span></a></li>
      <?php endif; ?>
      </ul>
  </section>
</aside>
