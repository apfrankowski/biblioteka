<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "rents".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $user_id
 * @property string $rent_date
 * @property string $prev_date
 * @property integer $status
 */
class Rents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'user_id'], 'required'],
            [['book_id', 'user_id', 'status'], 'integer'],
            [['user_id', 'book_id', 'rent_date', 'prev_date'], 'safe']
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
            'rent_date' => 'Rent Date',
            'prev_date' => 'Prev Date',
            'status' => 'Status',
        ];
    }
    /**
     * Connects model with books
     * @return mixed
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['id' => 'book_id']);
    }
    /**
     * Connects model with users
     * @return mixed
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
