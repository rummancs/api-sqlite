<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>A glance of API </title>
    </head>
    <body>
<?php


// ------ onece db is required, I can use it for all purpose. Date - ___
require 'db.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);
$db = getDB();

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $db->prepare("SELECT * FROM visitors WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        } else {
            $stmt = $db->query("SELECT * FROM visitors");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        break;

    case 'POST':
        $stmt = $db->prepare("INSERT INTO visitors (name, email) VALUES (?, ?)");
        $stmt->execute([$input['name'], $input['email']]);
        echo json_encode(['id' => $db->lastInsertId()]);
        break;

    case 'PUT':
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (!isset($params['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        $stmt = $db->prepare("UPDATE visitors SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$input['name'], $input['email'], $params['id']]);
        echo json_encode(['message' => 'User updated']);
        break;

    case 'DELETE':
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (!isset($params['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        $stmt = $db->prepare("DELETE FROM visitors WHERE id = ?");
        $stmt->execute([$params['id']]);
        echo json_encode(['message' => 'User deleted']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}

?>
    </body>
</html>
