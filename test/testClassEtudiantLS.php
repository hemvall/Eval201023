<?php

require '../entityLS/Etudiant.php';

$louis = new Etudiant(1, 'Louis', 'Serrano');

echo $louis->getId(). '<br>';
echo $louis->getNom(). '<br>';
echo $louis->getPrenom(). '<br>';
?>