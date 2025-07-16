<?php 

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
        $count = count(ambilData());
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
    for ($i = 0; $i < $iteration - 1; $i++){
        $min =  $i;
        
        for ($j = $i + 1; $j < $iteration; $j++){
            if (intval($dataMahasiswa[$j]['nim']) < intval($dataMahasiswa[$min]['nim'])){
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
    $iteration = count($dataMahasiswa);
    for ($i = 0; $i < $iteration - 1; $i++){
        $max_index =  $i;


        for ($j = $i + 1; $j < $iteration; $j++){
            
            if (intval($dataMahasiswa[$j]['nim']) > intval($dataMahasiswa[$max_index]['nim'])){
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
    $check = false;

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

        if (intval($dataForm['nim']) === intval($dataMahasiswa[$i]['nim'])){
            $check = true;
        }

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

    if ($check == false){
        return false;
    }

    fclose($myFile);
    $count = count($dataMahasiswa);

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

        $data = explode(',', $data);

        $dataMahasiswa[$i] = [
            'nim' => trim($data[0]),
            'nama' => trim($data[1]),
            'jenis' => trim($data[2]),
            'tanggalLahir' => trim($data[3]),
            'fakultas' => trim($data[4]),
            'jurusan' => trim($data[5])
        ];

        if (intval($dataForm['nim']) === intval($dataMahasiswa[$i]['nim'])){
            $check = true;
        }

        if (isset($dataForm['nim']) && 
            intval($dataForm['nim']) === intval($dataMahasiswa[$i]['nim'])) {
            unset($dataMahasiswa[$i]);

        }

        $i =  $i + 1;
    
    }
    if ($check == false){
        return false;
    }

    fclose($myFile);
    
    

    $count = count($dataMahasiswa);
    //var_dump($dataForm['nim']); var_dump($i); var_dump($count); var_dump($dataMahasiswa); die;
    $tulis = fopen($file, 'w');
    for ($i = 0;$i < $count; $i++) {

        $nim = $dataMahasiswa[$i]['nim'];
        $nama = $dataMahasiswa[$i]['nama'];
        $jenis = $dataMahasiswa[$i]['jenis'];
        $tanggalLahir = $dataMahasiswa[$i]['tanggalLahir'];
        $fakultas = $dataMahasiswa[$i]['fakultas'];
        $jurusan = $dataMahasiswa[$i]['jurusan'];

        if (isset($nim) && isset($nama) && isset($jenis) && isset($tanggalLahir) && isset($fakultas) && isset($jurusan)){
            $line = $nim . "," . $nama . "," . $jenis . "," . $tanggalLahir . "," . $fakultas . "," . $jurusan;
            
            if ($i < $count - 1){
                $line = $line . "\n";
            }
            fwrite($tulis, $line);

        }
        
    }
    fclose($tulis);
    return true;

}




?>