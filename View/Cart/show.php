<h1><b>Books in your cart</b></h1>

<br>
<!-- <?php foreach ($books as $book) : ?>
	<?=$book?> <a href="/book-<?=$book->getId()?>.html">Details</a> <br>
<?php endforeach; ?>	 -->
<?php if(isset($books)) { ?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center;">Amount</th>      
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Price</th>
        <th style="text-align: center;">Details</th>
        <th style="text-align: center;"> </th>        
      </tr>
    </thead>
    <tbody>
<?php foreach ($books as $book) : ?>    
      <tr>
        <?php $c = substr_count($_COOKIE['books'], $book->getId());?> 
        <td><a href="/cart-count-minus-<?=$book->getId()?>" style="font-size: large; color: orange;">-</a> <?=$c?> <a href="/cart-count-plus-<?=$book->getId()?>" style="font-size: large; color: orange;">+</a></td>             
        <td><?=$book->getTitle()?></td>
        <td><?=$book->getPrice()?></td>
        <td><a href="/book-<?=$book->getId()?>.html">Details</a></td>
        <?php if(isset($_COOKIE['user'])) { ?>
        <td><a style="color: orange;" href="/cart-delete-<?=$book->getId()?>">Delete from the cart</a></td>
        <?php } ?>
      </tr>
<?php endforeach;?>	      
    </tbody>
  </table>	
<div style="float: left; padding-left: 200px"> <a href="/cart-clear"><h3 style="color: orange">Clear your Cart</h3></a> </div>
<div style="float: right; padding-right: 200px"> <a href="/cart-order"><h3 style="color: orange">Order</h3></a> </div>  
<?php } else { ?>
<br>
<h3 style="color: orange;">There is no books in your cart for now.</h3> <br>
<?php } ?> 