Module i18n PHP

Ce module fournit une solution d'internationalisation (i18n) pour une application PHP sans framework.

Il permet : 
- la gestion des traductions d'interface utilisateur
- le chargement dynamique des langues
- la gestion d'un fallback automatique
- une cohérence entre backend PHP et frontend JasaScript

1- Langues supportées : 
- Français (fr)
- Anglais (en)
- Allemand (de)

2- Prérequis : 
- PHP 8.0+
- MariaDB (pour la partie données traduisibles)
- JavaScript (jQuery côté frontend)
NB : Aucune dépendance externe requise

3- Structure du module : 
i18n
	/app
		/core
			Translator.php
		/i18n
			fr.json
			en.json
			de.json
	/public
		/js
			i18n.js
	index.php
README.md

4- Installation : 
Placer le fichier Translator.php dans /app/core et les fichiers JSON dans /app/i18n.
Le fichier d'entrée index.php dans /public et le fichier i18n.js dans /public/js

5- Ajouter une nouvelle langue : 
- Créer un nouveau fichier (ex: es.json)
- Ajouter la langue dans la whitelist : 
$allowedLanguages = ['fr', 'en', 'de', 'es'];
- Traduire les clés existantes
NB : Aucune modification du service Translator n'est nécessaire

7- Stratégie de versioning : 
> feature/i18n-core
> feature/i18n-auth-module
> feature/i18n-db-structure
> refactor/remove-hardcoded-text

















