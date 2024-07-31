<?php
global $db;
header('Content-Type: application/json');
include "../projet_php/db.php";

// if (isset($_POST['id'])) {
    $id = (int) $_GET['id'];

    
    $stmt = $db->prepare("DELETE FROM utilisateur WHERE id = ?");
    $result = $stmt->execute([$id]);

    echo json_encode([
        'success' => $result,
        'message' => $result ? 'Enregistrement supprimé avec succès.' : 'Échec de la suppression de l\'enregistrement.'
    ]);
// } else {
    
//     echo json_encode([
//         'success' => false,
//         'message' => 'ID non fourni.'
//     ]);
// }
?>
