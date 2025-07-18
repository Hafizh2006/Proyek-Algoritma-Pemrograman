<?php

function manual_strlen($kata){
    $count = 0;

    while (true){

        if (isset($kata[$count])){
            $count++;
        } else {
            break;
        }
    }

    return $count;
}

function manual_explode($pemisah, $kalimat){
    $hasil = [];
    $kata = "";
    $count = manual_strlen($kalimat);
    $indeks = 0;
    
    for ($i = 0; $i < $count; $i++){
        $char = $kalimat[$i]; 
        if ($char == $pemisah){
            $hasil[$indeks] = $kata;
            $kata = "";
            $indeks = $indeks + 1;
        } else {
            $kata = $kata . $char;
        }
    }
    $hasil[] = $kata;
    return $hasil;

}


function manual_array_values(array $inputArray): array {
    $newArray = [];
    $index = 0; 

    foreach ($inputArray as $value) {
        $newArray[$index] = $value; 
        $index++; 
    }

    return $newArray;
}

function tambahData($data){
    //var_dump($data); die;
    $file = "../Data/data.txt";

    if (!file_exists($file)){
        $myFile = fopen($file, 'w');
        fwrite($myFile, $data['nim'] . "," . $data['nama'] . "," . $data['jenis'] . "," . $data['tanggalLahir']  . "," .  $data['fakultas'] . "," .  $data['jurusan']);        
        fclose($myFile);
        return true; 
    } else {
        $dataMahasiswa = ambilData();
        $count = manual_strlen(ambilData());
        // var_dump($count); var_dump($dataMahasiswa[0]['nim']); die;
        for ($i = 0; $i < $count; $i++){
            if (intval($data['nim']) === intval($dataMahasiswa[$i]['nim'])){
                return false;
            }
        }
        $myFile = fopen($file, 'a');
        fwrite($myFile, "\n" . $data['nim'] . "," . $data['nama'] . "," . $data['jenis']  . "," . $data['tanggalLahir'] . ",".  $data['fakultas']. "," .  $data['jurusan']);
        fclose($myFile);
        return true;
    }
    
}





function ambilData(){
    $i = 0;
    $dataMahasiswa = array();
    $file = "../Data/data.txt";
    $myFile = fopen($file, 'r');
    while (!feof($myFile)){
        $data = fgets($myFile);
        $data = manual_explode(',', $data);
        $dataMahasiswa[$i] = array(
            'nim' => $data[0],
            'nama' => $data[1],
            'jenis' => $data[2],
            'tanggalLahir' => $data[3],
            'fakultas' => $data[4],
            'jurusan' => $data[5]
        );
        $i++;
    }
    fclose($myFile);
    return $dataMahasiswa;
}




function selectionsort_ascending($dataMahasiswa){
    $iteration = 0;
    foreach($dataMahasiswa as $data) {
        $iteration++;
    }

    for ($i = 0; $i < $iteration - 1; $i++){
        $min =  $i;
        for ($j = $i + 1; $j < $iteration; $j++){
            if (($dataMahasiswa[$j]['nim']) < ($dataMahasiswa[$min]['nim'])){
                $min = $j;
            }
        }
        if ($min != $i){
            $tampung = $dataMahasiswa[$i];
            $dataMahasiswa[$i] = $dataMahasiswa[$min];
            $dataMahasiswa[$min] = $tampung;
        }


    }
    return $dataMahasiswa;

}

function selectionsort_descending($dataMahasiswa = []){
    $iteration = 0;
    foreach($dataMahasiswa as $data) {
        $iteration++;
    }

    for ($i = 0; $i < $iteration - 1; $i++){
        $max_index =  $i;
        for ($j = $i + 1; $j < $iteration; $j++){
            if (($dataMahasiswa[$j]['nim']) > ($dataMahasiswa[$max_index]['nim'])){
                $max_index = $j;
            }
        }
        if ($max_index != $i){
                $tampung = $dataMahasiswa[$i];
                $dataMahasiswa[$i] = $dataMahasiswa[$max_index];
                $dataMahasiswa[$max_index] = $tampung;
        }

    }
    return $dataMahasiswa;

}

function cari($dataMahasiswa, string $nimCari){
    //var_dump($dataMahasiswa); die; 
    foreach ($dataMahasiswa as $data) {
        if (isset($data['nim']) && ($data['nim']) === ($nimCari)) {
            return $data;
        }
    }
    return null;
}



