<?php
  $curs_dolar = $_GET["dolar"];
  $curs_euro = $_GET["euro"];
  $curs_rol = $_GET["rol"];
  $suma = $_GET["suma"];
  $schimb = $_GET["schimb"];
  $schimb_in = $_GET["schimb_in"];
  if ($schimb == "lei")
    if ($schimb_in == "lei") $final = $suma;
    elseif ($schimb_in == "dolar") $final = $suma / $curs_dolar;
    elseif ($schimb_in == "euro") $final = $suma / $curs_euro;
    else $final = $suma / $curs_rol;
  elseif ($schimb == "dolar")
    if ($schimb_in == "lei") $final = $suma * $curs_dolar;
    elseif ($schimb_in == "dolar") $final = $suma;
    elseif ($schimb_in == "euro") $final = $suma * $curs_dolar / $curs_euro;
    else $final = $suma * $curs_dolar / $curs_rol;
  elseif ($schimb == "euro")
    if ($schimb_in == "lei") $final = $suma * $curs_euro;
    elseif ($schimb_in == "dolar") $final = $suma * $curs_euro / $curs_dolar;
    elseif ($schimb_in == "euro") $final = $suma;
    else $final = $suma * $curs_euro / $curs_rol;
  elseif ($schimb == "rol")
    if ($schimb_in == "lei") $final = $suma * $curs_rol;
    elseif ($schimb_in == "dolar") $final = $suma * $curs_rol / $curs_dolar;
    elseif ($schimb_in == "euro") $final = $suma * $curs_rol / $curs_euro;
    else $final = $suma;

  echo $final;


 ?>
