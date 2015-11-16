<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\NotEmpty;
/**
 * Description of LoginFormValide
 *
 * @author Marcelo
 */
class LoginFilter extends InputFilter {
    public function __construct() {
        $nome = new Input('nome');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
        $nome = new Input('senha');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
    }
}
