
		<!--Pop Delete Collection-->
		<div id="deleteAlbumModal" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Delete Collection</b></h4>
						</div>
						<div class="modal-body">
							<span class="login-form">
								<div>
								<h5 class="align-c lh-20">
									<b>Wait! Are you sure</b>
								</h5>
								<h5 class="align-c lh-20">
									<b>you want to delete this photo collection?</b>
								</h5>
								</div>
								    <div class="popup_add_photo margin-t20">
										<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom slat-blue" data-dismiss="modal">Cancel</a>
										<br><br>
										<input type="hidden" value="" id="albumDeleteType">
										<a href="javascript:void(0);" id="delete-album" class="green">Delete</a>
								   </div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Delete Collection-->
		
		<!--Pop up For Made Collection Private-->
		<div id="makeAlbumPrivate" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Confirmation</b></h4>
						</div>
						<div class="modal-body">
							<span class="login-form">
								<div>
									<h5 class="align-c lh-20"><b>You've moved this photo collection to your private pictures. Only you are able to view it now.</b>
									</h5>
								</div>
									<div class="popup_add_photo margin-t20">
										<a href="javascript:void(0);" id="private-album" class="btn btn-default pointer padding-lr-70 custom red">OK </a>
									</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Pop up For Made Collection Private-->
		<!--Pop up For Made Collection Public-->
		<div id="makeAlbumPublicModal" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Confirmation</b></h4>
						</div>
						
						<div class="modal-body">
							<span class="login-form">
								<div>
								<h5 class="align-c lh-20">
									<b>You've made this photo collection public.</b>
								</h5>
								<h5 class="align-c lh-20">
									<b>Everyone on Startrishta will be able to view it.</b>
								</h5>
								</div>
								<input type="hidden" value="" id="albumPublicType">
								<div class="popup_add_photo margin-t20">
									<a href="javascript:void(0);" id="pubic-album" class="btn btn-default padding-lr-70 custom red">OK </a>
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End popup public-->
		<!----------POP UP FOR DELETE PHOTO------------------------>
				<!--start delete model popup -->
		<div id="deletePhotoModal" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div class="clearfix">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Delete Photo</b></h4>
						</div>
						
						<div class="modal-body clearfix">
							<span class="login-form">
								<div>
								<h5 class="align-c lh-20">
									<b>Wait are you sure</b>
								</h5>
								<h5 class="align-c lh-20"> 
									<b>you want to delete this photo?</b>
								</h5>
								</div>
								<input type="hidden" value="" id="deletePhoto_id">
									<div class="popup_add_photo margin-t20">
										<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom slat-blue" data-dismiss="modal">Cancel</a>
										<br><br>
										<a href="javascript:void(0);" id="delete-photo-modal" class="green">Delete</a>
									</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--- delete model popup --->