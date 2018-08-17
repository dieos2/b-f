<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property string $preco
 * @property string $preco_custo
 * @property string $preco_distribuidor
 * @property int $qtd
 * @property int $lucro
 * @property int $id_fabricante
 * @property int $id_user
 * @property int $NCM
 * @property int $id_grupo
 *
 * @property User $user
 * @property Fabricante $fabricante
 * @property Grupo $grupo
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
            [['nome', 'preco', 'preco_custo', 'preco_distribuidor', 'qtd', 'lucro', 'id_fabricante', 'id_user', 'id_grupo'], 'required'],
            [['preco', 'preco_custo', 'preco_distribuidor'], 'number'],
            [['qtd', 'lucro', 'id_fabricante', 'id_user', 'NCM', 'id_grupo'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_fabricante'], 'exist', 'skipOnError' => true, 'targetClass' => Fabricante::className(), 'targetAttribute' => ['id_fabricante' => 'id']],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['id_grupo' => 'id']],
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
            'preco' => 'Preco',
            'preco_custo' => 'Preco Custo',
            'preco_distribuidor' => 'Preco Distribuidor',
            'qtd' => 'Qtd',
            'lucro' => 'Lucro',
            'id_fabricante' => 'Id Fabricante',
            'id_user' => 'Id User',
            'NCM' => 'Ncm',
            'id_grupo' => 'Id Grupo',
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
    public function getFabricante()
    {
        return $this->hasOne(Fabricante::className(), ['id' => 'id_fabricante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['id' => 'id_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaProdutos()
    {
        return $this->hasMany(VendaProduto::className(), ['id_produto' => 'id']);
    }
}
