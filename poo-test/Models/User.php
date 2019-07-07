<?php 

namespace Poo\Models;

/**
 * User Model Class
 * 
 * @todo-property Ajouter la propriété privée password à la classe.
 * @todo-heritage Faire hériter cette classe de la classe DefaultModel situtée dans le dossier Helpers.
 * @todo-useTrait Utiliser le trait ModelTrait situé dans le dossier Helpers.
 * @todo-useInterface Implémenter la UserInterface situé dans le dossier Helpers.
 * @todo-assesseur Terminer les assesseurs en prenant rendre en compte la php doc des méthode de l'inferface.
 * @todo-mutateur Terminer mutateurs en prenant rendre en compte la php doc des méthode de l'inferface.
 * 
 * @author Adebayo. H <hountondjigodwill@gmail.com>
 */
class User
{

    /**
     * User's lastname
     * 
     * @var string
     */
    private $lastname = "Gilloux";

    /**
     * User's firstname
     * 
     * @var string
     */
    private $firstname = "Brontis";

    /**
     * User's email
     * 
     * @var string
     */
    private $email = "email@email.com";


    /**
     * Say hello to some one
     * 
     * @todo-sayHello completer cette fonction pour quelle retourne 
     *                (@property $firstname) dit bonjour à (@param $friendName)
     *                où (@property $firstname) est le prenom de l'instance courante et (@param $friendName) le nom passer
     *                en paramètre (Vous devez forcer ce dernier à être une chaine de caractère).
     * 
     * @param string $friendName 
     * @return string 
     */
    public function sayHelloToFriend($friendName)
    {
        // code
    }
    
    /**
     * @return string lastname
     */
    public function getLastname()
    {
        // code 
    }

    /**
     * @param string $lastname
     * @return self
     */
    public function setLastname()
    {
        // code 
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        // code 
    }

    /**
     * @param string $firstname
     * @return self
     */
    public function setFirstname()
    {
        // code 
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        // code 
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        // code
    }

    /**
     * Return list of properties Private, Public etc ... 
     * 
     * @return array A list a properties
     */
    public function getAllProperties(): array
    {
        return get_object_vars($this);
    }


}
