<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Usuario\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Button;
use Zend\Form\Element\Select;
use Zend\Form\Element\Password;
use Usuario\Form\UsuarioFilter;
/**
 * Description of UsuarioForm
 *
 * @author Marcelo
 */
class UsuarioForm  extends Form{
    
    public function __construct() {
        parent::__construct(NULL);
        
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new UsuarioFilter());
        
        // Cria o Campo Nome
        $nome = new Text('nome');
        $nome->setAttributes(array(
                 'maxlength'        => 45 ,
                 'class'            => "form-control col-md-6 col-sm-6 col-xs-12",
                 'placeholder'      => "Nome Sobreno "
             ));        
        $this->add($nome);
        
        // Cria o Campo Login
        $nome = new Text('login');
        $nome->setAttributes(array(
                 'maxlength' => 45 ,
                 'class'     => "form-control col-sm-10",
                 'placeholder'=> "usuário_login"
             ));        
        $this->add($nome);
        
        // Cria o Campo E-mail
        $nome = new Text('email');
        $nome->setAttributes(array(
                 'maxlength' => 45 ,
                 'class'     => "form-control col-sm-10",
                 'placeholder'=> "usuario@usuario.com"
             ));        
        $this->add($nome);
        
        // Cria o Campo Senha
        $nome = new Password('senha');
        $nome->setAttributes(array(
                 'maxlength' => 45 ,
                 'class'     => "form-control col-sm-10",
                 'placeholder'=> "***************"
             ));        
        $this->add($nome);
        
        $token = new Text('token');
        $token->setValue('1');
        $this->add($token);
        
        // Cria o Campo 
        $nome = new Select('status');
        $nome->setValueOptions(array(
                ''  => '' , 
                '1' => 'Ativo',
                '2' => 'Inativo'
                ))
             ->setAttributes(array(
                'class' => 'form-control col-sm-10' 
             ));        
        $this->add($nome);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
               ->setAttributes(array(
                   'type' => 'submit' ,
                   'class' => 'btn btn-primary col-sm-12',
               ));

        $this->add($button);
    }
}
