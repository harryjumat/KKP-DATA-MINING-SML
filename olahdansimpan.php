<?php
include 'NaiveBayes.php';
include 'conn.php';

//Menghapus data prediksi sebelumnya
$result = $conn->query('DELETE FROM prediksi');
$result2 = $result->execute();


$sql = "SELECT * FROM calonkaryawan";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();

// $result = $conn->query("SELECT * FROM training");
// $tes = $result->fetchAll();
$i = 0;
foreach ($res as $k => $v) {
    $nb = new NaiveBayes();
    $hasil_prediksi = $nb->predict($v, $v['posisi']);
    if ($hasil_prediksi['prediksi'] == "YES") {
        // echo 'INSERT INTO prediksi (id,nama,usia,posisi,pengalaman,lama,pendidikan,sertifikat,prediksi) VALUES("'.$v['id'].'", "'.$v['nama'].'", "'.$v['usia'].'", "'.$v['posisi'].'", "'.$v['pengalaman'].'", "'.$v['lama'].'", "'.$v['pendidikan'].'", "'.$v['sertifikat'].'", "'.$hasil_prediksi['prediksi_yes'].'")'. '<br>';
        $sql = 'INSERT INTO prediksi (id,nama,usia,posisi,pengalaman,lama,pendidikan,sertifikat,prediksi) VALUES("'.$v['id'].'", "'.$v['nama'].'", "'.$v['usia'].'", "'.$v['posisi'].'", "'.$v['pengalaman'].'", "'.$v['lama'].'", "'.$v['pendidikan'].'", "'.$v['sertifikat'].'", "'.$hasil_prediksi['prediksi_yes'].'")';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $i++;
    }
}
header('Location: tabelprediksi.php?mess=Prediksi berhasil disimpan :)');
