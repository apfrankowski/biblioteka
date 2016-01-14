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
     * @var UploadedFile
     */
    public $imageFile;

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
            [['title', 'author', 'isbn'], 'required'],
            [['title', 'author', 'isbn', 'status'], 'string', 'max' => 255],
            [['img'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'isbn' => 'Isbn',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'img' => 'Miniatura'
        ];
    }
}
