<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property integer $id
 * @property string $valor
 * @property string $data
 * @property integer $id_cliente
 * @property integer $id_caixa
 *
 * @property Cliente $idCliente
 * @property Caixa $idCaixa
 * @property VendaProduto[] $vendaProdutos
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor', 'data', 'id_cliente'], 'required'],
            [['valor'], 'number'],
            [['data'], 'safe'],
            [['id_cliente', 'id_caixa'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
            [['id_caixa'], 'exist', 'skipOnError' => true, 'targetClass' => Caixa::className(), 'targetAttribute' => ['id_caixa' => 'id']],
            [['id_vendaTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVenda::className(), 'targetAttribute' => ['id_vendaTipo' => 'id']],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valor' => 'Valor',
            'data' => 'Data',
            'id_cliente' => 'Id Cliente',
            'id_caixa' => 'Id Caixa',
            'id_vendaTipo' => 'Id VendaTipo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaixa()
    {
        return $this->hasOne(Caixa::className(), ['id' => 'id_caixa']);
    }
/**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVendaTipo()
    {
        return $this->hasOne(TipoVenda::className(), ['id' => 'id_vendaTipo']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaProdutos()
    {
        return $this->hasMany(VendaProduto::className(), ['id_venda' => 'id']);
    }
      public function getProdutos()
    {  
          return $this->hasMany(Produto::className(), ['id' => 'id_produto'])->viaTable('venda_produto',['id_venda' => 'id'])->all();
//          return $this->hasMany(Inquilino::className(), ['id' => 'id_inquilino'])->viaTable('contrato_inquilino', ['id_contrato' => 'id']);
         
    }
     
    
      public function getTotalVenda()
    {  
          $total = 0;
          $produtos = $this->hasMany(Produto::className(), ['id' => 'id_produto'])->viaTable('venda_produto',['id_venda' => 'id']);
         $total= $produtos->sum('preco');
          return $total;
         
    }
}
