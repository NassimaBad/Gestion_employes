<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Employés</title>
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
