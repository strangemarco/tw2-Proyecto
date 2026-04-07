<?php
// Script para insertar categorías de ejemplo
$host = 'localhost';
$user = 'root';
$password = '123456';
$database = 'app_ef';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $categorias = [
        ['Tecnología', 'Productos y servicios relacionados con tecnología'],
        ['Electrónicos', 'Dispositivos electrónicos y gadgets'],
        ['Ropa', 'Prendas de vestir y accesorios'],
        ['Hogar', 'Artículos para el hogar y decoración'],
        ['Deportes', 'Equipamiento y artículos deportivos'],
        ['Libros', 'Libros y material de lectura'],
        ['Juguetes', 'Juguetes y juegos para niños'],
        ['Comida', 'Alimentos y productos comestibles']
    ];
    
    $sql = "INSERT INTO categorias (nombre, descripcion, activo, created, modified) VALUES (?, ?, 1, NOW(), NOW())";
    $stmt = $pdo->prepare($sql);
    
    foreach ($categorias as $categoria) {
        $stmt->execute($categoria);
        echo "Categoría insertada: " . $categoria[0] . "\n";
    }
    
    echo "\n¡Categorías insertadas correctamente!\n";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
