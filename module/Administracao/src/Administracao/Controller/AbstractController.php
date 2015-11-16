<?php

namespace Administracao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;


abstract class abstractController extends AbstractActionController{
    
    protected $em;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;
    
    abstract function __construct();
    
    /**
     * Listar Resultados
     * @return array|ViewModel 
     */
    public function indexAction(){
        $list = $this->getEm()->getRepository($this->entity)->findAll();
        
        $page = $this->params()->fromRoute('page');
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                  ->setDefaultItemCountPerPage(10);
       
        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'success'   => $this->flashMessenger()->getSuccessMessages(),
                'data'      => $paginator ,
                'page'      => $page ,
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'data'      => $paginator ,
                'page'      => $page ,
                'error'     => $this->flashMessenger()->getErrorMessages(),
            ));
        }
        return new ViewModel(array(
            'data' => $paginator ,
            'page' => $page ,
            
        ));
    }
    
    /**
     * Inserir Registro
     * @return void Description
     */
    public function inserirAction(){
        if (is_string($this->form)) {
            $form = new $this->form;
        }else {
            $form = $this->form;
        }
        
        $request = $this->getRequest();
        
        if ($request->isPost()){
            $form->setData($request->getPost());
                
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                
                if ($service->save($request->getPost()->toArray())) {
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                }else {
                    $this->flashMessenger()->addErrorMessage("Não foi Possivel realizar o Cadastro!");
                }
                return $this->redirect()->toRoute( $this->route , array('controller' => $this->controller , 'action' => 'inserir'));
            }
        }
        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form ,
                'success' => $this->flashMessenger()->getSuccessMessages(),
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form ,
                'error' => $this->flashMessenger()->getErrorMessages(),
            ));
        }
        $this->flashMessenger()->clearMessages();
        return new ViewModel(array('form' => $form));
    }
    
    /**
     * Editar Registro
     * @return void Description
     */
    public function editarAction(){
        if (is_string($this->form)) {
            $form = new $this->form;
        }else {
            $form = $this->form;
        }
        $request = $this->getRequest();
        $param = $this->params()->fromRoute('id' , 0) ;
        
        $repository = $this->getEm()->getRepository($this->entity)->find($param);
        
        if ($repository) {
            
            $array = array();
            foreach ($repository->toArray() as $key => $value){
                if ($value instanceof \DateTime) {
                   $array[$key] = $value->format('d/m/Y'); 
                }else {
                    $array[$key] = $value ;
                }
            }
            $form->setData($array);
            
            if ($request->isPost()) {
                $form->setData($request->getPost());
                 
                if ($form->isValid()){
                    
                    $service = $this->getServiceLocator()
                                    ->get($this->service);
                    
                    $data = $request->getPost()
                                    ->toArray();
                    
                    $data['id'] = (int) $param;
                     echo "<pre>";

                echo "</pre>";
                    if ($service->save($data)) {
                        
                        $this->flashMessenger()
                             ->addSuccessMessage('Alterado com sucesso!');
                    }else {
                        $this->flashMessenger()
                             ->addErrorMessage("Não foi Possivel atualizar!");
                    }                  
                    return $this->redirect()
                                ->toRoute( 
                                    $this->route , 
                                    array(
                                        'controller' => $this->controller , 
                                        'action'     => 'editar' ,
                                        'id'         => $param
                                    )
                                );
                }
            }
        }else {
            $this->flashMessenger()
                 ->addInfoMessage("Registro não foi encontrado");
            
            return $this->redirect()
                        ->toRoute(
                            $this->route , 
                            array(
                                'controller' => $this->controller
                            )
                        );
        }
        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form ,
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'id'    => $param,
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form ,
                'error' => $this->flashMessenger()->getErrorMessages(),
                'id' => $param,
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form ,
                'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param,
            ));
        }
        $this->flashMessenger()->clearMessages();
        return new ViewModel(array(
            'form' => $form,
            'id' => $param
        ));
    }
    
    /**
     * Excluir um Registro
     * @return \Zend\Http\Response
     */
    public function excluirAction(){
        $service = $this->getServiceLocator()->get($this->service);
        $id = $this->params()->fromRoute('id' , 0) ;
        
        if ($service->remove(array('id' => $id))){
            $this->flashMessenger()
                 ->addSuccessMessage('Registro deletado com sucesso!');
        }else {
            $this->flashMessenger()
                 ->addErrorMessage('Não foi possivel deletar Registro');
        }
        return $this->redirect()
                    ->toRoute(
                        $this->route , 
                        array(
                            'controller' => $this->controller
                        )
                    );
    }
    
    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEm() {
        
        if ($this->em == NULL) {
            $this->em = $this->getServiceLocator()
                             ->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
}
