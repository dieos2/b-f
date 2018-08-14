<?php

namespace app\controllers;

use Yii;
use app\models\venda;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendaController implements the CRUD actions for venda model.
 */
class VendaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all venda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => venda::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single venda model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new venda();
        $model->id_caixa = $id;
        $model->id_cliente = 1;
        $model->valor = 0;
        $model->data = date("Y-m-d H:i:s");   
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionRemove($idVenda)
    {
     $modelProdutos = \app\models\VendaProduto::find()->where(['=', 'id_venda', $idVenda])->all();
     foreach ($modelProdutos as $produto){
         \app\models\VendaProduto::findOne($produto->id)->delete();
     }
       $modelVenda = \app\models\Venda::findOne($idVenda)->delete();
            
 }
public function actionFechamento($idVenda, $idVendaTipo)
    {
        $model = $this->findModel($idVenda);
        $model->id_vendaTipo = $idVendaTipo;
        foreach ($model->Produtos as $produto) 
        {
            $modelProduto = \app\models\Produto::findOne($produto->id);
            $modelProduto->vendido = 0;
            $modelProduto->save();
        }
        $model->save();
        
        $modelCaixa = \app\models\Caixa::findOne($model->id_caixa);
        $modelCaixa->valor_fechamento = $modelCaixa->TotalVendasFechada;
        $modelCaixa->save();
            return $model->id_caixa;
       
    }
    public function actionQrcode($id)
    {
     return $this->render('qrcode', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing venda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = venda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
