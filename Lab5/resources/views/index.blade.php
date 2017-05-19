<h1>Alla producter</h1>
<p>Nedan listas alla produkter up</p>

<?php foreach ($products as $product): ?>
  {{$product->title }}<br>
<?php endforeach; ?>
