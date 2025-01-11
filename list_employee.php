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

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare('DELETE FROM employees WHERE id = ?');
    $stmt->execute([$_GET['delete']]);
    header('Location: list_employee.php');
}

$stmt = $pdo->query('SELECT * FROM employees');
$employees = $stmt->fetchAll();

include 'includes/header.php';
?>

<h1>Liste des Employés</h1>
<table border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birth Date</th>
        <th>Email</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Contract Type</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= htmlspecialchars($employee['first_name']) ?></td>
            <td><?= htmlspecialchars($employee['last_name']) ?></td>
            <td><?= htmlspecialchars($employee['birth_date']) ?></td>
            <td><?= htmlspecialchars($employee['email']) ?></td>
            <td><?= htmlspecialchars($employee['position']) ?></td>
            <td><?= htmlspecialchars($employee['salary']) ?></td>
            <td><?= htmlspecialchars($employee['contract_type']) ?></td>
            <td><a href="edit_employee.php?id=<?= $employee['id'] ?>">Modifier</a> | <a href="list_employee.php?delete=<?= $employee['id'] ?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="dashboard-buttons">
    <a href="add_employee.php" class="btn">Ajouter un Employé</a>
    <a href="dashboard.php" class="btn">Tableau de Bord</a>
    <a href="index.php" class="btn">Accueil</a>
</div>

<?php
include 'includes/footer.php';
?>
