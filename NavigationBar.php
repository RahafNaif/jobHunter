  <!-- popup for notifications -->
  <div class="popup" id="popup">
      <div class="popup-inner" id="popup-inner">
          <a href="#" id="closeIcon" class="closeIcon" onclick="hideNotification()"><i class="material-icons">close</i></a>
          <div class="notificationList">
              <ul>
                  <li class="notificationRow">
                      <div class="notificationIcon">
                          <i class="material-icons">notifications_active</i>
                      </div>
                      <div class="content">
                          <h3>
                              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                          </h3>
                          <p class="date">February 11th 2021</p>
                      </div>
                  </li>
                  <li class="notificationRow">
                      <div class="notificationIcon">
                          <i class="material-icons">notifications_active</i>
                      </div>
                      <div class="content">
                          <h3>
                              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                          </h3>
                          <p class="date">February 11th 2021</p>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <!-- header and logo -->
  <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections -->
  <span class="logo"><img src="img/logo.PNG" alt="logo" /></span>
  <div style="height: 150px; overflow: hidden">
      <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
          <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8cb3f4"></path>
      </svg>
  </div>
  <header>
      <nav>
          <ul class="navLinks1">
              <li><a href="home.php">Home</a></li>
              <?php
                if ($_SESSION['role'] == 2) {
                    print '<li><a href="jobSeekerSearch.php">Job Seekers</a></li>';
                    print '<li><a href="#">My Jobs</a><ul><li><a href="JobListing.php">All Jobs</a></li><li><a href="PostAJob.php">Post a Job</a></li></ul></li>';
                    print '<li><a href="myAdvices.html"> My Advices </a></li>';
                }
                if ($_SESSION['role'] == 1) {
                    print '<li><a href="#">Jobs</a><ul><li><a href="EmployerSearch.php"> Employers </a></li><li><a href="jobSearch.php">Jobs</a></li><li><a href="Myapplicationlist.php">Applied Jobs</a></li></ul></li>';
                    print '<li><a href="myAdvices.html"> My Advices </a></li>';
                }
                ?>
          </ul>
          <ul class="navLinks2">
              <?php
                if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
                    print '<li><a href="#" id="notification" class="notificationIcon" onclick="showNotifications()"><i class="material-icons">notifications</i></a></li>';
                }
                ?>
              <li>
                  <a href="#"><i class="material-icons">person</i></a>
                  <ul>
                      <li><a href= <?php if ($_SESSION['role']==1) echo"JobSeekerViewProf.php"; if ($_SESSION['role']==2) echo"EmployerProfile.php";?> > Profile</a></li>
                      <?php if (isset($_SESSION['role'])) print '<li><a href="http:signout.php">logout</a></li>';
                        else print '<li><a href="http:login.php">login</a></li>';
                        ?>
                  </ul>
              </li>
          </ul>
      </nav>
  </header>