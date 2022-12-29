<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Arbitre
  * @Vich\Uploadable
 * @ORM\Table(name="arbitre")
 * @ORM\Entity
 */
class Arbitre
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
     ** @Assert\NotBlank (message="nom obligatoire")
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     * @Assert\NotBlank (message="prenom obligatoire")
     * @ORM\Column(name="filiere", type="string", length=20, nullable=false)
     */
    private $filiere;

    /**
     * @var string


     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibilite", type="string", length=20, nullable=false)
     */
    private $disponibilite;

    /**
     * Arbitre constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Arbitre
     */
    public function setId(int $id): Arbitre
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom():? string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Arbitre
     */
    public function setNom(string $nom): Arbitre
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
     * @return Arbitre
     */
    public function setPrenom(string $prenom): Arbitre
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
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Arbitre
     */
    public function setUpdatedAt(\DateTime $updatedAt): Arbitre
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * @param string $filiere
     * @return Arbitre
     */
    public function setFiliere(string $filiere): Arbitre
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
     * @return Arbitre
     */
    public function setImage( $image): Arbitre
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    /**
     * @param string $disponibilite
     * @return Arbitre
     */
    public function setDisponibilite(string $disponibilite): Arbitre
    {
        $this->disponibilite = $disponibilite;
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
