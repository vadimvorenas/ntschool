<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 06.08.2018
 * Time: 18:01
 */

namespace Blog\Model;


interface BaseModelInterface
{
    public function getAllArticles();

    public function getByArticle(int $id);

    public function deletedArticle(int $id);
}