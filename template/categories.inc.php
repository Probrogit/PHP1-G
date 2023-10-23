<?php 
	if( count($categories) ): 
        $i = 0;
        while ($i < count ($categories)){
          ?>
        <a class="dropdown-item" href="#"><?= $categories[$i];?></a> 
        <?php 
          $i++;
         }else: 
         ?>
        <a class="dropdown-item" href="#">Категорий нет</a> 
        <?php endif; ?>
