<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "poster".
 *
 * @property int $id_poster
 * @property string $name
 * @property int $ticket
 *
 * @property Order $poster
 */
class Poster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ticket'], 'required'],
            [['ticket'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_poster'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['id_poster' => 'id_poster']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_poster' => 'Id Poster',
            'name' => 'Наименование',
            'ticket' => 'Билеты',
        ];
    }

    /**
     * Gets query for [[Poster]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoster()
    {
        return $this->hasOne(Order::class, ['id_poster' => 'id_poster']);
    }
}