function ubah($dataForm){
    //var_dump($dataForm); die;
    $i = 0;
    $file = "../Data/data.txt";
    $dataMahasiswa = [];
    $check = false;

    // Update isi File
    $myFile = fopen($file, 'r');
    while (!feof($myFile)){
        $data = fgets($myFile);

        $data = manual_explode(',', $data);

        $dataMahasiswa[$i] = [
            'nim' => trim($data[0]),
            'nama' => trim($data[1]),
            'jenis' => trim($data[2]),
            'tanggalLahir' => trim($data[3]),
            'fakultas' => trim($data[4]),
            'jurusan' => trim($data[5])
        ];

        if ($dataForm['nim'] === $dataMahasiswa[$i]['nim']){
            $check = true;
        }

        if (isset($dataForm['nim'])) {
            if ($dataMahasiswa[$i]['nim'] === $dataForm['nim']) {
                //var_dump($dataMahasiswa[$i]); var_dump($dataForm); die;                
                if (!empty($dataForm['nim'])) {
                   $dataMahasiswa[$i]['nim'] = $dataForm['nim'];

                } 
                if  (!empty($dataForm['nama'])){
                   $dataMahasiswa[$i]['nama'] = $dataForm['nama'];
                    
                } 
                if (!empty($dataForm['jenis'])) {
                    $dataMahasiswa[$i]['jenis'] = $dataForm['jenis'];
                } 
                if (!empty($dataForm['tanggalLahir'])){
                    $dataMahasiswa[$i]['tanggalLahir'] = $dataForm['tanggalLahir'];

                } 

                if (!empty($dataForm['fakultas'])){
                    $dataMahasiswa[$i]['fakultas'] = $dataForm['fakultas'];

                }

                if (!empty($dataForm['jurusan'])) {
                    $dataMahasiswa[$i]['jurusan'] = $dataForm['jurusan'];

                }                
                    

                }
                        
        }

        $i =  $i + 1;
    }

    if ($check == false){
        return false;
    }

    fclose($myFile);
    $count = manual_strlen($dataMahasiswa);

    # Tulis/timpa semua di file tersebut dengan yang baru
    //var_dump($count); var_dump($dataMahasiswa); die;
    $tulis = fopen($file, 'w');
    for ($j = 0; $j < $count; $j++) { 
        $line = $dataMahasiswa[$j]['nim'] . "," . $dataMahasiswa[$j]['nama'] . ","  . $dataMahasiswa[$j]['jenis'] . "," . $dataMahasiswa[$j]['tanggalLahir']  . "," .  $dataMahasiswa[$j]['fakultas'] . "," .  $dataMahasiswa[$j]['jurusan'];
        
        if ($j < $count - 1){
            $line = $line . "\n";
        }

        fwrite($tulis, $line);
    }
    fclose($tulis);
    return true;
}


function hapus($dataForm){

    //var_dump($dataForm); die;
    $i = 0;
    $file = "../Data/data.txt";
    $dataMahasiswa = [];
    $check = false;

    // Update isi File
    $myFile = fopen($file, 'r');
    while (!feof($myFile)){
        $data = fgets($myFile);

        $data = manual_explode(',', $data);

        $dataMahasiswa[$i] = [
            'nim' => trim($data[0]),
            'nama' => trim($data[1]),
            'jenis' => trim($data[2]),
            'tanggalLahir' => trim($data[3]),
            'fakultas' => trim($data[4]),
            'jurusan' => trim($data[5])
        ];

        

        if (isset($dataForm['nim']) && ($dataForm['nim'] === $dataMahasiswa[$i]['nim'])) {
            $check = true;
            unset($dataMahasiswa[$i]);

        }

        $i =  $i + 1;
    
    }
    fclose($myFile);
    
    if ($check == false){
        return false;
    }
    
    // Pengurutan 
    $dataMahasiswa = manual_array_values($dataMahasiswa);

    $count = manual_strlen($dataMahasiswa);
    //var_dump($dataForm['nim']); var_dump($i); var_dump($count); var_dump($dataMahasiswa); die;
    $tulis = fopen($file, 'w');
    for ($i = 0;$i < $count; $i++) {

        $nim = $dataMahasiswa[$i]['nim'];
        $nama = $dataMahasiswa[$i]['nama'];
        $jenis = $dataMahasiswa[$i]['jenis'];
        $tanggalLahir = $dataMahasiswa[$i]['tanggalLahir'];
        $fakultas = $dataMahasiswa[$i]['fakultas'];
        $jurusan = $dataMahasiswa[$i]['jurusan'];

        $line = $nim . "," . $nama . "," . $jenis . "," . $tanggalLahir . "," . $fakultas . "," . $jurusan;
            
        if ($i < $count - 1){
                $line = $line . "\n";
        }

        fwrite($tulis, $line);
        
    }
    fclose($tulis);
    return true;

}




?>