<?php
namespace app\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

class Article extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'article';
    }

    public function rules()
    {
        return [
            [['title', 'slug', 'body'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'slug'], 'string', 'max'=>1024],
            [['created_by'], 'exist', 'skipOnError'=>true, 'targetClass' => User::className(), 'targetAttribute'=> ['created_by'=>'id']],
            [['updated_by'], 'exist', 'skipOnError'=> true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ],
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title'
            ]
        ];
    }

    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}