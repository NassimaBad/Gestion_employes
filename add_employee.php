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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('INSERT INTO employees (first_name, last_name, birth_date, email, position, salary, contract_type) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], $_POST['email'], $_POST['position'], $_POST['salary'], $_POST['contract_type']]);
    header('Location: list_employees.php');
}

include 'includes/header.php';
?>

<h1>Ajouter un Employé</h1>
<form method="POST" action="add_employee.php">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="date" name="birth_date" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="position" placeholder="Position" required>
    <input type="number" step="0.01" name="salary" placeholder="Salary" required>
    <input type="text" name="contract_type" placeholder="Contract Type" required>
    <button type="submit">Ajouter</button>
</form>
<div class="dashboard-buttons">
    <a href="dashboard.php" class="btn">Tableau de Bord</a>
    <a href="list_employees.php" class="btn">Liste des Employés</a>
    <a href="index.php" class="btn">Accueil</a>
</div>

<?php
include 'includes/footer.php';
?>
