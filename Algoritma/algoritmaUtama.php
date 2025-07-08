<?php 

function tambahData($data){
    //var_dump($data); die;
    $file = "../Data/data.txt";
    if (!file_exists($file)){
        $myFile = fopen($file, 'a');
        fwrite($myFile, $data['nim'] . "," . $data['nama'] . "," . $data['jenis'] . "," . $data['tanggalLahir']  . "," .  $data['fakultas'] . "," .  $data['jurusan'] . "\n");        
        fclose($myFile); 
    } else {
        $myFile = fopen($file, 'a');
        fwrite($myFile, $data['nim'] . "," . $data['nama'] . "," . $data['jenis']  . "," . $data['tanggalLahir'] . ",".  $data['fakultas']. "," .  $data['jurusan'].  "\n");
        fclose($myFile);
    }
}


function ambilData(){
    $i = 0;
    $dataMahasiswa = array();
    $file = "../Data/data.txt";
    $myFile = fopen($file, 'r');
    while (!feof($myFile)){
        $data = fgets($myFile);
        $data = explode(',', $data);
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
    $iteration = count($dataMahasiswa);
    for ($i = 0; $i < $iteration - 2; $i++){
        $min =  $i;
        for ($j = $i + 1; $j < $iteration - 1; $j++){
            if (intval($dataMahasiswa[$j]['nim']) < intval($dataMahasiswa[$min]['nim'])){
                $tampung = $dataMahasiswa[$j];
                $dataMahasiswa[$j] = $dataMahasiswa[$min];
                $dataMahasiswa[$min] = $tampung;
            }
        }

    }
    return $dataMahasiswa;

}

function selectionsort_descending($dataMahasiswa = []){
    $iteration = count($dataMahasiswa);
    for ($i = 0; $i < $iteration - 2; $i++){
        $min =  $i;
        for ($j = $i + 1; $j < $iteration - 1; $j++){
            if (intval($dataMahasiswa[$j]['nim']) > intval($dataMahasiswa[$min]['nim'])){
                $tampung = $dataMahasiswa[$j];
                $dataMahasiswa[$j] = $dataMahasiswa[$min];
                $dataMahasiswa[$min] = $tampung;
            }
        }

    }
    return $dataMahasiswa;

}

function cari($dataMahasiswa, $nimCari){
    $nimCari = (string)$nimCari; 
    
    foreach ($dataMahasiswa as $data) {
        if (isset($data['nim']) && trim($data['nim']) === $nimCari) {
            return $data;
        }
    }
    return null;
}

?>