<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "queue".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $user_id
 * @property string $reg_date
 */
class Queue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'user_id'], 'required'],
            [['book_id', 'user_id'], 'integer'],
            [['reg_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'user_id' => 'User ID',
            'reg_date' => 'Reg Date',
        ];
    }
}
