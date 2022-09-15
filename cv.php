<?php
$file = fopen('cv.csv', 'r');

// print_r($data);
$exp_array = [];

$edu_array = [];

$count = 0;
while ($data = fgetcsv($file)){
    // print_r($data);
    if ($data[0] == 'edu'){
        if (!array_key_exists('0', $edu_array)){
            if ($data[0] == 'edu'){
                $edu_array[$count]['title'] = $data[0];
                $edu_array[$count]['name'] = $data[1];
                $edu_array[$count]['place'] = $data[2];
                $edu_array[$count]['start'] = $data[3];
                $edu_array[$count]['end'] = $data[4];
            }
        } else {
            $pseudo_array = $edu_array;
            $max_error = count($data);
            $error = 0;
            for ($i = 0; $i < $max_error; $i++) {
                if (array_key_exists($i, $pseudo_array)){
                    if ($pseudo_array[$i]['start'] == $data[3]){
                        $error++;
                    }
                }
            }

            if ($error == 0){
                $edu_array[$count]['title'] = $data[0];
                $edu_array[$count]['name'] = $data[1];
                $edu_array[$count]['place'] = $data[2];
                $edu_array[$count]['start'] = $data[3];
                $edu_array[$count]['end'] = $data[4];
            }
        }
    }
    
    if ($data[0] == 'exp'){
        if (!array_key_exists('0', $exp_array)){
            if ($data[0] == 'exp'){
                $exp_array[$count]['title'] = $data[0];
                $exp_array[$count]['name'] = $data[1];
                $exp_array[$count]['place'] = $data[2];
                $exp_array[$count]['start'] = $data[3];
                $exp_array[$count]['end'] = $data[4];
            }
        } else {
            $pseudo_array = $exp_array;
            $max_error = count($data);
            $error = 0;
            for ($i = 0; $i < $max_error; $i++) {
                if (array_key_exists($i, $pseudo_array)){
                    if ($pseudo_array[$i]['start'] == $data[3]){
                        $error++;
                    }
                }
            }
            
            if ($error == 0){
                $exp_array[$count]['title'] = $data[0];
                $exp_array[$count]['name'] = $data[1];
                $exp_array[$count]['place'] = $data[2];
                $exp_array[$count]['start'] = $data[3];
                $exp_array[$count]['end'] = $data[4];
            }
        }
    }


    $count++;
    
}

if ($_GET == "edu_asc"){
    $edu_asc = $edu_array;
    usort($edu_asc, function ($item1, $item2) {
        return $item1['start'] <=> $item2['start'];
    });
}

if ($_GET == "edu_desc"){
    $edu_desc = $edu_array;
    usort($edu_desc, function ($item1, $item2) {
        return $item2['start'] <=> $item1['start'];
    });
}

if ($_GET == "exp_asc"){
    $exp_asc = $exp_array;
    usort($exp_asc, function ($item1, $item2) {
        return $item1['start'] <=> $item2['start'];
    });
}

if ($_GET == "exp_desc"){
    $exp_desc = $exp_array;
    usort($exp_desc, function ($item1, $item2) {
        return $item2['start'] <=> $item1['start'];
    });
}

fclose($file);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    print_r($edu_array);
    
    
    ?>
</body>
</html>