<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Listeatt
 * @Vich\Uploadable
 * @ORM\Table(name="listeatt")
 * @ORM\Entity
 */
class Listeatt
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="filiere", type="string", length=20, nullable=false)
     */
    private $filiere;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Listeatt
     */
    public function setId(int $id): Listeatt
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Listeatt
     */
    public function setNom(string $nom): Listeatt
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Listeatt
     */
    public function setPrenom(string $prenom): Listeatt
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    /**
     * @param string $filiere
     * @return Listeatt
     */
    public function setFiliere(string $filiere): Listeatt
    {
        $this->filiere = $filiere;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Listeatt
     */
    public function setImage( $image): Listeatt
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Listeatt
     */
    public function setUpdatedAt(\DateTime $updatedAt): Listeatt
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    public function setImageFile( $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

}
