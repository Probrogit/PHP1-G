<?php
$summa = 0;
$messages=[];

// $summa += $bools[0]['price'];
// $summa += $bools[1]['price'];
// $summa += $bools[2]['price'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$firstName=trim(strip_tags($_POST['firstName']));
$lastName=trim(strip_tags($_POST['lastName']));
$email=trim(strip_tags($_POST['email']));
$address=trim(strip_tags($_POST['address']));

if ($firstName && $lastName && $email && $address){
  saveOrder($firstName,$lastName,$email,$address);
  $query = "INSERT INTO book VALUES (NULL,'автор','название',123,'описание','издательство')";
  file_put_contents(ORDERS, "$order\n", FILE_APPEND);
  $_SESSION['flash']=['success'=>'Заказ оформлен!'];
header('Location: /?page=index');
die;
}

$_SESSION['flash']=['danger'=>'Заполните все поля'];


}

// echo $_POST['firstName'];
// echo "<pre>";
// print_r($_SESSION['basket']);
// echo "<pre>";

$count=0;
foreach($_SESSION['basket'] as $value){
  $count+=$value;
}


?>


    <style>
    .card-deck{
      margin-top: 20px      
    }

    .card-body img{
      display: block;
      margin: 0 auto 15px;

    }
    .card-footer{
      background: transparent;
      border: 0;
    }
    .form-signin {
      width: 100%;
      max-width: 420px;
      padding: 15px;
      margin: auto;
    }
    </style>


  
<h2>Оформление заказа</h2>


<?php
if (count($messages)){
    foreach($messages as $message){
      ?>
        <div class="alert alert-danger" role="alert"><?= $message ?></div>
      <?php
    }
}
$summa=0;
?>

  <div class="py-5 text-center">
    <p class="lead">Внимательно заполните поля формы, проверьте корректность введённых данных и позиции товаров и их количество.</p>
  </div>

  <div class="row">
    <div class="col-md-6 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Корзина</span>
        <span class="badge badge-secondary badge-pill"><?=$count?></span>
      </h4>
      <ul class="list-group mb-3">

<?php
if (count($_SESSION['basket']))
  foreach($_SESSION['basket'] as $key=>$value):

    for($i=0;$i < count($books);$i++){
      if ($books[$i]['idbook']==$key){
        $idbook=$books[$i]['idbook'];
        $title=$books[$i]['title'];
        $description=$books[$i]['description'];
        $price=$books[$i]['price'];
        break;
      }
    }

?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?=$title?> </h6>
            <small class="text-muted"><?=$description?></small>
          </div>
          <span class="text-muted"><?=$price?><?=$value?> шт</span>
          <span class="text-muted"><?=$price * $value?></span>
          <span ><a href="?delete=<?=$key?>" class="btn btn-success btn-sm ">Удалить</a></span>
        </li>


        <li class="list-group-item d-flex justify-content-between">
          <span>Всего: </span>
          <strong><?=$summa?> руб.</strong>
        </li>
      </ul>

<?php
$summa+=$price * $value;
endforeach;
?>

    </div>
    <div class="col-md-6 order-md-1">
      <h4 class="mb-3">Информация</h4>
      <form class="needs-validation" novalidate method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Имя</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Укажите корректное имя
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Фамилия</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Укажите корректную фамилию
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(опционально)</span></label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Укажите корректный email 
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Адрес доставки</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="город, улица, дом, квартира" required>
          <div class="invalid-feedback">
            Укажите адрес доставки
          </div>


<?php
$cssClass=count($_SESSION['basket'])?'':'disabled';
?>


          <div class="mb-3">
         <div class="row">
         <input type="submit" class="btn btn-success <?=$cssClass?>" <?=$cssClass?> value="Отправить"
         </div>
         </div>
  </form>
        </div>
