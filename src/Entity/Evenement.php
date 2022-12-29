<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
 use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Evenement
 * @Vich\Uploadable
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEvenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEvenement", type="string", length=250, nullable=false)
     * @Assert\NotBlank (message="nom obligatoire")
     */
    private $nomevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="descripEvenement", type="string", length=250, nullable=false)
     */
    private $descripevenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEvenement", type="date", nullable=false)
     *  @Assert\LessThan("01/01/2022") (message="champ obligatoir")
     *  @Assert\GreaterThan("01/01/2021") (message="champ obligatoir")

     */
    private $dateevenement;
    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=250, nullable=false)
     * @Assert\NotBlank (message="lieu obligatoire")
     */
    private $lieu;
    /**
     * @var int
     *
     * @ORM\Column(name="nbrePL", type="integer", length=11, nullable=false)
     * @Assert\NotBlank (message="nombre obligatoire")
     */
    private $nbrePL;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     *
     */
    private $image;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Evenement
     */
    public function setImage( $image): Evenement
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbrePL(): ?int
    {
        return $this->nbrePL;
    }

    /**
     * @param int $nbrePL
     * @return Evenement
     */
    public function setNbrePL(int $nbrePL): Evenement
    {
        $this->nbrePL = $nbrePL;
        return $this;
    }
    /**
     * @return string
     */
    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     * @return Evenement
     */
    public function setLieu(string $lieu): Evenement
    {
        $this->lieu = $lieu;
        return $this;
    }
    /**
     * Evenement constructor.
     */
    private $yes;
    public function __construct()
    {

    }

    /**
     * @return int
     */
    public function getIdevenement():       ?int
    {
        return $this->idevenement;
    }

    /**
     * @param int $idevenement
     * @return Evenement
     */
    public function setIdevenement(int $idevenement): Evenement
    {
        $this->idevenement = $idevenement;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomevenement():  ?string
    {
        return $this->nomevenement;
    }

    /**
     * @param string $nomevenement
     * @return Evenement
     */
    public function setNomevenement(string $nomevenement): Evenement
    {
        $this->nomevenement = $nomevenement;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripevenement(): ?string
    {
        return $this->descripevenement;
    }

    /**
     * @param string $descripevenement
     * @return Evenement
     */
    public function setDescripevenement(string $descripevenement): Evenement
    {
        $this->descripevenement = $descripevenement;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateevenement(): ?\DateTime
    {
        return $this->dateevenement;
    }

    /**
     * @param \DateTime $dateevenement
     * @return Evenement
     */
    public function setDateevenement(\DateTime $dateevenement): Evenement
    {
        $this->dateevenement = $dateevenement;
        return $this;
    }

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;
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
