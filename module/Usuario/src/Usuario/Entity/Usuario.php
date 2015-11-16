<?php

namespace Usuario\Entity;
use Administracao\Entity\AbstractEntity ;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\UsuarioRepository")
 */
class Usuario extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="LOGIN", type="string", length=40, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=60, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="SENHA", type="string", length=255, nullable=false)
     */
    private $senha;
    private $salt = "Salt?Encrypt?Senha?Rondon+9)SisCart(";
    /**
     * @var string
     *
     * @ORM\Column(name="TOKEN", type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var boolean
     *
     * @ORM\Column(name="STATUS", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DTA_INC", type="datetime", nullable=false)
     */
    private $dtaInc;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Usuario
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $salt = md5($this->salt);
        $codifica = crypt($senha,$salt);

        $this->senha = hash('sha512',$codifica);

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Usuario
     */
    public function setToken($token)
    {   
        $this->token = sha1($this->salt);

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Usuario
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dtaInc
     *
     * @param \DateTime $dtaInc
     *
     * @return Usuario
     */
    public function setDtaInc($dtaInc)
    {
        $this->dtaInc = $dtaInc;

        return $this;
    }

    /**
     * Get dtaInc
     *
     * @return \DateTime
     */
    public function getDtaInc()
    {
        return $this->dtaInc;
    }
}
