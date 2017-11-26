<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $id_museo
 *
 * @property Museo $idMuseo
 * @property SubArea[] $subAreas
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'id_museo'], 'required'],
            [['descripcion'], 'string'],
            [['id_museo'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['id_museo'], 'exist', 'skipOnError' => true, 'targetClass' => Museo::className(), 'targetAttribute' => ['id_museo' => 'id']],
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
            'id_museo' => 'Id Museo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMuseo()
    {
        return $this->hasOne(Museo::className(), ['id' => 'id_museo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubAreas()
    {
        return $this->hasMany(SubArea::className(), ['id_area' => 'id']);
    }
}
