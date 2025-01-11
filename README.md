# Gestion des Employés

## Description

Ce projet est un projet de classe, une application web de gestion des employés. Il permet aux utilisateurs de gérer les employés de leur entreprise, y compris l'ajout, la modification, la suppression et la visualisation des employés.

## Fonctionnalités

- **Connexion et Inscription** : Les utilisateurs peuvent se connecter et s'inscrire à l'application.
- **Tableau de Bord** : Affiche des graphiques et des statistiques sur les employés.
- **Ajouter un Employé** : Permet aux administrateurs d'ajouter de nouveaux employés.
- **Modifier un Employé** : Permet aux administrateurs de modifier les informations des employés existants.
- **Lister les Employés** : Affiche une liste de tous les employés avec des options pour les modifier ou les supprimer.

## Installation

1. **Télécharger XAMPP** :
   - Rendez-vous sur le site officiel de XAMPP : [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)
   - Téléchargez la version appropriée pour votre système d'exploitation (Windows, macOS, Linux).

2. **Installer XAMPP** :
   - Exécutez le fichier d'installation téléchargé.
   - Suivez les instructions à l'écran pour installer XAMPP.
   - Lors de l'installation, assurez-vous de cocher les options pour installer Apache et MySQL.

3. **Démarrer Apache et MySQL** :
   - Ouvrez le panneau de contrôle XAMPP.
   - Cliquez sur les boutons "Start" à côté de "Apache" et "MySQL" pour démarrer les services.

4. **Accéder à phpMyAdmin** :
   - Ouvrez votre navigateur web.
   - Accédez à l'URL suivante : [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)
   - Vous devriez voir l'interface de phpMyAdmin.

5. **Créer la Base de Données** :
   - Dans phpMyAdmin, cliquez sur l'onglet "Databases" (Bases de données).
   - Dans le champ "Database name" (Nom de la base de données), entrez `gestion_employes`.
   - Cliquez sur le bouton "Create" (Créer).

6. **Créer les Tables** :
   - Cliquez sur l'onglet "SQL" pour exécuter une requête SQL.
   - Collez le code SQL suivant et cliquez sur "Go" :

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    contract_type VARCHAR(50) NOT NULL
);
```

7. **Ajouter des Utilisateurs d'Exemple** :
    Cliquez à nouveau sur l'onglet "SQL" pour exécuter une nouvelle requête SQL.
    Collez le code SQL suivant et cliquez sur "Go" ou "Executer" :

```sql
INSERT INTO users (username, password, role) VALUES
('admin', '\$2y\$10\$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', 'admin'),
('user1', '\$2y\$10\$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', 'user'),
('user2', '\$2y\$10\$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36WQoeG6Lruj3vjPGga31lW', 'user');
```

8. **Ajouter des Employés d'Exemple** :
    Cliquez à nouveau sur l'onglet "SQL" pour exécuter une nouvelle requête SQL.
    Collez le code SQL suivant et cliquez sur "Go" ou "Executer" :

```sql
INSERT INTO employees (first_name, last_name, birth_date, email, position, salary, contract_type) VALUES
('Zouhair', 'Jakani', '1977-01-12', 'zouhair.jakani@example.com', 'Développeur', 80000, 'Temps partiel'),
('Saadia', 'Er Raoui', '1978-05-10', 'saadia.erraoui.elamrani@example.com', 'Développeur Junior', 30000, 'Stage'),
('Mohamed', 'El Amrani', '1980-01-01', 'mohamed.elamrani@example.com', 'Développeur', 50000, 'Temps plein'),
('Sanaa', 'Brahimi', '1985-05-15', 'sanaa.brahimi@example.com', 'Designer', 45000, 'Temps partiel'),
('Youssef', 'Bennani', '1990-08-20', 'youssef.bennani@example.com', 'Responsable', 60000, 'Temps plein'),
('Meryem', 'El Khoury', '1992-12-30', 'meryem.elkhoury@example.com', 'Analyste', 55000, 'Contrat'),
('Rachid', 'Fassi', '1988-03-10', 'rachid.fassi@example.com', 'Testeur', 48000, 'Temps plein'),
('Khadija', 'Benali', '1991-07-25', 'khadija.benali@example.com', 'Ressources humaines', 52000, 'Temps plein'),
('Abdelkader', 'Zeroual', '1987-04-12', 'abdelkader.zeroual@example.com', 'Marketing', 53000, 'Temps partiel'),
('Karim', 'Jabbari', '1993-09-18', 'karim.jabbari@example.com', 'Ventes', 51000, 'Contrat'),
('Omar', 'El Bouhali', '1989-11-05', 'omar.elbouhali@example.com', 'Support', 49000, 'Temps plein'),
('Laila', 'Zerhouni', '1994-02-22', 'laila.zerhouni@example.com', 'Informatique', 54000, 'Temps plein'),
('Amine', 'Chafik', '1986-06-30', 'amine.chafik@example.com', 'Finance', 56000, 'Temps partiel'),
('Zineb', 'Ait Ali', '1995-10-08', 'zineb.aitali@example.com', 'Opérations', 57000, 'Contrat');
```

## Utilisation

1. **Accéder à l'Application** :

    Ouvrez votre navigateur web et accédez à l'URL suivante : http://localhost/gestion_employes/
    Connectez-vous avec l'utilisateur admin (nom d'utilisateur : admin, mot de passe : password).

2. **Vérifier le Tableau de Bord** :

    Vous devriez voir les graphiques et les statistiques affichant les données des employés que vous avez ajoutés.


## Contribuer

Si vous souhaitez contribuer au projet ou signaler des problèmes, n'hésitez pas à ouvrir une issue ou à soumettre une pull request.

## Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.

## Contact

Pour toute question ou suggestion, veuillez contacter nassimabadraoui29@gmail.com.
