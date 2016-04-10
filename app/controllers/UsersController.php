<?php

class UsersController extends \RestResourceController {
    
    public function __construct()
    {
        $this->resourceModel = 'User';
    }

}
