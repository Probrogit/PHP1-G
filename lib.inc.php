<?php

function renderCategories ($template, $categories=[]){
 include "$template.inc.php";
                        }



function renderPublisher ($template, $publisher=[]){
include "$template.inc.php";
}
                           
function renderMenu ($template, $menu=[]){
    include "$template.inc.php";
    }


function saveOrder($firstName, $lastName, $email, $address)
{
    file_put_contents(ORDERS, "$firstName|$lastName|$email|$address\n", FILE_APPEND);
    return true;
}

function getBooksByCategories($category)
{
    $books=[];
    $books[]=[
    "idbook" => "111",
    "title" => "qqq",
    "author" => "wwwww",
    "price" => 33333,
    "description" => "wwwww",
    ];
return $books;
}

function calcAmount($delta=0)
{
static $i = 0;
return $i += $delta;
}

?> 