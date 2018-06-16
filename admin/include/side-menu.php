    <aside class="sidebar affix" role="complementary">
		<div class="sidebar-container">
		    <div class="sidebar-scrollpane">
			<div class="sidebar-content">
			    <div role="tabpanel">
				<!-- Nav tabs -->
				<!-- Tab panes -->
				<div class="tab-content">
				    <div role="tabpanel" class="tab-pane fade in active" id="nav">
						<nav class="main-nav">
						    <ul id="sidebar-nav" class="sidebar-nav">
								<?php
								if($userPrivilege['dashboard'] == 1){ ?>
								<li>
								    <a href="index.php">
										<i class="fa fa-tachometer fa-fw fa-lg"></i> Dashboard &nbsp;
								    </a>
								</li>
								<?php } 
								if($userPrivilege['power_search'] == 1){ ?>
								<li>
								    <a href="power-search.php">
									<i class="fa fa-search fa-fw fa-lg"></i> Power Search</a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['user_list'] == 1){ ?>
								<li>
								    <a href="user-list.php"><i class="fa fa-users fa-fw fa-lg"></i> User List</a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['ep'] == 1){ ?>
								<li>
								    <a href="ep.php"><i class="fa fa-users fa-fw fa-lg"></i>Entertainment Profiles</a>
								</li>
								<?php } ?>
                                <?php
                                if($userPrivilege['pre-registered'] == 1){ ?>
                                    <li>
                                        <a href="pre-registered.php"><i class="fa fa-users fa-fw fa-lg"></i>Pre Registered Users</a>
                                    </li>
                                <?php } else{
                                    echo $userPrivilege['pre-registered']."dssa";
                                }?>
						    </ul><!-- sidebar-nav -->
						    <ul id="sidebar-nav" class="sidebar-nav side-nav">

						    	<?php
								if($userPrivilege['new_photos'] == 1){ ?>
						    	<li>
								    <a href="new-photos.php">
									<i class="fa fa-file-image-o fa-fw fa-lg"></i> New Photos <span><?php echo $newPhotoCount;?></span></a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['moderated_photos'] == 1){ ?>
								<li>
								    <a href="moderated-photos.php">
									<i class="fa fa-file-image-o fa-fw fa-lg"></i> Moderated Photos </a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['new_interests'] == 1){ ?>
								<li>
								    <a href="new-interests.php">
									<i class="fa fa-sun-o fa-fw fa-lg"></i> Interests <span><?php echo $newInterestCount;?></span></a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['photos_reported'] == 1){ ?>
								<li>
								    <a href="photo-report.php">
									<i class="fa fa-flag-checkered fa-fw fa-lg"></i> Photo Reported <span><?php echo $photoReportedCount;?></span></a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['abuse_reported'] == 1){ ?>
								<li>
								    <a href="abuse-report.php">
									<i class="fa fa-flag fa-fw fa-lg"></i> Abuse Reported <span><?php echo $abuseReportCount;?></span></a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['restricted_usernames'] == 1){ ?>
								<li>
								    <a href="restricted-username.php">
									<i class="fa fa-ban fa-fw fa-lg"></i> Restricted Username </a>
								</li>
								<?php } ?>

								<?php
								if($userPrivilege['administration'] == 1){ ?>
								<li>
								    <a href="administration.php">
									<i class="fa fa-user-secret fa-fw fa-lg"></i> Administration </a>
								</li>
								<?php } ?>
						    </ul><!-- sidebar-nav -->
						</nav>
				    </div><!-- tab-pane -->
				</div><!-- tab-content -->
			    </div><!-- tabpanel -->
			</div><!-- sidebar-content -->
		    </div><!-- scrollpane -->
		</div><!-- sidebar-container -->
	</aside><!-- sidebar -->
