<?php
/**
 * Created by PhpStorm.
 * User: DIALLO Lamine
 * Date: 22/01/2020
 * Time: 13:00
 *
 * Page connexion base de données 
 */


$liaison = mysqli_connect("localhost","root","","4ipdw_diallo");
mysqli_set_charset($liaison,'UTF8');


function query($query,$b=true){
    global $liaison;
    $res = mysqli_query($liaison,$query);

    if($b)
        echo mysqli_error($liaison);

    return $res;

}