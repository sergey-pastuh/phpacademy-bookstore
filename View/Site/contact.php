<h1>Contacts</h1>

<form method="post">
<div >
<div style="width: 30%;margin-left:35%" class="form-group">
  <label for="usr">Username:</label>
  <input type="text" name="username" value="<?=$form->username?>" class="form-control" id="usr">
</div>
<div style="width: 30%;margin-left:35%" class="form-group">
  <label for="pwd">Email:</label>
  <input type="text" name="email" value="<?=$form->email?>" class="form-control" id="pwd">
</div>
<div class="form-group">
  <label for="comment">Comment:</label>
  <textarea style="width: 50%;margin-left:25%" name="message" class="form-control" rows="5" id="comment"> <?=$form->message?> </textarea>
</div>
	<button>Go</button>
</form>
</div>
<!-- 	Username:<input type="text" name="username" value="<?=$form->username?>"> <br>
	Email:   <input type="text" name="email" value="<?=$form->email?>"> <br>
	Message: <textarea name="message"><?=$form->message?></textarea> <br>
 -->
