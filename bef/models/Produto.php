<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $preco
 * @property string $data
 * @property int $id_user
 * @property string $preco_custo
 * @property int $id_categoria
 * @property int $NCM
 * @property int $qtd
 * @property string $distribuidor
 * @property string $lucro
 *
 * @property User $user
 * @property Categoria $categoria
 * @property VendaProduto[] $vendaProdutos
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'preco', 'data', 'id_user', 'preco_custo', 'id_categoria'], 'required'],
            [['preco', 'preco_custo', 'distribuidor', 'lucro'], 'number'],
            [['data'], 'safe'],
            [['id_user', 'id_categoria', 'NCM', 'qtd'], 'integer'],
            [['nome'], 'string', 'max' => 150],
            [['descricao'], 'string', 'max' => 500],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'data' => 'Data',
            'id_user' => 'Id User',
            'preco_custo' => 'Preco Custo',
            'id_categoria' => 'Id Categoria',
            'NCM' => 'Ncm',
            'qtd' => 'Qtd',
            'distribuidor' => 'Distribuidor',
            'lucro' => 'Lucro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaProdutos()
    {
        return $this->hasMany(VendaProduto::className(), ['id_produto' => 'id']);
    }
}
