<?php //var_dump($_POST);


  $csvLine = [$_POST['title'], preg_replace('#\s+#i', ' ', $_POST['description']), $_POST['date'], $_POST['priority']];
  //var_dump($csvLine);
  //file_put_contents('../tasks.csv', file_get_contents('../tasks.csv').$csvLine); ====> Plus besoin grâce à la suite

$file = fopen('../tasks.csv', 'a');
// Ecriture d'une ligne dans le fichier CSV, une ligne contenant une tâche.
fputcsv($file, $csvLine);
// Fermeture du fichier CSV des tâches.
fclose($file);


header('location: ../');
