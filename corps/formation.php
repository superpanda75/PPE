<?php
class Formation
{
    private $_id;
    private $_titre;
    private $_cout;
    private $_dateDebut;
    private $_duree;
    private $_image;
    private $_NbPlace;
    private $_typeFormation; //TODO: c'est la catégorie de la formation, on récupèrera l'id;
    private $_prestataire; //TODO: Ici on récupèrera l'id du prestataire puis à partir de cet ID nous ferons les traitements nécessaires
    private $_adresse; //TODO: de même nous partirons de l'ID de l'adresse;
    private $_contenu;//TODO: ce sera un tableau ou les commentaires seront triés par date décroissantes (du + récent au + ancien;

    /**
     * Formation constructor.
     * @param $_id
     * @param $_titre
     * @param $_cout
     * @param $_dateDebut
     * @param $_duree
     * @param $_image
     * @param $_NbPlace
     * @param $_typeFormation
     * @param $_prestataire
     * @param $_adresse
     * @param $_contenu
     */
    public function __construct($id,
                                $titre,
                                $cout,
                                $dateDebut,
                                $duree,
                                $image,
                                $NbPlace,
                                $typeFormation,
                                $prestataire,
                                $adresse,
                                $contenu)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setCout($cout);
        $this->setDateDebut($dateDebut);
        $this->setDuree($duree);
        $this->setImage($image);
        $this->setNbPlace($NbPlace);
        $this->setTypeFormation($typeFormation);
        $this->setPrestataire($prestataire);
        $this->setAdresse($adresse);
        $this->setCommentaire($contenu);
    }




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->_titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getCout()
    {
        return $this->_cout;
    }

    /**
     * @param mixed $cout
     */
    public function setCout($cout)
    {
        $this->_cout = $cout;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->_dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->_dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->_duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->_duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

    /**
     * @return mixed
     */
    public function getNbPlace()
    {
        return $this->_NbPlace;
    }

    /**
     * @param mixed $NbPlace
     */
    public function setNbPlace($NbPlace)
    {
        $this->_NbPlace = $NbPlace;
    }

    /**
     * @return mixed
     */
    public function getTypeFormation()
    {
        return $this->_typeFormation;
    }

    /**
     * @param mixed $typeFormation
     */
    public function setTypeFormation($typeFormation)
    {
        $this->_typeFormation = $typeFormation;
    }

    /**
     * @return mixed
     */
    public function getPrestataire()
    {
        return $this->_prestataire;
    }

    /**
     * @param mixed $prestataire
     */
    public function setPrestataire($prestataire)
    {
        $this->_prestataire = $prestataire;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->_adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->_adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->_contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setCommentaire($contenu)
    {
        $this->_contenu = $contenu;
    }





}

?>