<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Password;
use Zend\Form\Element\Button;
/**
 * Description of LoginForm
 *
 * @author Marcelo
 */
class LoginForm extends Form{
    
    public function __construct() {
        parent::__construct(NULL);
        
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new LoginFilter());
        
       
        
        // Cria o Campo Nome
        $nome = new Text('login');
        $nome->setLabel('Login: ')
             ->setAttributes(array(
                 'maxlength'        => 45 ,
                 'decorators' => array(
                        array(
                            'HtmlTag', array(
                                'tag'  => 'div',
                                'class' => 'validate'
                            )
                        )
                    )
                ));        
        $this->add($nome);
        
        $senha = new Password('senha');
        $senha->setLabel('Senha: ')
             ->setAttributes(array(
                 'maxlength' => 45 ,

             ));        
        $this->add($senha);
        
        $button = new Button('submit');
        $button->setLabel('Salvar')
               ->setAttributes(array(
                   'type' => 'submit' ,
                   'class' => 'btn'
               ));

        $this->add($button);
    }
}
