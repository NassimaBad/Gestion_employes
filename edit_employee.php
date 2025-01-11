<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['user_role'] !== 'admin') {
    header('Location: dashboard.php');
    exit;
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM employees WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $employee = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE employees SET first_name = ?, last_name = ?, birth_date = ?, email = ?, position = ?, salary = ?, contract_type = ? WHERE id = ?');
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], $_POST['email'], $_POST['position'], $_POST['salary'], $_POST['contract_type'], $_POST['id']]);
    header('Location: list_employees.php');
}

include 'includes/header.php';
?>

<h1>Modifier un Employé</h1>
<form method="POST" action="edit_employee.php">
    <input type="hidden" name="id" value="<?= $employee['id'] ?>">
    <input type="text" name="first_name" value="<?= htmlspecialchars($employee['first_name']) ?>" required>
    <input type="text" name="last_name" value="<?= htmlspecialchars($employee['last_name']) ?>" required>
    <input type="date" name="birth_date" value="<?= htmlspecialchars($employee['birth_date']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($employee['email']) ?>" required>
    <input type="text" name="position" value="<?= htmlspecialchars($employee['position']) ?>" required>
    <input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($employee['salary']) ?>" required>
    <input type="text" name="contract_type" value="<?= htmlspecialchars($employee['contract_type']) ?>" required>
    <button type="submit">Modifier</button>
</form>
<div class="dashboard-buttons">
    <a href="dashboard.php" class="btn">Tableau de Bord</a>
    <a href="list_employees.php" class="btn">Liste des Employés</a>
    <a href="index.php" class="btn">Accueil</a>
</div>

<?php
include 'includes/footer.php';
?>
