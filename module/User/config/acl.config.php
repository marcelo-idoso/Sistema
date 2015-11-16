<?php
return array(
    'acl' => array(
        'roles' => array(
            'guest'     => NULL ,
            'member'    => 'guest'
        ),
        'resources' => array(
            'allow' => array(
                'application' => array(
                    'login' => 'guest',
                    'all'   => 'member'
                ),
            ),
        ),
    ),
);
