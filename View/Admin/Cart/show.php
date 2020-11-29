<?php
use Library\Request;
$request = new Request();

?>
<h1 style="text-align: center;"><b>Order</b></h1>

<br>
<!-- <?php foreach ($books as $book) : ?>
	<?=$book?> <a href="/book-<?=$book->getId()?>.html">Details</a> <br>
<?php endforeach; ?>	 -->
<table style="text-align: center;" class="table table-bordered">
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
<?php $c = substr_count($list['orders'], $book->getId());?>
        <td><?=$c?></td>       
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
<div style="float: left; padding-left: 200px"> <a href="/admin/cart-order-delete-<?=$request->get('id')?>"><h3 style="color: orange">Deny</h3></a> </div>
<div style="float: right; padding-right: 200px"> <a href="/admin/cart-order-accept-<?=$request->get('id')?>"><h3 style="color: orange">Accept</h3></a> </div>