 <!-- ======= Mobile nav toggle button ======= -->
 <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

<!-- ======= Header ======= -->
<header id="header">
  <div class="d-flex flex-column">

    <div align=center class="profile">
      <img src="assets/uploads/profile<?php echo $id?>.jpg" alt="" class="img-fluid">
      <h1 class="text-light"><?php echo $fullname ?></h1><br>
      <button onclick="location.href='logout.php'">Logout</button>
    </div>

    <nav class="nav-menu">
      <ul>
        <li><a href="index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="profile.php"><i class="bx bx-user"></i> Profile</a></li>
        <li><a href="studentAnnouncements.php"><i class="bx bx-server"></i> Announcements</a></li>
        <!-- <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        
        
        <li><a href="#contact"><i class="bx bx-envelope"></i> Contact</a></li> -->

      </ul>
    </nav><!-- .nav-menu -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  </div>
</header><!-- End Header -->