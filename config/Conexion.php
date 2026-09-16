<?php
// Define la clase Conexion que administrará el acceso a MySQL
class Conexion {
    
    // --- ENCAPSULAMIENTO Y ATRIBUTOS ESTÁTICOS ---
    // Variables privadas: Solo accesibles dentro de esta clase (protección de credenciales)
    // Variables estáticas: Conservan su valor en memoria sin importar cuántas veces se llame la clase
    private static $host = 'localhost';     // Servidor de la base de datos
    private static $db   = 'turismo_abra';  // Nombre de la base de datos MySQL
    private static $user = 'root';          // Usuario por defecto de MySQL/XAMPP
    private static $pass = '';              // Contraseña del usuario (vacía por defecto)
    private static $pdo  = null;            // Guardará la única instancia activa de PDO (Patrón Singleton)

    // --- MÉTODO PRINCIPAL DE CONEXIÓN (PATRÓN SINGLETON) ---
    // Se define como 'public static' para llamarlo directamente como Conexion::getConexion()
    public static function getConexion() {
        
        // EVALUACIÓN SINGLETON: Si $pdo es null, significa que aún no hay conexión abierta
        if (self::$pdo === null) {
            
            // INTENTO DE CONEXIÓN CON CONTROL DE ERRORES
            try {
                // Instancia el objeto PDO nativo de PHP para conectarse a MySQL
                self::$pdo = new PDO(
                    // Cadena DSN: Define el motor (mysql), host, nombre de BD y codificación de caracteres
                    "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=utf8mb4",
                    self::$user, // Pasa el usuario
                    self::$pass, // Pasa la contraseña
                    [
                        // CONFIGURACIONES GENERALES DE PDO:
                        // 1. Ante cualquier error de SQL, PDO lanzará una Excepción de forma obligatoria
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        
                        // 2. Define que las consultas SELECT devuelvan siempre arreglos asociativos (clave => valor)
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                // Si la conexión falla (servidor apagado, BD no existe), detiene el script y muestra el error
                die("Error de conexión: " . $e->getMessage());
            }
        }
        
        // Retorna la conexión existente o la recien creada
        return self::$pdo;
    }
}