<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thesection
 *
 * @ORM\Table(name="thesection", uniqueConstraints={@ORM\UniqueConstraint(name="thesectionslug_UNIQUE", columns={"thesectionslug"})})
 * @ORM\Entity
 */
class Thesection
{
    /**
     * @var int
     *
     * @ORM\Column(name="idthesection", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idthesection;

    /**
     * @var string
     *
     * @ORM\Column(name="thesectiontitle", type="string", length=60, nullable=false)
     */
    private $thesectiontitle;

    /**
     * @var string
     *
     * @ORM\Column(name="thesectionslug", type="string", length=60, nullable=false)
     */
    private $thesectionslug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thesectiondesc", type="string", length=300, nullable=true)
     */
    private $thesectiondesc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thearticle", inversedBy="thesectionIdthesection")
     * @ORM\JoinTable(name="thesection_has_thearticle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="thesection_idthesection", referencedColumnName="idthesection")
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

}
