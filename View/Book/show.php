<div style="float: left;" class="text-left round"> <a  href="/books">	&#171;Return to other books</a></div>
<?php if(isset($_COOKIE['user'])) {?>
<div style="float: right;" class="round"> <a style=" color: orange"  href="/cart-<?=$book->getId()?>">Add to the cart</a></div>
<?php }?>
<br>
<br>
<img width='500' height='500' src="webroot\img\<?=$book->getImage()?>" class="img-rounded">
<h1><?=$book->getTitle()?></h1><br>
<div class="text-centre"><?=$book->getDescription()?><br>
<br>
<h4><b>Price</b>:<?=$book->getPrice()?></h4>
</div>
<div>
	<br>
	<br>
	<br>
	<br>
	<form method="post">
	<br>
	<?php if(isset($_COOKIE['user'])) {?>
	<div class="form-group">
 	<label for="comment">Leave a comment about this book</label>
	<textarea class="form-control" rows="5" name="comment" id="text_send"></textarea>
	</div>
	<?php } else {?>
	<div class="alert alert-danger">
	<h4><b style="color:#000000">To be able to comment you must login</b></h4>
	</div>
	<?php }?>
	<hr style="border-top: 1px solid #000000 !important;">

		<div>
		<button class="btn-info btn-lg" id="sender">Send</button>
		</div>
	</form>


	<?php
		$i = 1;

	foreach ($comments as $value) :
	?>
	<div class="container comments-margin" id="container<?= i ?>">
	            <!-- <div class="row"> -->
                <div class="col-md-8">
                <?php if(isset($_COOKIE['user'])) { ?>
                <?php if($value->getUsername() == $_COOKIE['user']||isset($_COOKIE['admin'])) { ?>
                		<div class="dropup pull-right">
  									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options
  									<span class="caret"></span></button>
 										<ul class="dropdown-menu">
 										<li><a href="/comdelete-<?=$value->getId()?>">Delete</a></li>
										<li><button class="edit_button mybutton" id="button_edit_<?= $i ?>">Edit</button></li>
 										</ul>
								</div>
	                   <!-- <div class="comments-list"> -->
                       <!-- <div class="media addmarg">					    -->
				<?php } } ?>
	                   <!-- <div class="comments-list"> -->
						<div class="date">
                        <p class="pull-left"><small><?=$value->getDate()?></small></p>
                        </div>
                        	<?php if($value->getUsername() == isset($_COOKIE['user']) ? $_COOKIE['user'] : null) { ?>
                              <div style="margin-left: 280px"><h4 class="media-heading user_name "><?=$value->getUsername()?></h4></div>
                            <?php } else {?>
                            	<div><h4 class="media-heading user_name "><?=$value->getUsername()?></h4></div>
                            <?php }?>
                            <div style="overflow-y: scroll; border: grey solid; border-radius: 6px; margin-left: 100px; width: 700px; height: 100px; ">
                            <div class="edit_area" hidden id="div_edit_<?= $i ?>">
                              <form action="/comedit" id="form_edit_<?= $i ?>" method="post"><textarea name="edited_message"
																id="text_edit_<?= $i ?>" style="width: 100%; height: 60px;"><?=$value->getMessage()?></textarea>
																<input type="hidden"  id="inp_hid_<?=$value->getId()?>" value="<?=$value->getId()?>" name="comment_id"> <br></form>
																<button id="button_edit_sub_<?= $i ?>" class="btn-info btn-xs" name="butt2" value="<?=$value->getId()?>">Edit</button>

                            </div >
                            <div id="message_old_<?= $i ?>">
                              <?=$value->getMessage()?>
                            </div>
                            </div>
                          </div>
                   </div>
                   <!-- <br> -->
                   <!-- </div> -->
                   <!-- </div> -->
                   <!-- </div> -->
                   <hr style="border-top: 1px solid #000000 ;">
                   <!-- <hr style="border-top: 1px solid #000000 !important;"> -->

    <?php
    $i = $i + 1;
	endforeach; ?>

		<script type="text/javascript">

		$('[name=butt2]').click(function()
		{
				attrib_id = $(this).attr('id');
				num_id = attrib_id.slice(16);
				text_send = $('#text_edit_'+num_id).val();
				id_book = "<?= $_GET['id'] ?>";
				id_id = $(this).val();
				user_comm = "<?= $_COOKIE['user'] ?>";
				ind = "<?= $i ?>";
				//  alert(id_id);
				$.post("\\book2-" + id_book + '.html', {1:text_send, 2:id_id, 3:user_comm}, function(r, s)
				{
					$('#message_old_' + num_id).text(text_send);
				  $('#div_edit_' + num_id).slideUp(1000);
					$('#message_old_' + num_id).slideDown(1050);
	//				alert(r + s)
				});
		});

		</script>


    <script type="text/javascript">

   	$('.edit_button').click(function() {
   		var attrib_id = $(this).attr('id');
   		var num_id = attrib_id.slice(12);
		$('#message_old_' + num_id).slideUp(10);
		$('#div_edit_' + num_id).slideDown(500);
   	});

    </script>


                </div>
            </div>
        </div>
<!-- 	<?php foreach ($comments as $value) : ?>

	<?php endforeach; ?> -->
</div>
