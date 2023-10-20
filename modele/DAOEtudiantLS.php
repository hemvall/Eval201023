<?php
echo "<h2>Evaluation PHP</h2>";

try {
    $servername = 'localhost';
    $dbname = 'dblogin4419'; 
    $username = 'login4419';
    $password = 'CdtXHdfcstRoEEC';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die('Erreur : ' . $conn->connect_error);
    } else {
        echo 'Connexion réussie<br/>';
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

echo 'Les étudiants : <br>';
$testGetLesEtudiantsLS = getLesEtudiants($conn); 

echo '<br>Détail étudiant 1 : <br>';
$testGetUnEtudiantLS = getUnEtudiant($conn, 1);

$testAddEtudiantLS = addUnEtudiant($conn, 'xavier', 'x'); 

$testUpdateEtudiantLS = updateUnEtudiant($conn, 1, 'Lwouis','srano');

function getLesEtudiants($connection) {
    $query = mysqli_query($connection, "select id, nom, prenom from Etudiant");
    while ($row = mysqli_fetch_assoc($query)) {
        echo 'Étudiant ID: ', $row['id'], ', Nom: ', $row['nom'], ', Prénom: ', $row['prenom'], '<br>';
    }
}

function getUnEtudiant($connection, $id) {
    $query = mysqli_query($connection, "select id, nom, prenom from Etudiant where id='$id'");
    $row = mysqli_fetch_assoc($query);
    echo 'ID: ', $row['id'], ', Nom: ', $row['nom'], ', Prénom: ', $row['prenom'];
}

function addUnEtudiant($connection, $n, $p) {
    $connection->query("INSERT INTO Etudiant (Nom, Prenom) VALUES ('$n', '$p')");
    echo 'L\'étudiant a bien été ajouté !';
}

function updateUnEtudiant($connection, $id, $n, $p) {
    $connection->query("UPDATE Etudiant SET Nom='$n', Prenom='$p' WHERE id='$id'");
    echo 'L\'étudiant a bien été modifié !';
}

function deleteUnEtudiant($connection, $id) {
    $query = mysqli_query($connection, "delete from Etudiant where id='$id'");
    echo 'Étudiant ', $id, ' supprimé.';
}
?>
