<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thearticle
 *
 * @ORM\Table(name="thearticle", uniqueConstraints={@ORM\UniqueConstraint(name="thearticleslug_UNIQUE", columns={"thearticleslug"})}, indexes={@ORM\Index(name="fk_thearticle_theuser1_idx", columns={"theuser_idtheuser"})})
 * @ORM\Entity
 */
class Thearticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="idthearticle", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idthearticle;

    /**
     * @var string
     *
     * @ORM\Column(name="thearticletitle", type="string", length=120, nullable=false)
     */
    private $thearticletitle;

    /**
     * @var string
     *
     * @ORM\Column(name="thearticleslug", type="string", length=120, nullable=false)
     */
    private $thearticleslug;

    /**
     * @var string
     *
     * @ORM\Column(name="thearticleresume", type="string", length=250, nullable=false)
     */
    private $thearticleresume;

    /**
     * @var string
     *
     * @ORM\Column(name="thearticletext", type="text", length=65535, nullable=false)
     */
    private $thearticletext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thearticledate", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $thearticledate = 'CURRENT_TIMESTAMP';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="thearticleactivate", type="boolean", nullable=true, options={"comment"="0 => waiting
1 => publish
2 => deleted"})
     */
    private $thearticleactivate = '0';

    /**
     * @var \Theuser
     *
     * @ORM\ManyToOne(targetEntity="Theuser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="theuser_idtheuser", referencedColumnName="idtheuser")
     * })
     */
    private $theuserIdtheuser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thecomment", inversedBy="thearticleIdthearticle")
     * @ORM\JoinTable(name="thearticle_has_thecomment",
     *   joinColumns={
     *     @ORM\JoinColumn(name="thearticle_idthearticle", referencedColumnName="idthearticle")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="thecomment_idthecomment", referencedColumnName="idthecomment")
     *   }
     * )
     */
    private $thecommentIdthecomment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Theimage", mappedBy="thearticleIdthearticle")
     */
    private $theimageIdtheimage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thesection", mappedBy="thearticleIdthearticle")
     */
    private $thesectionIdthesection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->thecommentIdthecomment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->theimageIdtheimage = new \Doctrine\Common\Collections\ArrayCollection();
        $this->thesectionIdthesection = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
