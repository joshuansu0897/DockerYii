<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contenido".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $id_subArea
 *
 * @property SubArea $idSubArea
 */
class Contenido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contenido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'id_subArea'], 'required'],
            [['descripcion'], 'string'],
            [['id_subArea'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['id_subArea'], 'exist', 'skipOnError' => true, 'targetClass' => SubArea::className(), 'targetAttribute' => ['id_subArea' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id_subArea' => 'Id Sub Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubArea()
    {
        return $this->hasOne(SubArea::className(), ['id' => 'id_subArea']);
    }
}
