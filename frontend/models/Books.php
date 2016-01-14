<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $isbn
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'isbn', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'author', 'isbn'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tytuł',
            'author' => 'Autor',
            'isbn' => 'Isbn',
            'status' => 'Status',
            'created_at' => 'Utworzona',
            'updated_at' => 'Zaktualizowana',
        ];
    }

    public function updateStatus($status) 
    {
        $this->status = $status;
        $this->save();
    }
}
