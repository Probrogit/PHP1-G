 <ul class="list-group col-md-12 col-sm-12">
  <?php if( count($publisher) ): ?>

    <?php for($i =0 ;$i<count($publisher);$i++){ ?>
    <li class="list-group-item">
      <input type="checkbox"   id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1"><?= $publisher[$i];?></label>
    </li>
    <?php } ?>

    <li class="list-group-item">
      <button type="button" class="btn btn-success">Найти</button>    
    </li>
    <?php else: ?>
    <a class="dropdown-item" href="#">Издательств нет</a> 
    <?php endif; ?>

  </ul>
