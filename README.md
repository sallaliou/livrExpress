# LivrExpress 🚀

**LivrExpress** est une solution complète de gestion et de présentation pour un service de livraison rapide et fiable à Dakar (colis, repas, courses, etc.).

---

## 🌟 Fonctionnalités

### 🖥️ Vitrine & Commande (Front-Office)
- **Landing page responsive** conçue avec Tailwind CSS.
- **Section Services & Tarifs** clairs et adaptés aux besoins des clients (particuliers & entreprises).
- **Formulaire de commande / contact** sécurisé avec validation côté serveur et protection anti-spam (rate limiting).
- **Simulateur de livraison & estimation de tarif**.

### 📊 Tableau de bord (Back-Office Admin)
- **Gestion des commandes** : suivi des statuts (*Nouvelle*, *En cours*, *Livrée*, *Annulée*).
- **Filtres et recherche en temps réel**.
- **Statistiques & indicateurs clés de performance**.
- **Générateur de données de test** (`seed_demo.php`).

---

## 🛠️ Stack Technique

- **Backend** : PHP (sans framework lourd, léger et performant)
- **Frontend** : HTML5, JavaScript (Vanilla), Tailwind CSS
- **Stockage** : Fichiers JSON légers (`data/submissions.json`)
- **Serveur recommandé** : Apache / WampServer / XAMPP / PHP built-in server

---

## 🚀 Installation & Démarrage

1. **Cloner le projet :**
   ```bash
   git clone https://github.com/sallaliou/livrExpress.git
   cd livrExpress
   ```

2. **Démarrer avec le serveur intégré PHP (développement) :**
   ```bash
   php -S localhost:8000
   ```
   Ou déposez le dossier dans `c:\wamp64\www\livrExpress` sous WampServer.

3. **Générer des commandes de test (optionnel) :**
   Accédez à l'URL :
   `http://localhost:8000/seed_demo.php`

4. **Accès :**
   - **Site public** : `http://localhost:8000/index.php`
   - **Dashboard Admin** : `http://localhost:8000/admin.php`

---

## 👤 Auteur

**Aliou Daouda SALL**
- GitHub : [@sallaliou](https://github.com/sallaliou)
- Contact : contact@aliou-sall.dev
