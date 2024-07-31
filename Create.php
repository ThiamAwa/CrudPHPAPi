<?php
global $db;
header('Content-Type: application/json');
include "../projet_php/db.php";


print_r($_POST);


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = (int) $_POST['age'];
    $stmt = $db->prepare("INSERT INTO utilisateur (nom, prenom, age) VALUES (?, ?, ?)");
        $result = $stmt->execute([
            $nom,
            $prenom,
            $age
        ]);

        echo json_encode([
            'success' => $result,
            'message' => $result ? 'Utilisateur ajouté avec succès.' : 'Échec de l\'ajout de l\'utilisateur.'
        ]);
   


?>
