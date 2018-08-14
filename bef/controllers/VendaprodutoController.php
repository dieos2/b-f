<?php

namespace app\controllers;

use Yii;
use app\models\vendaProduto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * VendaProdutoController implements the CRUD actions for vendaProduto model.
 */
class VendaprodutoController extends Controller
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
     * Lists all vendaProduto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => vendaProduto::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single vendaProduto model.
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
     * Creates a new vendaProduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idProduto, $idVenda)
    {   Yii::$app->response->format = Response::FORMAT_JSON;
        $modelProduto = \app\models\Produto::findOne($idProduto);
        $model = new vendaProduto();
        $model->id_produto = $idProduto;
        $model->id_venda = $idVenda;
        $model->valor = $modelProduto->preco;
        $modelProdutoCadastrado = vendaProduto::find()->where(['=', 'id_produto', $idProduto])->andWhere(['=', 'id_venda', $idVenda])->one();
        if($modelProdutoCadastrado == null){
        
        if ($model->save()) {
            $modelVenda = \app\models\Venda::findOne($idVenda);
            $modelVenda->valor = $modelVenda->totalVenda;
            $modelVenda->save();
             return $modelProduto;
        }
        
        }
       return "já existe";
    }
 public function actionRemove($idProduto, $idVenda)
    {
     $modelProdutoCadastrado = vendaProduto::find()->where(['=', 'id_produto', $idProduto])->andWhere(['=', 'id_venda', $idVenda])->one();
      $this->findModel($modelProdutoCadastrado->id)->delete();
       $modelVenda = \app\models\Venda::findOne($idVenda);
            $modelVenda->valor = $modelVenda->totalVenda;
            $modelVenda->save();
 }
    /**
     * Updates an existing vendaProduto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
     * Deletes an existing vendaProduto model.
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
     * Finds the vendaProduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return vendaProduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = vendaProduto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
