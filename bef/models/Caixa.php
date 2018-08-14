<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caixa".
 *
 * @property integer $id
 * @property string $data_abertura
 * @property string $valor_abertura
 * @property string $data_fechamento
 * @property string $valor_fechamento
 *
 * @property Venda[] $vendas
 */
class Caixa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caixa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_abertura'], 'required'],
            [['data_abertura', 'data_fechamento', 'data_fechamento'], 'safe'],
            [['valor_abertura', 'valor_fechamento'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_abertura' => 'Data Abertura',
            'valor_abertura' => 'Valor Abertura',
            'data_fechamento' => 'Data Fechamento',
            'valor_fechamento' => 'Valor Fechamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['id_caixa' => 'id']);
    }
      public function getTempoAberto()
    {
          $data2 = new \DateTime(date("Y-m-d H:i:s"));
          $data = new \DateTime($this->data_abertura);
        return $data->diff($data2);
    }
     public function getNumeroVendas()
    {
        return $this->hasMany(Venda::className(), ['id_caixa' => 'id'])->count();
    }
     public function getTotalVendas()
    {  
         $vendas = 0;
         foreach($this->hasMany(Venda::className(), ['id_caixa' => 'id'])->all() as $venda){
        $vendas = $vendas + $venda->valor;
    }
        return $vendas;
    }
     public function getTotalVendasFechada()
    {  
         $vendas = 0;
         foreach($this->hasMany(Venda::className(), ['id_caixa' => 'id'])->all() as $venda){
        if($venda->id_vendaTipo){
             $vendas = $vendas + $venda->valor;
        }
    }
        return $vendas;
    }
}
