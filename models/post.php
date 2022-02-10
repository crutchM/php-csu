<?php
namespace app\models;

use yii\base\Model;

class Post extends Model{
    public $body;
    public $head;
    public $createDate;
    public $author;
    public $status;
    public const STATUS_PUBLISHED = 1;
    public const STATUS_UNPUBLISHED = 2;

    public function rules()
    {
        return [
            [['body'], 'string', 'max' => 4096],
            [['head'], 'string', 'max' => 100],
            [['createDate'], 'safe'],
            [['author'], 'safe'],
            [['status'], 'range', 'in' => [self::STATUS_PUBLISHED, self::STATUS_UNPUBLISHED]]                
        ];
    }
}