 <div class="menu">  
 <a class="logo" href="#"><img src="img/logo.png" alt="" title=""/></a> 
	<div class="breadLine">            
		<div class="arrow"></div>
		<div class="adminControl active">
		<?php if(isset($_SESSION['admin']['user_name']) && !empty($_SESSION['admin']['user_name'])){ echo "Welcome ".ucwords($_SESSION['admin']['user_name']); }  ?>
			<!--Welcome !-->
		</div>
	</div>
	<div class="admin">
		<div class="image">
			<!--<img src="#" class="img-polaroid"/>-->                
		</div>
		<ul class="control">                
			<li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
		</ul>
		<!--<div class="info">
			<span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
		</div>-->
	</div>
	<ul class="navigation">            
		<li class="active">
			<a href="dashboard.php">
				<span class="isw-grid"></span><span class="text">Dashboard</span>
			</a>
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Get Notified Users</span>
			</a>
			<ul>       
				<li>
					<a href="user-list.php">
						<span class="icon-pencil"></span><span class="text">View</span>
					</a>                  
				</li> 				
			</ul>                
		</li>
	</ul>
</div>