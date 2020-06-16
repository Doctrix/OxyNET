<?php
namespace App;

use App\Model\User;
use App\Security\ForbiddenException;
use PDO;

class Auth
{
    private $pdo;
    public static $router;
    public static $session;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function Verifier()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params(86400, dirname($_SERVER['REQUEST_URI']));
            session_start();
        }
        if(!isset($_SESSION['auth'])) {
            throw new ForbiddenException();
        } 
    }

    public static function user(): ?User
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = self::$session['auth'] ?? null;
        if ($id === null) {
            return null;
        }

        $query = self::$pdo->prepare('SELECT * FROM utilisateur WHERE id = ?');
        $query->execute([$id]);
        $utilisateur = $query->fetchObject(User::class);
        return $utilisateur ?: null;
    }

    public function login(string $username, string $password, $remember = false): ?USer
    {
        // Trouver l'utilisateur = $username correspondant au 'username'
        $query = $this->pdo->query("SELECT * FROM utilisateur WHERE username = username");
        $query->execute(['username' => $username]);
        $utilisateur = $query->fetchObject(User::class);
        if ($utilisateur === false) {
            return null;
        }
        // On vérifie password_verify que l'utilisateur correspond
        if (password_verify($password, $utilisateur->obtenirPassword()) === true) 
        {
            if (session_status() === PHP_SESSION_NONE) 
            {
                session_start();
            }
            $this->connect($utilisateur->getId());
            if($remember) 
            {
                $this->remember($this->pdo, $utilisateur->id);
            }
            return $utilisateur;
        } else {
            return false;
        } 
    }

    public function register($db,$username,$password,$email)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $token = StrRandom::random(60);
        $db->query("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
            $username, 
            $password, 
            $email, 
            $token
        ]);
        $user_id = $db->lastInsertId();
        mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttps://serveur.oxygames.fr/confirm?id=$user_id&$token");
    }

    public function confirm($db,$user_id, $token)
    {
        $user = $db->query('SELECT * FROM utilisateur WHERE id = ?', [$user_id])->fetch();
        if($user && $user->confirmation_token == $token){
            $db->query('UPDATE utilisateur SET confirmation_token = NULL, date_creation_compte = NOW( WHERE id = ?', [$user_id]);
            $this->session->write('auth', $user);
            return true;
        }
        return false;
    }

    public function connect($utilisateur)
    {
        $this->session->write('auth', $utilisateur);
    }

    public function restrict()
    {
        if (!$this->session->read('auth')) {
            $this->session->setErreur("Vous n'avez pas le droit d'accéder à cette page");
            header('Location: ' . $this->router->login);
            exit();
        }
    }

    public function remember($db, $user_id) 
    {
        $remember_token = StrRandom::random(250);
        $db->query('UPDATE utilisateur SET remember_token = ? WHERE id = ?', [$remember_token, $user_id]);
        setcookie('remember', $user_id . '==' . $remember_token .sha1($user_id . 'oxyoxy'), time() + 60 * 60 * 24 * 7);
    }

    public function logout()
    {
        setcookie('remember', NULL, -1);
        $this->session->delete('auth');
    }

    public function resetPassword($db, $email) 
    {
        $utilisateur = $db->query("SELECT * FROM utilisateur WHERE email = ? AND date_creation_compte IS NOT NULL", [$email])->fetch();
        if($utilisateur) {
            $reset_token = StrRandom::random(60);
            $db->query('UPDATE utilisateur SET reset_token = ?, reset_id = NOW() WHERE id = ?', [$reset_token, $utilisateur->id]);
            mail($_POST['email'], 'Reinitialisation de votre mot de passe', "Afin de réinitialiser votre mote de passe veillez clique sur le lien suivant : $reset_token");
        } else {
            $this->session->setErreur('Aucun compte ne correspond à cet adresse');
        }
    }

    public static function roleUSer()
    {
        if(isset($_SESSION['auth']->slug)) {
            return $_SESSION['auth']->slug;

        } else {
            return false;
        }
    }
    
   
}

