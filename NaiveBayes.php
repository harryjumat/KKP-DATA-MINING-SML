<?php
class NaiveBayes {
	public function predict(array $data, $posisi){
		include "conn.php";
		$sql = "SELECT id, posisi, pengalaman, sertifikat, usia, pendidikan, wawancara FROM screening ORDER BY id ASC";
		$stmt = $conn -> prepare($sql);
		$stmt-> execute();
		// var_dump($stmt1);
		$result = $stmt -> fetchAll();
		// var_dump($result);
		if(!empty($result)){
			for($i=0;$i<count($result);$i++){
				unset($result[$i][0]);
				unset($result[$i][1]);
				unset($result[$i][2]);
				unset($result[$i][3]);
				unset($result[$i][4]);
				unset($result[$i][5]);
				unset($result[$i][6]);
				//$result[$i] = array_values($result[$i]); //hilangkan komen diawal untuk mengubah array menjadi [0] [1] [2]
				// print_r($result[$i]);
				// echo "</br></br>";
			}
		}
		// print_r($data);
		
		$WawancaraYes = 0;
		$WawancaraNo = 0;
		$Posisi_WawancaraYes = 0;
		$Posisi_WawancaraNo = 0;
		$Pengalaman_WawancaraYes = 0;
		$Pengalaman_WawancaraNo = 0;
		$Sertifikat_WawancaraYes = 0;
		$Sertifikat_WawancaraNo = 0;
		$Usia_WawancaraYes = 0;
		$Usia_WawancaraNo = 0;
		$Pendidikan_WawancaraYes = 0;
		$Pendidikan_WawancaraNo = 0;
		//$UsiaTemp = 0;
		
		if((int)$data['usia'] > 20 && (int)$data['usia']  <= 25){
			$UsiaTemp = "<=25";
		}else if((int)$data['usia'] > 25 && (int)$data['usia']  <= 30){
			$UsiaTemp = "<=30";
		}else if((int)$data['usia'] > 30 && (int)$data['usia']  <= 35){
			$UsiaTemp = "<=35";
		}else if((int)$data['usia'] > 35 && (int)$data['usia']  <= 40){
			$UsiaTemp = "<=40";
		}else if((int)$data['usia'] > 40 && (int)$data['usia']  <= 45){
			$UsiaTemp = "<=45";
		}
		
		foreach($result as $k => $v){
			if($v['wawancara'] == "YES"){
				$WawancaraYes++;
			}else if($v['wawancara'] == "NO"){
				$WawancaraNo++;
			}
			if($data['posisi'] == $v['posisi'] && $v['wawancara'] == "YES"){
				$Posisi_WawancaraYes++;
			}else if($data['posisi'] == $v['posisi'] && $v['wawancara'] == "NO"){
				$Posisi_WawancaraNo++;
			}
			if($data['pengalaman'] == $v['pengalaman'] && $v['wawancara'] == "YES"){
				$Pengalaman_WawancaraYes++;
			}else if($data['pengalaman'] == $v['pengalaman'] && $v['wawancara'] == "NO"){
				$Pengalaman_WawancaraNo++;
			}
			if($data['sertifikat'] == $v['sertifikat'] && $v['wawancara'] == "YES"){
				$Sertifikat_WawancaraYes++;
			}else if($data['sertifikat'] == $v['sertifikat'] && $v['wawancara'] == "NO"){
				$Sertifikat_WawancaraNo++;
			}
			if($UsiaTemp == "<=25" && (int)$v['usia'] > 20 && (int)$v['usia'] <= 25 && $v['wawancara'] == "YES"){
				$Usia_WawancaraYes++;
			}else if($UsiaTemp == "<=25" && (int)$v['usia'] > 20 && (int)$v['usia'] <= 25 && $v['wawancara'] == "NO"){
				$Usia_WawancaraNo++;
			}
			if($UsiaTemp == "<=30" && (int)$v['usia'] > 25 && (int)$v['usia'] <= 30 && $v['wawancara'] == "YES"){
				$Usia_WawancaraYes++;
			}else if($UsiaTemp == "<=30" && (int)$v['usia'] > 25 && (int)$v['usia'] <= 30 && $v['wawancara'] == "NO"){
				$Usia_WawancaraNo++;
			}
			if($UsiaTemp == "<=35" && (int)$v['usia'] > 30 && (int)$v['usia'] <= 35 && $v['wawancara'] == "YES"){
				$Usia_WawancaraYes++;
			}else if($UsiaTemp == "<=35" && (int)$v['usia'] > 30 && (int)$v['usia'] <= 35 && $v['wawancara'] == "NO"){
				$Usia_WawancaraNo++;
			}
			if($UsiaTemp == "<=40" && (int)$v['usia'] > 35 && (int)$v['usia'] <= 40 && $v['wawancara'] == "YES"){
				$Usia_WawancaraYes++;
			}else if($UsiaTemp == "<=40" && (int)$v['usia'] > 35 && (int)$v['usia'] <= 40 && $v['wawancara'] == "NO"){
				$Usia_WawancaraNo++;
			}
			if($UsiaTemp == "<=45" && (int)$v['usia'] > 40 && (int)$v['usia'] <= 45 && $v['wawancara'] == "YES"){
				$Usia_WawancaraYes++;
			}else if($UsiaTemp == "<=45" && (int)$v['usia'] > 40 && (int)$v['usia'] <= 45 && $v['wawancara'] == "NO"){
				$Usia_WawancaraNo++;
			}
			if($data['pendidikan'] == $v['pendidikan'] && $v['wawancara'] == "YES"){
				$Pendidikan_WawancaraYes++;
			}else if($data['pendidikan'] == $v['pendidikan'] && $v['wawancara'] == "NO"){
				$Pendidikan_WawancaraNo++;
			}
		}
		// echo "ID = ".$data['id'];
		// echo "</br>";
		// echo $data['usia'];
		
		//menghitung P(Ci)
		$P_WawancaraYes = $WawancaraYes/count($result);
		$P_WawancaraNo = $WawancaraNo/count($result);
		// echo "P(Ci)</br>";
		// echo "P(Wawancara = YES) = ".$P_WawancaraYes."</br>";
		// echo "P(Wawancara = NO) = ".$P_WawancaraNo."</br></br>";
		
		//menghitung P(X|Ci) yaitu menghitung P(Posisi|Wawancara), P(Pengalaman|Wawancara), P(Sertifikat|Wawancara), P(Usia|Wawancara) dan P(Pendidikan|Wawancara)
		$P_Posisi_WawancaraYes = $Posisi_WawancaraYes/$WawancaraYes;
		$P_Posisi_WawancaraNo = $Posisi_WawancaraNo/$WawancaraNo;
		// echo "P(X|Ci)</br>";
		// echo "P(Posisi = ".$data['posisi']."|Wawancara = YES) = ".$P_Posisi_WawancaraYes."</br>";
		// echo "P(Posisi = ".$data['posisi']."|Wawancara = NO) = ".$P_Posisi_WawancaraNo."</br>";
		
		$P_Pengalaman_WawancaraYes = $Pengalaman_WawancaraYes/$WawancaraYes;
		$P_Pengalaman_WawancaraNo = $Pengalaman_WawancaraNo/$WawancaraNo;
		// echo "P(Pengalaman = ".$data['pengalaman']."|Wawancara = YES) = ".$P_Pengalaman_WawancaraYes."</br>";
		// echo "P(Pengalaman = ".$data['pengalaman']."|Wawancara = NO) = ".$P_Pengalaman_WawancaraNo."</br>";
		
		$P_Sertifikat_WawancaraYes = $Sertifikat_WawancaraYes/$WawancaraYes;
		$P_Sertifikat_WawancaraNo = $Sertifikat_WawancaraNo/$WawancaraNo;
		// echo "P(Sertifikat = ".$data['sertifikat']."|Wawancara = YES) = ".$P_Sertifikat_WawancaraYes."</br>";
		// echo "P(Sertifikat = ".$data['sertifikat']."|Wawancara = NO) = ".$P_Sertifikat_WawancaraNo."</br>";
		
		$P_Usia_WawancaraYes = $Usia_WawancaraYes/$WawancaraYes;
		$P_Usia_WawancaraNo = $Usia_WawancaraNo/$WawancaraNo;
		// echo "P(Usia = ".$UsiaTemp."|Wawancara = YES) = ".$P_Usia_WawancaraYes."</br>";
		// echo "P(Usia = ".$UsiaTemp."|Wawancara = NO) = ".$P_Usia_WawancaraNo."</br>";
		
		$P_Pendidikan_WawancaraYes = $Pendidikan_WawancaraYes/$WawancaraYes;
		$P_Pendidikan_WawancaraNo = $Pendidikan_WawancaraNo/$WawancaraNo;
		// echo "P(Usia = ".$data['pendidikan']."|Wawancara = YES) = ".$P_Pendidikan_WawancaraYes."</br>";
		// echo "P(Usia = ".$data['pendidikan']."|Wawancara = NO) = ".$P_Pendidikan_WawancaraNo."</br></br>";
		
		$P_X_WawancaraYes = $P_Posisi_WawancaraYes * $P_Pengalaman_WawancaraYes * $P_Sertifikat_WawancaraYes * $P_Usia_WawancaraYes * $P_Pendidikan_WawancaraYes;
		$P_X_WawancaraNo = $P_Posisi_WawancaraNo * $P_Pengalaman_WawancaraNo * $P_Sertifikat_WawancaraNo * $P_Usia_WawancaraNo * $P_Pendidikan_WawancaraNo;
		// echo "P(X|Wawancara = YES) = ".$P_X_WawancaraYes."</br>";
		// echo "P(X|Wawancara = NO) = ".$P_X_WawancaraNo."</br></br>";
		
		//menghitung P(X|Ci)*P(Ci)
		$P_X_WawancaraYes_P_WawancaraYes = $P_X_WawancaraYes * $P_WawancaraYes;
		$P_X_WawancaraNo_P_WawancaraNo= $P_X_WawancaraNo * $P_WawancaraNo;
		// echo "P(X|Ci)*P(Ci)</br>";
		// echo "P(X|Wawancara = YES) * P(Wawancara = YES) = ".$P_X_WawancaraYes_P_WawancaraYes."</br>";
		// echo "P(X|Wawancara = NO) * P(Wawancara = NO) = ".$P_X_WawancaraNo_P_WawancaraNo;
		
		// echo "<hr>";
		
		
		if($P_X_WawancaraYes_P_WawancaraYes > $P_X_WawancaraNo_P_WawancaraNo){
			//---------------------------------------------------------- PREDKSI NILAI YES -----------------------------------------------------------
			$hasil_prediksi = "YES";
		}else {
			//---------------------------------------------------------- PREDKSI NILAI NO -----------------------------------------------------------
			$hasil_prediksi = "NO";
		}
		
		$hasil = ["id" => $data['id'], "prediksi_yes" => $P_X_WawancaraYes_P_WawancaraYes, "prediksi_no" => $P_X_WawancaraNo_P_WawancaraNo, "prediksi" => $hasil_prediksi];
		return $hasil; 
	}
}
