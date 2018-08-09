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
    public function encodeHash(string $string);

    public function decodeHash(string $string, string $hash);
}