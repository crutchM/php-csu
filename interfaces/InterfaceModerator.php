<?php

namespace app\interfaces;

use app\models\Post;

interface InterfaceModerator{
    function Publish(Post $post):bool;
    function Unpublish(Post $post):bool;
}
