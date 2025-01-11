<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer les données pour les graphiques
$stmt = $pdo->query('SELECT position, COUNT(*) as count FROM employees GROUP BY position');
$positions = $stmt->fetchAll();

$stmt = $pdo->query('SELECT contract_type, COUNT(*) as count FROM employees GROUP BY contract_type');
$contracts = $stmt->fetchAll();

$stmt = $pdo->query('SELECT salary FROM employees');
$salaries = $stmt->fetchAll();

include 'includes/header.php';
?>

<h1>Tableau de Bord</h1>
<div class="dashboard-buttons">
    <a href="add_employee.php" class="btn">Ajouter un Employé</a>
    <a href="list_employee.php" class="btn">Liste des Employés</a>
    <a href="index.php" class="btn">Accueil</a>
</div>
<div class="chart-container">
    <div class="chart-box">
        <h2>Nombre d'employés par position</h2>
        <canvas id="positionChart" width="300" height="200"></canvas>
    </div>
    <div class="chart-box">
        <h2>Nombre d'employés par type de contrat</h2>
        <canvas id="contractChart" width="300" height="200"></canvas>
    </div>
    <div class="chart-box">
        <h2>Salaires des employés</h2>
        <canvas id="salaryChart" width="300" height="200"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxPosition = document.getElementById('positionChart').getContext('2d');
    var positionChart = new Chart(ctxPosition, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($positions, 'position')); ?>,
            datasets: [{
                label: 'Nombre d\'employés par position',
                data: <?php echo json_encode(array_column($positions, 'count')); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctxContract = document.getElementById('contractChart').getContext('2d');
    var contractChart = new Chart(ctxContract, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_column($contracts, 'contract_type')); ?>,
            datasets: [{
                label: 'Nombre d\'employés par type de contrat',
                data: <?php echo json_encode(array_column($contracts, 'count')); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Répartition des types de contrat'
                }
            }
        },
    });

    var ctxSalary = document.getElementById('salaryChart').getContext('2d');
    var salaryChart = new Chart(ctxSalary, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_map(function($salary) { return $salary['salary']; }, $salaries)); ?>,
            datasets: [{
                label: 'Salaires des employés',
                data: <?php echo json_encode(array_map(function($salary) { return $salary['salary']; }, $salaries)); ?>,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php
include 'includes/footer.php';
?>
