<h1 style="text-align: center;">Orders</h1>
<br>
<ul class="list-group">
	<?php $i=1; foreach ($orders as $order) : ?> 
	<?php if($order->getAccepted() != 1)  { ?>
	<li class="list-group-item"><a href="/admin/cart-order-show-<?=$order->getId()?>">№<?=$i++?> Order from <?=$order->getUser()?></a></li>
	<?php } endforeach; ?>  
</ul>      
</tbody>
</table> 
<?php if($i == 1) { ?> 
<h3 style="text-align: center; ">There is no orders for now!</h3>
<?php } ?> 