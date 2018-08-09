<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 07.08.2018
 * Time: 23:40
 */

namespace Blog\scr\model\Users;


interface SystemModelUserInterface
{
    public function encodeHashPassword(string $password);

    public function decodeHashPassword(string $password, string $hash);
}