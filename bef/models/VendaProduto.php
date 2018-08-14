<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda_produto".
 *
 * @property integer $id
 * @property integer $id_produto
 * @property string $valor
 * @property integer $id_venda
 *
 * @property Venda $idVenda
 * @property Produto $idProduto
 */
class VendaProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venda_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produto', 'valor', 'id_venda'], 'required'],
            [['id_produto', 'id_venda'], 'integer'],
            [['valor'], 'number'],
            [['id_venda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['id_venda' => 'id']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produto' => 'Id Produto',
            'valor' => 'Valor',
            'id_venda' => 'Id Venda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVenda()
    {
        return $this->hasOne(Venda::className(), ['id' => 'id_venda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'id_produto']);
    }
}
