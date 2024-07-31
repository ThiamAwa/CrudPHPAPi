<?php
header('Content-Type: application/json');
include("db.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = (int) $_POST['id'];
    
    try {
        $stmt = $db->prepare("SELECT nom, prenom, age FROM utilisateur WHERE ID = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur de requête : ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'ID manquant ou invalide.'
    ]);
}
?>
