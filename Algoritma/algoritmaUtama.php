<?php 

function tambahData($data){
    //var_dump($data); die;
    $file = "../Data/data.txt";
    if (!file_exists($file)){
        $myFile = fopen($file, 'a');
        fwrite($myFile,  $data['nim'] . "," . $data['nama'] . "," . $data['jenis'] . "," . $data['tanggalLahir']  . "," .  $data['fakultas'] . "," .  $data['jurusan'] . "\n");        
        fclose($myFile); 
    } else {
        $myFile = fopen($file, 'a');
        fwrite($myFile, "\n" . $data['nim'] . "," . $data['nama'] . "," . $data['jenis']  . "," . $data['tanggalLahir'] . ",".  $data['fakultas']. "," .  $data['jurusan']);
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
    //var_dump($dataMahasiswa); die;
    $nimCari = (string)$nimCari; 
    
    foreach ($dataMahasiswa as $data) {
        if (isset($data['nim']) && intval($data['nim']) === intval($nimCari)) {
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

    // Update isi File
    $myFile = fopen($file, 'r');
    while (!feof($myFile)){
        $data = fgets($myFile);

        $data = explode(',', $data);

        $dataMahasiswa[$i] = [
            'nim' => trim($data[0]),
            'nama' => trim($data[1]),
            'jenis' => trim($data[2]),
            'tanggalLahir' => trim($data[3]),
            'fakultas' => trim($data[4]),
            'jurusan' => trim($data[5])
        ];

        if (isset($dataForm['nim'])) {
            if (intval($dataMahasiswa[$i]['nim']) === intval($dataForm['nim'] )) {
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
    fclose($myFile);
    $count = count($dataMahasiswa);

    # Tulis/timpa semua di file tersebut dengan yang baru
    //var_dump($count); var_dump($dataMahasiswa); die;
    $tulis = fopen($file, 'w');
    for ($j = 0; $j < $count; $j++) { 
        fwrite($tulis,  $dataMahasiswa[$j]['nim'] . "," . $dataMahasiswa[$j]['nama'] . ","  . $dataMahasiswa[$j]['jenis'] . "," . $dataMahasiswa[$j]['tanggalLahir']  . "," .  $dataMahasiswa[$j]['fakultas'] . "," .  $dataMahasiswa[$j]['jurusan'] . "\n");
    }
    fclose($tulis);
}




?>