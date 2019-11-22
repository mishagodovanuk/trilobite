<?php
namespace User\Model;

use Core\App\Model\AbstractModel;
use Core\App\Model\ModelInterface;

class Main extends AbstractModel implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTableName()
    {
        return 'main';
    }
}
