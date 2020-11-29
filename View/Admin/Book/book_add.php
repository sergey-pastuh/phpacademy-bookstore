<h1 style="text-align: center;">Book Adding</h1>

<form method="post" enctype="multipart/form-data">
    <div style="text-align: center;">
        <div style="width: 30%;margin-left:35%" class="form-group">
            <label for="img">Choose Title Image:</label>
            <input id="img" name="imgfile" class="form-control"  type="file"> 
        </div>
        <div style="width: 30%;margin-left:35%" class="form-group">
            <label for="usr">Title:</label>
            <input type="text" name="title" value="<?=$form->title?>" class="form-control" id="usr">
        </div>
        <div style="width: 30%;margin-left:35%" class="form-group">
            <label for="ctg">Cathegory:</label>
            <p><select name="cathegory" id="ctg">
    	       <option selected disabled>Choose the cathegory:</option>
    	       <option value="Science Fiction">Science fiction</option>
    	       <option value="Romance">Romance</option>
    	       <option value="Adventure">Adventure</option>
    	       <option value="Thriller">Thriller</option>
    	       <option value="Horror">Horror</option>
            </select></p>
        </div>
        <div style="width: 30%;margin-left:35%" class="form-group">
            <label for="pwd">Price:</label>
            <input type="number" name="price" value="<?=$form->price?>" class="form-control" id="pwd">
        </div>
        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea  style="width: 50%;margin-left:25%" name="description" class="form-control" rows="5" id="comment"> <?=$form->description?> </textarea>
        </div>
	   <button>Go</button>
    </form>
</div>