<!-- Page Header Start-->
<div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="<?php echo SITELINK ?>"><img class="img-fluid" src="../<?php echo ICON ?>" alt=""></a></div>
          </div>
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
           
          <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
            <?php 
                //$pro = runQuery("SELECT * FROM doffers WHERE dstatus='active'  ORDER BY id DESC LIMIT 15 ");
                            ?>
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-pill badge-primary"><?php //echo numRows($pro) ?></span></div>
                 
              </li>
              <!-- <li class="onhover-dropdown"><i data-feather="message-square"></i> -->
                
              </li>
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <li><a class="text-dark" href="javascript:void(0)" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="onhover-dropdown">
                <div class="media profile-media">
                    <img class="rounded-circle" src="./assets/images/avtar/emoji/9.png" alt="">
                </div>
                <ul class="profile-dropdown onhover-show-div">
                    
                  <li><a href="profile"><i data-feather="user"></i><span>Account </span></a></li> 
                   
                  <li><a class="btn btn-light w-100" href="logout"><i data-feather="log-in"></i>Log out</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="d-lg-none col mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
      <!-- Page Header Ends -->