<?php

require 'Model/SalarieDAO.php';

/**
 * Class Salarie
 */
class Salarie
{
    /**
     * @var
     */
    private $_id;
    /**
     * @var
     */
    private $_nom;
    /**
     * @var
     */
    private $_prenom;
    /**
     * @var
     */
    private $_email;
    /**
     * @var
     */
    private $_photo;
    /**
     * @var
     */
    private $_identifiant;
    /**
     * @var
     */
    private $_password;
    /**
     * @var
     */
    private $_status;
    /**
     * @var
     */
    private $_credit;
    /**
     * @var
     */
    private $_nbJour;
    /**
     * @var
     */
    private $_adresse;

    /**
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $email
     * @param null $photo
     * @param $identifiant
     * @param $password
     * @param $status
     * @param $credit
     * @param $nbJour
     * @param null $adresse
     */
    public function __construct($id,
                                $nom,
                                $prenom,
                                $email,
                                $photo = null,
                                $identifiant,
                                $password,
                                $status,
                                $credit,
                                $nbJour,
                                $adresse = null)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->setPhoto($photo);
        $this->setIdentifiant($identifiant);
        $this->setPassword($password);
        $this->setStatus($status);
        $this->setCredit($credit);
        $this->setNbJour($nbJour);
        $this->setAdresse($adresse);
    }

    /**
     * @return Int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param Int $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return String
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param String $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param String $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return String
     */
    public function getPhoto()
    {
        return $this->_photo;
    }

    /**
     * @param String $photo
     */
    public function setPhoto($photo)
    {
        $this->_photo = $photo;
    }

    /**
     * @return String
     */
    public function getIdentifiant()
    {
        return $this->_identifiant;
    }

    /**
     * @param String $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->_identifiant = $identifiant;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param String $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    /**
     * @return int
     */
    public function getCredit()
    {
        return $this->_credit;
    }

    /**
     * @param int $credit
     */
    public function setCredit($credit)
    {
        $this->_credit = $credit;
    }

    /**
     * @return int
     */
    public function getNbJour()
    {
        return $this->_nbJour;
    }

    /**
     * @param int $nbJour
     */
    public function setNbJour($nbJour)
    {
        $this->_nbJour = $nbJour;
    }

    /**
     * @return int
     */
    public function getAdresse()
    {
        return $this->_adresse;
    }

    /**
     * @param int $adresse
     */
    public function setAdresse($adresse)
    {
        $this->_adresse = $adresse;
    }
}

?>