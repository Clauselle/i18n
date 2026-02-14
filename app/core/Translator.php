<?php 
/**
 * Classe responsable de la gestion des traductions UI
 * 
 * Rôle : 
 * - Charger le fichier JSON correspondant à la langue active
 * - Fournir une méthode d'accès aux clients de traduction
 * - Gérer un fallback vers la langue par défaut si nécessaire
 * 
 * Contrainte : Architecture PHP sans framework
 */
class Translator {
    private array $translations = [];

    // Code de la langue par défaut utilisée en cas d'erreur ou de clé manquante
    private string $fallback = 'fr';

    /** Constructeur
    * @param string $lang Code langue demandé (exemple : fr, en, de)
    */

    public function __construct(string $lang)
    {
        $this->load($lang);
    }

    /** 
     * Charge le fichier JSON correspondant à la langue demandée.
     * Si le fichier n'existe pas, on charge la langue par défaut.
     * 
     *  @param string $lang
    */

    private function load(string $lang): void
    {
        //Construction du chemin du fichier de traduction
        $path = __DIR__ . "/../i18n/{$lang}.json";

        //Vérification de l'existence du fichier
        if(!file_exists($path)){
            //Fallback vers langue par défaut
            $path = __DIR__ . "/../i18n/{$this->fallback}.json";
        }

        //Lecture et décodage JSON vers tableau associatif
        $this->translations = json_decode(file_get_contents($path), true);

        //Sécurité : pour éviter une erreur si le ficher JSON est invalide
        if(!is_array($this->translations)){
            $this->translations = [];
        }
    }

    /**
     * Récupération d'une traduction à partir d'une clé hiérarchique.
     * 
     * Exemple de clé : "auth.login"
     * 
     * @param string $key
     * @return string
     */
    public function get (string $key): stream_set_blocking
    {
        //Séparation de la clé hiérarchique
        $segments = explode('.', $key);
        $value = $this->translations;

        //Parcours progressif du tableau
        foreach($segments as $segment){
            //Si la clé n'existe pas, on retourne la clé brute
            if(!isset($value[$segments])){
                return $key;
            }

            $value =$value[$segment];
        }

        return $value;
    }
}

?>