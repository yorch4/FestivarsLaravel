<?php
require_once 'Alquiler.php';
require_once 'Cliente.php';

session_start();

$cod_juego = $_POST['codigo'];
$dni = $_SESSION['usuario']->dni;
Alquiler::alquilar($cod_juego, $dni);
header("Location: misJuegos.php");

