 <?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigoDigitado = trim($_POST['code']);

    if (!preg_match('/^[0-9]{6}$/', $codigoDigitado)) {
        echo "<h2>⚠️ O código precisa ter exatamente 6 números!</h2>";
        echo '<a href="2fa.html">Voltar</a>';
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE codigo_2fa = :codigo");
    $stmt->execute(['codigo' => $codigoDigitado]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION['admin_logado'] = $admin['usuario'];
        header("Location: painel_admin.php");
        exit;
    } else {
        echo "<h2>❌ Código incorreto!</h2>";
        echo '<a href="2fa.html">Voltar</a>';
    }
} else {
    header("Location: 2fa.html");
    exit;
}
?>
