<?php var_dump($_POST);

if(isset($_POST['delete']) /*&& !isset($_POST['allDelete'])*/){

    $csv = file('../tasks.csv');
    $csvLinesToRewrite = '';
    foreach ($csv as $index => $csvLine){

        if (!in_array($index, $_POST['indexes'])) {
            $csvLinesToRewrite .= $csvLine;

        }

    }
//var_dump($csvLinesToRewrite);
    file_put_contents("../tasks.csv", $csvLinesToRewrite);

}else{

    file_put_contents('../tasks.csv', "");

}



header('Location: ../');