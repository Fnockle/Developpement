<?php
/* create an array containing the contact infos
 * focus on the structure of the array...
 */

 $contacts = [

   ['Nom' => 'Robert', 'Age' => 50, 'Numero' => '0648954857'],
   ['Nom' => 'Roger', 'Age' => 50, 'Numero' => '08447846557'],
   ['Nom' => 'Bertrand', 'Age' => 50, 'Numero' => '0148954857']

 ];

 echo json_encode($contacts);
