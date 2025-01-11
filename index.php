<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header style="background-image: url('images/background.jpg'); background-size: cover;">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <h1>Gestion des Employés</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="dashboard.php">Tableau de Bord</a></li>
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <li><a href="list_employee.php">Liste des Employés</a></li>
                        <li><a href="add_employee.php">Ajouter un Employé</a></li>
                    <?php endif; ?>
                    <li><a href="login.php?logout=true">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="register.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <img src="images/hero.jpg" alt="Hero Image" class="hero-image">
            <div class="hero-content">
                <h2>Bienvenue sur la page d'accueil</h2>
                <p>Cette application vous permet de gérer les employés de votre entreprise.</p>
                <a href="login.php" class="btn">Connexion</a>
                <a href="register.php" class="btn">Inscription</a>
            </div>
        </section>
        <section class="features">
            <h2>Fonctionnalités</h2>
            <div class="feature-box">
                <img src="images/add_employee.png" alt="Add Employee" class="feature-image">
                <h3>Ajouter un Employé</h3>
                <p>Ajoutez facilement de nouveaux employés à votre base de données.</p>
            </div>
            <div class="feature-box">
                <img src="images/edit_employee.png" alt="Edit Employee" class="feature-image">
                <h3>Modifier un Employé</h3>
                <p>Modifiez les informations des employés existants en quelques clics.</p>
            </div>
            <div class="feature-box">
                <img src="images/list_employees.png" alt="List Employees" class="feature-image">
                <h3>Lister les Employés</h3>
                <p>Consultez la liste complète de vos employés avec toutes leurs informations.</p>
            </div>
        </section>
    </main>
    <?php
    include 'includes/footer.php';
    ?>
</body>
</html>
