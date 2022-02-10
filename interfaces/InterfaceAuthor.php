<?php

namespace app\interfaces;

use app\models\Post;

interface InterfaceAuthor{
    function getName():string;
    function create(Post $post):bool;
    function update(Post $post):bool;
}
