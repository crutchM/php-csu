<?php

namespace app\modules\patch\model;

use app\interfaces\InterfaceAuthor;
use app\models\Post;
use app\models\User;
use JetBrains\PhpStorm\Pure;
use yii\base\Model;

class PostForm extends Model {

    public InterfaceAuthor $author;
    public string $body;
    public string $head;
    public string $dateCreate;
    public int $status;
    public User $user;

    private function createPost():Post{
        return new Post([
            'body'=>$this->body,
            'head'=>$this->head,
            'createDate'=>$this->dateCreate,
            'author'=>$this->author,
            'status'=>$this->status]);
    }
    function rules(): array
    {
        return [
            [['author'], 'safe'],
            [['status'], 'range', 'in'=>[Post::STATUS_PUBLISHED, Post::STATUS_UNPUBLISHED]],
            [['body'], 'string', 'max' => 4096],
            [['head'], 'string', 'max' => 100],
            [['createDate'], 'safe'],
            [['user'], 'safe']
        ];
    }

    function save():bool{
        return $this->user->create($this->createPost());
    }

    function publish():bool{
        return $this->user->Publish($this->createPost());
    }

    function unpublish():bool{
        return $this->user->Unpublish($this->createPost());
    }
}