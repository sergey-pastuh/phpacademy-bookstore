<h1 style="text-align: center;">Books</h1>

<br>

<table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Price</th>
        <th style="text-align: center;">Details</th>
        <th style="text-align: center;">Delete</th>
      </tr>
    </thead>
    <tbody>
<?php foreach ($books as $book) : ?>    
      <tr>
        <td><?=$book->getTitle()?></td>
        <td><?=$book->getPrice()?></td>
        <td><a href="/book-<?=$book->getId()?>.html">Details</a></td>
        <td><a onclick="return confirm('Are you sure?')" href='/admin/book/delete/<?=$book->getId()?>'>Delete</a></td>
      </tr>
<?php endforeach; ?>	      
    </tbody>
  </table>	