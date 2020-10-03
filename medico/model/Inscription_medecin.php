<?php


require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/traitement/traitement_formulaire_inscription.php");
class Insert_medecin{
  public $id,$nom,$prenom,$departement,$specialite,$mail,$mdp;


    /**
     * Utilisateur constructor.
     * @param array $array
     */
  public function __construct($array)
    {

    /*    if(empty($array['admin']))
        {
            $array['admin']=null;
        }
        */
        $this->hydrate($array);
    }

    /**
     * @param array $donnees
     * Method hydrate de la class Utilisateur

     */



    public function hydrate($donnees)
    {
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param string $adresse
     * @return Utilisateur
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
        return $this;
    }
    /**

     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     * @return Utilisateur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }
    /**
     * @return string $specialite
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param int $id
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



}

 ?>
