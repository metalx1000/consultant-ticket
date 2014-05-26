<?php

	$id = $_GET['id'];
	$url="../index.php?id=$id";

	$cid = $id;

	if(!isset($id)){
		header( 'Location: error.php' ) ;
	}

	$name = $_GET['name'];

        if(isset($name)){
                header( "Location: $url" ) ;
        }

?>
<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script>
			$(document).ready(function(){

                                $("#title").html("Entering Contacts");

				$("#send").click(function(){
					send();
				});


				function send(){
					var url="submit_log.php";

					$.post(url, $( "#form1" ).serialize()
					).done(function( data ) {
						var url = "<?php echo $url;?>";
						$.mobile.changePage(url);
//						window.location.replace("done.php");	
					}).fail(function() {
						alert( "error - Unable to Send" );
					});

				}
			});
		</script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
                        <div data-role="header" data-position="inline">
                                <h1 id="title">Enter New Contact</h1>
                                <a href="../index.php?id=<?php echo $id;?>" data-icon="home" class="ui-btn-left" data-ajax="false">Home</a>
<!--                               <a href="#" data-icon="gear" class="ui-btn-right">Options</a> -->
                        </div>
			<div data-role="content" data-theme="a">
                            <form id="form1">
				<?php include("../php/contact_view.php");?>
                            </form>
			</div>
		</div>
	</body>
</html>
