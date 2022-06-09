<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Theimage
 *
 * @ORM\Table(name="theimage", uniqueConstraints={@ORM\UniqueConstraint(name="theimagename_UNIQUE", columns={"theimagename"})})
 * @ORM\Entity
 */
class Theimage
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtheimage", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtheimage;

    /**
     * @var string
     *
     * @ORM\Column(name="theimagename", type="string", length=45, nullable=false)
     */
    private $theimagename;

    /**
     * @var string
     *
     * @ORM\Column(name="theimagetype", type="string", length=5, nullable=false)
     */
    private $theimagetype;

    /**
     * @var string
     *
     * @ORM\Column(name="theimageurl", type="string", length=100, nullable=false)
     */
    private $theimageurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="theimagetext", type="string", length=250, nullable=true)
     */
    private $theimagetext;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thearticle", inversedBy="theimageIdtheimage")
     * @ORM\JoinTable(name="theimage_has_thearticle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="theimage_idtheimage", referencedColumnName="idtheimage")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="thearticle_idthearticle", referencedColumnName="idthearticle")
     *   }
     * )
     */
    private $thearticleIdthearticle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->thearticleIdthearticle = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdtheimage(): ?int
    {
        return $this->idtheimage;
    }

    public function getTheimagename(): ?string
    {
        return $this->theimagename;
    }

    public function setTheimagename(string $theimagename): self
    {
        $this->theimagename = $theimagename;

        return $this;
    }

    public function getTheimagetype(): ?string
    {
        return $this->theimagetype;
    }

    public function setTheimagetype(string $theimagetype): self
    {
        $this->theimagetype = $theimagetype;

        return $this;
    }

    public function getTheimageurl(): ?string
    {
        return $this->theimageurl;
    }

    public function setTheimageurl(string $theimageurl): self
    {
        $this->theimageurl = $theimageurl;

        return $this;
    }

    public function getTheimagetext(): ?string
    {
        return $this->theimagetext;
    }

    public function setTheimagetext(?string $theimagetext): self
    {
        $this->theimagetext = $theimagetext;

        return $this;
    }

    /**
     * @return Collection<int, Thearticle>
     */
    public function getThearticleIdthearticle(): Collection
    {
        return $this->thearticleIdthearticle;
    }

    public function addThearticleIdthearticle(Thearticle $thearticleIdthearticle): self
    {
        if (!$this->thearticleIdthearticle->contains($thearticleIdthearticle)) {
            $this->thearticleIdthearticle[] = $thearticleIdthearticle;
        }

        return $this;
    }

    public function removeThearticleIdthearticle(Thearticle $thearticleIdthearticle): self
    {
        $this->thearticleIdthearticle->removeElement($thearticleIdthearticle);

        return $this;
    }

}
