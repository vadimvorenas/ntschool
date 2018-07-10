<?php


require_once '../autoload.class.php';

$service = new \Conf\Service\CreateUserService();
$controller = new \Conf\Controller\UserController($service);

echo $uuid = (\Ramsey\Uuid\Uuid::uuid4())->toString();