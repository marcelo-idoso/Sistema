<?php
namespace Usuario\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\NotEmpty;

/**
 * Description of UsuarioFilter
 *
 * @author Marcelo
 */
class UsuarioFilter extends InputFilter{

    public function __construct() {
        // Valida Campo Nome
        $nome = new Input('nome');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
        // Valida Campo Login
        $nome = new Input('login');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
        // Valida Campo E-mail
        $nome = new Input('email');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
        // Valida Campo Senha
        $nome = new Input('senha');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
        $nome = new Input('token');
        $this->add($nome);
        
        // Valida Campo Status
        $nome = new Input('status');
        $nome->setRequired(true)
             ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);
        
    }
}
