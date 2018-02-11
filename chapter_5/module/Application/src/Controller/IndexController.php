<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\UsersTable;

class IndexController extends AbstractActionController
{
    private $usersTable = null;
    
    public function __construct(UsersTable $usersTable)
    {
         $this->usersTable = $usersTable;
    }

    public function indexAction()
    {
        $view = new ViewModel();
        $model = $this->usersTable;
        $row = $model->getById(1);
        
        $view->setVariable('id', $row->getId());
        $view->setVariable('username', $row->getUsername());
        $view->setVariable('password', $row->getPassword());
        
        return $view;
    }
}
