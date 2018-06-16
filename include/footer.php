<span id="fbChk" style="display:none;"><?php echo base64_decode($_REQUEST['access']);?></span>
<footer>
	<div class="container footer_resp">
		<div class="foot_link left padding-t20">
			<div class="logo left resp_footer-2"><img src="images/logo-foot.png"/><span class="foot-no">V.1.0.0<span></div>
			<div class="links right resp_footer-1">
				<ul>
					<li><a href="about.php">About</a></li>
					<li><a href="https://blog.startrishta.com/" target="_blank">Blog</a></li>
					<li><a href="terms.php">Terms</a></li>
					<li><a href="privacy-policy.php">Privacy</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li><a href="contacts.php">Contact</a></li>
				</ul>
			</div>
		</div>
		<div class="foot_link left padding-t5 padding-b20">
			<div class="links right resp_footer-3">
				<ul>
					<li>
						<span class="recmnd" href="#">
							<i class="fa fa-heart"></i> Recommend us!
						</span>
					</li>
					<li>
						<span>
							<div class="fb-like" data-href="https://www.facebook.com/startrishta/" data-layout="button_count" data-action="like" data-show-faces="true"></div>
						</span>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));
						</script>
					</li>
					<li>
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="startrishta">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^https:/.test(d.location)?'https':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						
					<!--<li>
						<span >
						<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="70"></div>
						</span>
						
						<script src="https://apis.google.com/js/platform.js" async defer></script>
					</li> -->
				</ul>
			</div>
			<div class="logo left resp_footer-4">
				<p>Copyright &copy; <?php echo date('Y'); ?> Startrishta. All rights reserved.</p>
			</div>
		</div>
	</div>

    <span id="chkUserId" style="display:none;"><?php echo base64_encode($_SESSION['user_id']);?></span>
</footer>
<!--########################MODAL FOR ERROR ALERT##################################-->
<div id="error_alert" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Alert</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b id="error_message1"></b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">OK </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="alert_modal" class="modal fade login_pop" role="dialog" style="z-index:10000">
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b id="error_message_header">Alert</b></h4>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b id="error_message"></b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal" id="alert_button">OK </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<!--#########################################################################################################---->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG8r0vfpOTrfshIe00Sp1YvUjFOteMICE&libraries=places" async defer></script>
<script src="js/jquery.min.js"></script>
<script src="js/bx.easing.js"></script>
<script src="js/bx.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-filestyle.js"></script>
<script src="js/jquery-ui.js"></script>


<script type="text/javascript" src="social/js/oauthpopup.js"></script>
<script type="text/javascript">

$("#profile_null").click(function(){
	$("#addProfilePhotoModal").modal('show');
	$("#upload-image-body-content").html('');
	$("#upload-image-body-content").append("<h4 class='align-c width-80'>Upload Photos</h4><h4 class='align-c width-80'>and Increase your Reputation today.</h4>");
});

$("#profile_null_gmh").click(function(){
	$("#addProfilePhotoModal").modal('show');
	$("#upload-image-body-content").html('');
	$("#upload-image-body-content").append("<h4 class='align-c width-80'>Upload Photos</h4><h4 class='align-c width-80'>and Increase your Reputation today.</h4>");
	
});

$("#profile_not_verified").click(function(){ 
	$('#error_message_header_verify').html('Alert');
	$('#error_message_verify').html('Please verify your email id first.');
	$('#alert_modal_verify').modal('show');
});

/*$(window).load(function () {
var check_profile = ($(".pic").attr('data'));
    if(check_profile == '1'){
    	$("#addProfilePhotoModal").modal('show');
    	$("#upload-image-body-content").html('');
		$(".upload-image-body-content").append("<h4 class='align-c width-80'>Upload Photos</h4>" + "<h4 class='align-c width-80'>Upload Photo.</h4>");
    }
});*/


//###############################################################################################
		var auto_refresh = setInterval(
			function ()
			{
				$('#profile_counter').load('classes/user_class.php?action=updatecounter');
			}, 1000);
	var mcount=1;
	function refreshMsgCount(){
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{action:'refreshMsgCount'},
			success:function(result){
				//console.log(mcount);
			//console.log(result);
				if(result != 0){
					$('#notify_msg').show().html(result);

					if(result==mcount)
					{
						$('#chatAudio')[0].play();
					}

				}else{
					$('#notify_msg').hide();
				}
				mcount=result;
				mcount++;
			}
		});
	}
	setInterval(function(){ refreshMsgCount() }, 10000);
	rcount=0;
	function refreshRealTimeGifts(){
		$.ajax({
			type:"POST",
			url:"ajax/credit.php",
			data:{action:'refreshrealtimegifts'},
			success:function(result){
				var html = $.parseJSON(result);
				//console.log(html);
				//alert(rcount);
				var rcount=html['status'];
				/*console.log(rcount);*/
					if(rcount)
					{
						//alert(rcount);
						$('.recievegiftajax').html(json['data']);
						$('.recievegiftajax').modal('show');

					}
				rcount=0;
			}
		});
	}
    setInterval(function(){ refreshRealTimeGifts() }, 5000);

	function getSuspendUser(){
	    var replaceStr = '';
	    $.ajax({
            type: "POST",
            url: "ajax/user.php",
            data: {action: 'checkSuspend'},
            success: function (result) {

                if(result == '0'){
                    replaceStr = result.replace('0','');
                    $('#error_message_header').html('Alert');
                    $('#error_message').html('Your account has been suspended from Startrishta for the following reason: <strong>'+replaceStr+'</strong>. To find out more information please <a href="contacts.php">contact us</a>.');
                    $('#alert_modal').modal('show');
                        setTimeout(function () {
                            $("#alert_modal").modal("hide");
                            window.location.href = 'index.php';
                        }, 5000);
                }
                else{
                    return false;
                }
            }
        });
    }
    if($("#chkUserId").html() != ''){
        setInterval(function(){ getSuspendUser() }, 5000);
    }

    function getDeletedUser(){
	    var replaceStr='';
        $.ajax({
            type:"POST",
            url:"ajax/user.php",
            data:{action:'checkDeleted'},
            success:function(result){
                if(result == '0'){
                    replaceStr = result.replace('0','');
                    $('#error_message_header').html('Alert');
                    $('#error_message').html('Your account has been deleted from Startrishta. To find out more information please <a href="contacts.php">contact us</a>.');
                    $('#alert_modal').modal('show');
                    setTimeout(function () {
                        $("#alert_modal").modal("hide");
                        window.location.href = 'index.php';
                    }, 5000);
                }
                else{
                    return false;
                }
            }
        });
    }

    if($("#chkUserId").html() != ''){
       setInterval(function(){ getDeletedUser() }, 5000);
    }

	$("#fbloginappRight").on('click', function(){ //alert("<?php echo $signUpUrl;?>");return false;
		window.location.href = '<?php echo $signUpUrl;?>';
	});

	if($("#fbChk").html() == "fb_error"){
		$('#error_message_header').html('Alert');
		$('#error_message').html('Facebook import error.');
		$('#alert_modal').modal('show');
	}

	if($("#fbChk").html() == "fb_graph_error"){
		$('#error_message_header').html('Alert');
		$('#error_message').html('There is some network issue. You must provide an access token.');
		$('#alert_modal').modal('show');
	}
</script>