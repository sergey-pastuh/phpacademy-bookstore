<h1>Books</h1>

<br>

<?php foreach ($books as $book) : ?>
	<?=$book ?> 
	<a href="/book-<?=$book->getId()?>.html">
	    Details |  <a onclick="return confirm('Are you sure?')" href='/admin/book/delete/<?=$book->getId()?>'>Delete</a>
	</a> <br>
<?php endforeach; ?>