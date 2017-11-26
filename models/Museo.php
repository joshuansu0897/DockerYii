<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "museo".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_direccion
 * @property string $descripcion
 *
 * @property Area[] $areas
 */
class Museo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'museo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_direccion', 'descripcion'], 'required'],
            [['id_direccion'], 'integer'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
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
            'id_direccion' => 'Id Direccion',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['id_museo' => 'id']);
    }
}
