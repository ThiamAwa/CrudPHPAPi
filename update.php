<?php
header('Content-Type: application/json');
include("db.php");


if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age'])) {
    $id = (int)$_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = (int)$_POST['age'];

    try {
        $stmt = $db->prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, age = :age WHERE id = :id");
        $result = $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age
        ]);

        echo json_encode([
            'success' => $result
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur : ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Données manquantes dans la requête.'
    ]);
}
?>
