<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Usuario
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

    /**
     * @var string
     *
     * @ORM\Column(name="TOKEN", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var integer
     *
     * @ORM\Column(name="STATUS", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DTA_INC", type="datetime", nullable=false)
     */
    private $dtaInc = 'CURRENT_TIMESTAMP';

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getToken() {
        return $this->token;
    }

    function getStatus() {
        return $this->status;
    }

    function getDtaInc() {
        return $this->dtaInc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setToken($token) {
        $this->token = $token;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setDtaInc(\DateTime $dtaInc) {
        $this->dtaInc = $dtaInc;
    }


}

