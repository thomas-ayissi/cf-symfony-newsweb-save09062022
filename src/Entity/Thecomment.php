<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thecomment
 *
 * @ORM\Table(name="thecomment", indexes={@ORM\Index(name="fk_thecomment_theuser1_idx", columns={"theuser_idtheuser"})})
 * @ORM\Entity
 */
class Thecomment
{
    /**
     * @var int
     *
     * @ORM\Column(name="idthecomment", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idthecomment;

    /**
     * @var string
     *
     * @ORM\Column(name="thecommenttext", type="string", length=850, nullable=false)
     */
    private $thecommenttext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thecommentdate", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $thecommentdate = 'CURRENT_TIMESTAMP';

    /**
     * @var bool
     *
     * @ORM\Column(name="thecommentactive", type="boolean", nullable=false, options={"comment"="0 => waiting
1 => publish
2 => deleted"})
     */
    private $thecommentactive = '0';

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
     * @ORM\ManyToMany(targetEntity="Thearticle", mappedBy="thecommentIdthecomment")
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
