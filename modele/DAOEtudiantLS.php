<?php
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

$testUpdateEtudiantLS = updateUnEtudiant($conn, 1, 'Lwouis', 'srano');

function getLesEtudiants($connection) {
    $query = $connection->prepare("SELECT id, nom, prenom FROM Etudiant");
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_assoc()) {
        echo 'Étudiant ID: ', $row['id'], ', Nom: ', $row['nom'], ', Prénom: ', $row['prenom'], '<br>';
    }
}

function getUnEtudiant($connection, $id) {
    $query = $connection->prepare("SELECT id, nom, prenom FROM Etudiant WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    echo 'ID: ', $row['id'], ', Nom: ', $row['nom'], ', Prénom: ', $row['prenom'];
}

function addUnEtudiant($connection, $n, $p) {
    $query = $connection->prepare("INSERT INTO Etudiant (Nom, Prenom) VALUES (?, ?)");
    $query->bind_param('ss', $n, $p);
    $query->execute();
    echo 'L\'étudiant a bien été ajouté !';
}

function updateUnEtudiant($connection, $id, $n, $p) {
    $query = $connection->prepare("UPDATE Etudiant SET Nom = ?, Prenom = ? WHERE id = ?");
    $query->bind_param('ssi', $n, $p, $id);
    $query->execute();
    echo 'L\'étudiant a bien été modifié !';
}

function deleteUnEtudiant($connection, $id) {
    $query = $connection->prepare("DELETE FROM Etudiant WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
    echo 'Étudiant ', $id, ' supprimé.';
}

?>

?>
