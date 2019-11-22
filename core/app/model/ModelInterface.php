<?php

namespace Core\App\Model;

interface ModelInterface
{
    /**
     * Constructor must run parent::__construct().
     *
     * ModelInterface constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function getTableName();
}
