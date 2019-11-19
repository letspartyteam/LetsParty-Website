<?php include('session.php'); //connects with the databse and starts a session ?> 

<?php include('headerDM.php'); // Ajax, bootstrap, and css scripts  ?> 
<body>
<?php include('navbar.php'); // css file?>
<div class="container-fluid">
	<div class="row">
		<?php include('mychat.php'); //My Chatrooms section (left section)?>
		<?php //include('chatlist.php'); //List of chat rooms section (right section)?>
	</div>
</div>
<?php //include('password_modal.php'); //1.Chat room password, 2.Add chat room?> 
<?php include('out_modal.php'); // 1.Leave room, 2.Delete room, 3.Add memeber?> <!--ADD CHAT ROOM IS ADDED HERE-->
<?php include('modal.php'); // 1.Logout, 2.Update photo, 3.Account?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){
	
/*	$('#chatRoom').DataTable({//DataTables is a library in PHP to fetch database records
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7//Maximum number of raws per page
	});
*/	
	$('#myChatRoom').DataTable({
	"sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
	"bLengthChange": false,
	"bInfo": false,
	"bPaginate": true,
	"bFilter": false,
	"bSort": false,
	"pageLength": 8
	});
	
	/*$(document).on('click', '.join_chat', function(){
		var cid=$(this).val();
		if ($('#status'+cid).val()==1){
			window.location.href='chatroom.php?id='+cid;
		}
		else if ($('#status'+cid).val()==2){//Admin account
			$('#join_chat').modal('show');
			$('.modal-body #chatid').val(cid);
		}
		else{
			$.ajax({
				url:"addmember.php",
				method:"POST",
				data:{
					id: cid,
				},
				success:function(){
				window.location.href='chatroom.php?id='+cid;
				}
			});
		}
	});
	*/
	$(document).on('click', '#addchatroom', function(){//Is this function writen twice?
		chatname=$('#chat_name').val();
		chatpass=$('#chat_password').val();
			$.ajax({
				url:"add_chatroom.php",
				method:"POST",
				data:{
					chatname: chatname,
					chatpass: chatpass,
				},
				success:function(data){
				window.location.href='chatroom.php?id='+data;
				}
			});
	});
	
	$(document).on('click', '.delete2', function(){
		var rid=$(this).val();
		$('#delete_room2').modal('show');
		$('.modal-footer #confirm_delete2').val(rid);
	});
	
	$(document).on('click', '#confirm_delete2', function(){
		var nrid=$(this).val();
		$('#delete_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteroom.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
	
	/*$(document).on('click', '.leave2', function(){
		var rid=$(this).val();
		$('#leave_room2').modal('show');
		$('.modal-footer #confirm_leave2').val(rid);
	});
	
	$(document).on('click', '#confirm_leave2', function(){
		var nrid=$(this).val();
		$('#leave_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"leaveroom.php",
				method:"POST",
				data:{
					id: nrid,
					leave: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
 */
});
</script>	
</body>
</html>