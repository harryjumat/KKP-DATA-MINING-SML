<?php
include('conn.php');
require 'vendor/spreadsheet/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);

    if ('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }

    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    //AGAR AUTO INCREMEN DARI 0 LAGI
    $result = $conn->query('ALTER TABLE calonkaryawan AUTO_INCREMENT=0');
    $result2 = $result->execute();
    //$berhasil = 0;
    for ($i = 1; $i < count($sheetData); $i++) {
        $nama = $sheetData[$i]['1'];
        $usia = $sheetData[$i]['2'];
        $posisi = $sheetData[$i]['3'];
        $pengalaman = $sheetData[$i]['4'];
        $lama = $sheetData[$i]['5'];
        $pendidikan = $sheetData[$i]['6'];
        $sertifikat = $sheetData[$i]['7'];
        $sql = "insert into calonkaryawan (Id,nama,usia,posisi,pengalaman,lama,pendidikan,sertifikat) values ('','$nama','$usia','$posisi','$pengalaman','$lama','$pendidikan','$sertifikat')";
        $conn->exec($sql);
        //$berhasil = 1;
    }
    //header("location:form_upload.php");
    header("location:form_upload.php");
    // if ($berhasil = 1) {
    //     header("location:form_upload.php"); //index.php hanya penamaan sample, kalau mau diganti dengan halaman return-nya.
    //     echo "berhasil";
    // } else {
    //     header("location:form_upload.php"); //index.php hanya penamaan sample, kalau mau diganti dengan halaman return-nya.
    //     echo "gagal";
    // }
}
