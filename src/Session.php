<?php

namespace App;

class Session {
    // session_status() est utilisée pour connaitre l'état de la session courante.
    // PHP_SESSION_NONE si les sessions sont activées, mais qu'aucune n'existe.
    // session_start() démarre une nouvelle session ou reprend une session existante.    

    private $session;

    // Initialisation de la session
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {            
            session_start(); 
        }    
        $this->session = $_SESSION;
    }
    
    public function get (string $key) {
        if ($this->has($key)) {
            return $this->session[$key];
        }
        return null;
    }
    
    /**
     * @param string $key
     * @param mixed $value
     * @return SessionManager
     */
    
    // Méthode qui définit la clé et la valeur du tableau $_SESSION
     public function set (string $key, $value) {
        $this->session[$key] = $value;
        $_SESSION = $this->session;
        return $this;
    }

    // Méthode qui supprime les variables de la session courante
    public function remove (string $key) {
        if ($this->has($key)) {
            unset($this->session[$key]);
            $_SESSION = $this->session;
            
            // !Retour vers l'accueil
            header("Location: /blogMvc/"); 
        }
    }

    // Méthode qui déconnecte l'utilisateur
    public function clear () {
        session_unset();
    }

    // Méthode qui indique que si l'utilisateur est connecté, on retourne la variable de session avec sa clé
    public function has (string $key) {
        return array_key_exists($key, $this->session); 
    }
}

