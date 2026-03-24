# Gestion de Projet

Application web de gestion de projets et de tâches développée en PHP avec MySQL.

---

## Fonctionnalités

- Authentification (inscription, connexion, déconnexion, réinitialisation de mot de passe)
- Gestion des projets (créer, modifier, supprimer, consulter)
- Gestion des tâches (créer, modifier, supprimer, changer le statut)
- Gestion des membres par projet (ajouter/retirer des utilisateurs)
- Rôles utilisateurs : `admin` et `user`
- Rôles par projet : `admin` et `member`

---

## Technologies utilisées

- PHP
- MySQL
- HTML / CSS
- PDO (connexion base de données)

---

## Structure du projet

```

gestion_projet/
│
├── config/
│   └── Database.php               (getInstance())
│
├── models/
│   ├── UserModel.php              (findByEmail, findById, getAll, create, update, delete)
│   ├── ProjectModel.php           (getAll, getById, getByUser, create, update, delete, addMember, removeMember)
│   ├── TaskModel.php              (getByProject, getById, create, update, updateStatus, delete)
│   └── PasswordResetModel.php     (create, findByToken, delete)
│
├── controllers/
│   ├── AuthController.php         (login, logout, register, forgotPassword, resetPassword)
│   ├── ProjectController.php      (index, show, create, edit, delete, addMember)
│   ├── TaskController.php         (create, edit, delete, updateStatus)
│   └── UserController.php         (index, edit, delete)
│
├── views/
│   ├── auth/
│   │   ├── login.php
│   │   ├── register.php
│   │   └── forgot_password.php
│   ├── projects/
│   │   ├── list.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── detail.php
│   ├── tasks/
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── list.php
│   ├── users/
│   │   ├── list.php
│   │   └── edit.php
│   └── includes/
│       ├── header.php
│       └── footer.php
│
├── styles/
│   └── main.css
│
├── .gitignore
└── index.php                      (route vers le bon contrôleur)             ← point d'entrée unique



gestion_projet/
│
├── config.php            ← connexion base de données (non versionné)
│
├── auth/
│   ├── login.php
│   ├── logout.php
│   ├── register.php
│   ├── forgot_password.php
│   ├── reset_password.php
│   └── auth_check.php
│
├── pages/
│   ├── dashboard.php
│   ├── projects/
│   │   ├── list.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   ├── delete.php
│   │   └── detail.php
│   ├── tasks/
│   │   ├── create.php
│   │   ├── edit.php
│   │   ├── delete.php
│   │   └── update_status.php
│   └── users/
│       ├── list.php
│       ├── edit.php
│       └── delete.php
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── styles/
│   └── main.css
│
├── .gitignore
└── index.php
```

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/ton-utilisateur/gestion_projet.git
cd gestion_projet
```

### 2. Créer la base de données

Importer le fichier SQL dans phpMyAdmin ou via la commande :

```bash
mysql -u root -p < gestion_projet.sql
```

### 3. Configurer la connexion

Copier le fichier exemple et remplir tes informations :

```bash
cp config/config.example.php config/config.php
```

Puis modifier `config/config.php` :

```php
<?php
$host = 'localhost';
$dbname = 'gestion_projet';
$user = 'ton_utilisateur';
$password = 'ton_mot_de_passe';

$con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
?>
```

### 4. Lancer le projet

Placer le projet dans le dossier de ton serveur local (ex: `htdocs` pour XAMPP) et accéder à :

```
http://localhost/gestion_projet/
```

---

## Base de données

Le schéma contient les tables suivantes :

| Table | Description |
|---|---|
| `users` | Utilisateurs de l'application |
| `projects` | Projets créés par les utilisateurs |
| `project_users` | Membres associés à chaque projet |
| `tasks` | Tâches liées aux projets |
| `password_resets` | Tokens de réinitialisation de mot de passe |

---

## Sécurité

- Les mots de passe sont hashés avec `password_hash()` et vérifiés avec `password_verify()`
- Toutes les requêtes SQL utilisent des requêtes préparées (`prepare` / `execute`)
- Les données affichées sont protégées avec `htmlspecialchars()`
- Le fichier `config.php` est exclu du dépôt via `.gitignore`

---

## Rôles

**Rôle global (table `users`) :**
- `admin` : accès à la gestion de tous les utilisateurs
- `user` : accès uniquement à ses propres projets

**Rôle par projet (table `project_users`) :**
- `admin` : peut modifier/supprimer le projet et gérer les membres
- `member` : peut consulter et gérer les tâches du projet

---

## Auteur

Développé par **NOUGNANKEY Faure dit codeur de la jungle**  
Contact : na5yfaure@gmail.com
