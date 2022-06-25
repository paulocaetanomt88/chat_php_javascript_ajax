<?php
$conn = mysqli_connect("localhost", "root", "", "chatonline");

if (!$conn) {
    echo "erro ao conectar ao banco: " . mysqli_connect_error();
}
