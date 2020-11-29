<h1>Fresh Books</h1>
<?php foreach ($books as $key => $value) { 	$c = 0;?>
	<h3><?=$value[$c]->getCathegory()?></h3>
<table class="table table-bordered last-books">
    <thead>
      <tr>
        <th style="text-align: center; width:700px; ">Title</th>
        <th style="text-align: center;">Price</th>
        <th style="text-align: center;">Details</th>
      </tr>
    </thead>
    <tbody>
 <?php while(@$value[$c]) { ?>    
      <tr>
        <td><?=$value[$c]->getTitle()?></td>
        <td><?=$value[$c]->getPrice()?></td>
        <td><a href="/book-<?=$value[$c]->getId()?>.html">Details</a></td>
      </tr>
<?php $c++; } ?>
    </tbody>
  </table>	     
<?php }?>


