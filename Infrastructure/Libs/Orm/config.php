<?php
require_once 'php-activerecord/ActiveRecord.php';

$cfg = ActiveRecord\Config::instance();

$cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Infrastructure/Database/Entities");
$cfg->set_connections(array(
    'development' => 'mysql://root:@localhost/dbcrudweb?charset=utf8mb4'
));
$cfg->set_default_connection('development');
