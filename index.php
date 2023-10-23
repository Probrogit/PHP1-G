<?php

include "inc/config.php";
include "inc/lib.inc.php";
ob_start();

if(!empty($_GET['add2basket'])){
  $add2basket= $_GET['add2basket'];
  if(array_key_exists($add2basket, $_SESSION['basket'])){
    $_SESSION['basket'][$add2basket]++;
  }else{
      $_SESSION['basket'][$add2basket]=1;
    }
  
}

if(!empty($_GET['delete'])){
  $delete= $_GET['delete'];
  if(array_key_exists($delete, $_SESSION['basket'])){
    unset($_SESSION['basket'][$delete]);
  }
    header('Location: /?page=basket');
    die;
  
}



// echo "<pre>";
// print_r($_SESSION['basket']);
// echo "<pre>";





// define('AUTHOR','Pavel');
// define('YEAR','2023');
// define('DBHOST','127.0.0.1');
// define('DBLOGIN','root');
// define('DBPASS','123');
// define('DBNAME','TESTDB');
// $firstName='<h1> Test<h1>';
$firstName=trim(strip_tags('<h1> Test<h1>'));
$lastName=trim(strip_tags('Testov'));
$email=trim(strip_tags('test@test.com'));
$address=trim(strip_tags('Moscow,105077'));
saveOrder($firstName, $lastName, $email, $address);




$successOrder = "Спасибо за заказ, $firstName";
$categories = array("Худлит", "Научпоп", "Фэнтези", "Детективы"); // var_dump($array);
$publisher = array("МарксВебебрс", "Спортпаб", "Научдес", "СоветИздатПромт"); // var_dump($array);
$book = array("МарксВебебрс", "Спортпаб", "Научдес", "СоветИздатПромт"); // var_dump($array);
// выведите содержимое массивов без использования циклов. Создайте ассоциативный
// массив $book, описывающий отдельную книгу должен содержать ключи idbook, 
// title,author, price, description). Если будет время, создайте ассоциативный массив для 
// верхнего меню $menu . Создайте строковую переменную$page значением index 
$book = array(
  "idbook" => "1",
  "title" => "Преступление и наказание",
  "author" => "Ф.М. Достоевский",
  "price" => 1000,
  "description" => "Классика",
);

$page='index';
//$pageName='index';
$menu= [
  'index'=>'Каталог',
  'delivery'=>'Доставка',
  'contacts'=>'Контакты',
  'login'=>'Вход',
  'basket'=>'Корзина',
  'dropdown'=>'Dropdown',
];

// foreach($menu as $key => $value){
//   echo "$key $value, <hr/>";
// }

//Del?
$books=[];
$books[]=$book;
$books[]=[
  "idbook" => "2SADASSDASD",
  "title" => "Mysql",
  "author" => "asdasdasd",
  "price" => 1200,
  "description" => "Asdadsasd",
];
$books[]=[
  "idbook" => "FSDGDSDGSGD",
  "title" => "Book2",
  "author" => "fghfghfgh",
  "price" => 2200,
  "description" => "Asdadsasd",
];
$books[]=[
  "idbook" => "SDFSDBDSFBFSDB",
  "title" => "Book3",
  "author" => "ouiouio",
  "price" => 3200,
  "description" => "Asdadsasd",
];
$books[]=[
  "idbook" => "FDSFSFE",
  "title" => "Book4",
  "author" => "uiouioiuo",
  "price" => 42100,
  "description" => "Asdadsasd",
];
$books[]=[
  "idbook" => "DWEWREWREWR",
  "title" => "Book5",
  "author" => "rqwrqwrqwr",
  "price" => 5200,
  "description" => "Asdadsasd",
];
$books[]=[
  "idbook" => "VSDSDVSVSDVSDVDSV",
  "title" => "Book6",
  "author" => "ewqeqwe",
  "price" => 6500,
  "description" => "Asdadsasd",
];


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->

    <title>PHP часть 1. Основы PHP</title>

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
    </style>
  </head>
  <body>

   

      

 
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
  <a class="navbar-brand" href="/">Интернет-магазин Книжка</a>    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="книгу.." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти!</button>
    </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
  <?= renderMenu ("template/menu", $menu); ?> 
  </div>
  </div>
</nav>

<div class="container">
<?php
  $pageName= '';
  if( !empty($_GET['page'])){
  $page = $_GET['page'];
  }
  switch($page){
    case 'index': $pageName = 'Каталог товаров'; break;
    case 'basket': $pageName = 'Корзина товаров'; break;
    case 'contacts': $pageName = 'Наши контакты'; break;
    case 'delivery': $pageName = 'Доставка'; break;
    case 'login': $pageName = 'Вход на сайт'; break;
  }

//inc/
// echo $page;
if (file_exists("inc/$page.php")){
  include "inc/$page.php";
}

?>


</div>

   
</div>

  
</div>

<div class="container">
     

  </div><!-- /.container -->

    <?php include "inc/footer.inc.php"; ?>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>