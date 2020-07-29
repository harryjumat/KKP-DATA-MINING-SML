<?php
include 'conn.php';

//Menghapus data calon karyawan
$result = $conn->query('DELETE FROM calonkaryawan');
$result2 = $result->execute();


header('Location: tabelcalonkaryawan.php');
