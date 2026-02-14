/**
 * Fonction de récupération d'une traduction côté front.
 * 
 * @param {string} key - Clé hiérarchique (ex : "auth.login")
 * @returns {string}
 */

function trans(key){
    //Séparation de la clé par segment
    const segments = key.split('.');

    let value = window.TRANSLATIONS;

    //Parcours progressif de l'objet
    for(let segment of segments){
        //Si la clé n'existe pas, on retourne la clé brute, cela facilite la détection d'erreurs en dev
        if(!value || !value[segment]){
            return key;
        }

        value = value[segment];
    }

    return value;
}

//exemple d'utilisation avec jQuery
$('#login-btn').text(t('auth.login'));