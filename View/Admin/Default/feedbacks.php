<h1 style="text-align: center;">Feedbacks</h1>

<br>
  <ul class="list-group">
<?php $i=1; foreach ($feedbacks as $feedback) : ?> 

  <li class="list-group-item"><a href="/admin/feedback-show-<?=$feedback->getId()?>">№<?=$i++?> Message from  <?=$feedback->getUsername()?></a></li>
<?php endforeach; ?>  
  </ul>      
<?php if(!$feedback) { ?> 
<h3 style="text-align: center; ">There is no orders for now!</h3>
<?php } ?> 