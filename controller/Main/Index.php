<?php

namespace User\Controller\Main;

use Core\App\Controller\AbstractAction;

/**
 * Class Index
 *
 * @package User\Controller\Main
 */
class Index extends AbstractAction
{
    /**
     * Index constructor.
     *
     * Required.
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
    }

    /**
     * Index action.
     *
     * @return \Core\App\View\View
     */
    public function execute()
    {
        $this->getView()->setTitle('Main page');

        return $this->render('index');
    }
}
