<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tamanho".
 *
 * @property int $id
 * @property string $nome
 * @property int $id_categoria
 *
 * @property Produto[] $produtos
 * @property Categoria $categoria
 */
class Tamanho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tamanho';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'id_categoria'], 'required'],
            [['id_categoria'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
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
            'id_categoria' => 'Id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_tamanho' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
