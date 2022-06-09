<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theuser
 *
 * @ORM\Table(name="theuser", uniqueConstraints={@ORM\UniqueConstraint(name="theusermail_UNIQUE", columns={"theusermail"}), @ORM\UniqueConstraint(name="theuseruniqid_UNIQUE", columns={"theuseruniqid"}), @ORM\UniqueConstraint(name="theuserlogin_UNIQUE", columns={"theuserlogin"})}, indexes={@ORM\Index(name="fk_theuser_permission_idx", columns={"permission_idpermission"})})
 * @ORM\Entity
 */
class Theuser
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtheuser", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtheuser;

    /**
     * @var string
     *
     * @ORM\Column(name="theuserlogin", type="string", length=60, nullable=false)
     */
    private $theuserlogin;

    /**
     * @var string
     *
     * @ORM\Column(name="theuserpwd", type="string", length=255, nullable=false)
     */
    private $theuserpwd;

    /**
     * @var string
     *
     * @ORM\Column(name="theusermail", type="string", length=255, nullable=false)
     */
    private $theusermail;

    /**
     * @var string
     *
     * @ORM\Column(name="theuseruniqid", type="string", length=255, nullable=false)
     */
    private $theuseruniqid;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="theuseractivate", type="boolean", nullable=true, options={"comment"="0 => inactive
1 => active
2 => ban"})
     */
    private $theuseractivate = '0';

    /**
     * @var \Permission
     *
     * @ORM\ManyToOne(targetEntity="Permission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_idpermission", referencedColumnName="idpermission")
     * })
     */
    private $permissionIdpermission;

    public function getIdtheuser(): ?int
    {
        return $this->idtheuser;
    }

    public function getTheuserlogin(): ?string
    {
        return $this->theuserlogin;
    }

    public function setTheuserlogin(string $theuserlogin): self
    {
        $this->theuserlogin = $theuserlogin;

        return $this;
    }

    public function getTheuserpwd(): ?string
    {
        return $this->theuserpwd;
    }

    public function setTheuserpwd(string $theuserpwd): self
    {
        $this->theuserpwd = $theuserpwd;

        return $this;
    }

    public function getTheusermail(): ?string
    {
        return $this->theusermail;
    }

    public function setTheusermail(string $theusermail): self
    {
        $this->theusermail = $theusermail;

        return $this;
    }

    public function getTheuseruniqid(): ?string
    {
        return $this->theuseruniqid;
    }

    public function setTheuseruniqid(string $theuseruniqid): self
    {
        $this->theuseruniqid = $theuseruniqid;

        return $this;
    }

    public function isTheuseractivate(): ?bool
    {
        return $this->theuseractivate;
    }

    public function setTheuseractivate(?bool $theuseractivate): self
    {
        $this->theuseractivate = $theuseractivate;

        return $this;
    }

    public function getPermissionIdpermission(): ?Permission
    {
        return $this->permissionIdpermission;
    }

    public function setPermissionIdpermission(?Permission $permissionIdpermission): self
    {
        $this->permissionIdpermission = $permissionIdpermission;

        return $this;
    }

    public function __tostring():string {
        return $this->getIdtheuser()." - ".
        $this->getTheuserlogin();
    }

}
