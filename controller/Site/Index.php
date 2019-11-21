<?php

namespace User\Controller\Site;

use Core\App\Controller\AbstractAction;

/**
 * Class Index
 *
 * @package User\Controller\Site
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
        $this->getView()->setTitle('Site page');

        return $this->render('index');
    }
}
