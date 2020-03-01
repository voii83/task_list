<?php

return [
    'admin/login' => 'admin/login',
    'admin/logout' => 'admin/logout',
    'edit/([0-9]+)' => 'index/edit/$1',
    '([a-z]+)/page-([0-9]+)' => 'index/index/$1/$2',
    'page-([0-9]+)' => 'index/index/text/$1',
    '([a-z]+)' => 'index/index/$1/1',
    '' => 'index/index',
    '([a-zA-Z0-9]+)' => 'error/404'
];