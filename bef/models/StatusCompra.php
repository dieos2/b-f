<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_compra".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Compra[] $compras
 */
class StatusCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id_status' => 'id']);
    }
}
