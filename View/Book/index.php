<h1><b>Books</b></h1>

<br>
<!-- <?php foreach ($books as $book) : ?>
	<?=$book?> <a href="/book-<?=$book->getId()?>.html">Details</a> <br>
<?php endforeach; ?>	 -->
<table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Price</th>
        <th style="text-align: center;">Details</th>
        <th style="text-align: center;"> </th>        
      </tr>
    </thead>
    <tbody>
<?php foreach ($books as $book) : ?>    
      <tr>
        <td><?=$book->getTitle()?></td>
        <td><?=$book->getPrice()?></td>
        <td><a href="/book-<?=$book->getId()?>.html">Details</a></td>
        <?php if(isset($_COOKIE['user'])) { ?>
        <td><a style="color: orange;" href="/cart-<?=$book->getId()?>">Add to the cart</a></td>
        <?php } ?>
      </tr>
<?php endforeach; ?>	      
    </tbody>
  </table>	
