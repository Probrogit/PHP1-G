<?php
//INC!

?>

<div class="row">
<div class="col-md-3 col-sm-3 ">
        
  <h4>Категория</h4>
 
 
  <div class="row">
  <?= renderCategories ("template/categories", $categories); ?> 



  </div>
 <hr>
         
 <h4>Цена</h4>
  
  <div class="row">
    <div class="input-group mb-1">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-default">от</span>
    </div>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> &nbsp;
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">до</span>
    </div>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">&nbsp;

    <button type="button" class="btn btn-success">Найти</button>    
  </div>
  </div>
 <hr>  
  <h4>Издательство</h4>

  <div class="row">

<?=renderPublisher('template/publisher',$publisher) ?>

  </div>
 <hr>
</div>

<div class="col-md-9 col-sm-9 ">


  <h1><?= $pageName ?></h1>






<?php
$bookCounter = ceil(count($books) / 3) * 3;

?>

  <?php for($i=0; $i< $bookCounter;$i +=3) { ?>
  <div class="card-deck"> 
    <?php for($j=$i; $j< $i+3;$j++) { ?>

      <?php
if(array_key_exists($j,$books))
{
  $price=$books[$j]['price'];
  $title=$books[$j]['title'];
  $description=$books[$j]['description'];
  $idbook=$books[$j]['idbook'];
  $author=$books[$j]['author'];
} else {
  $price=' - ';
  $title=' - ';
  $description=' - ';
  $idbook=' - ';
  $author=' - ';
}

      ?>


      <div class="card">
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title"><?= $price ?></h3>
          <p class="card-text"><small class="text-muted">Автор: <?= $author ?></small></p>
          <p class="card-text"><?= $title ?></p>
          <p class="card-text"><?= $description ?></p>
        </div>
        <div class="card-footer">
          <a href="?add2basket=<?= $books[$j]['idbook'] ?>"class="btn btn-primary">В корзину</a>
        </div>
      </div>
      <?php } ?>
  </div>
  <?php } ?>

