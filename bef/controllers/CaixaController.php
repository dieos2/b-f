<?php

namespace app\controllers;

use Yii;
use app\models\Caixa;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaixaController implements the CRUD actions for Caixa model.
 */
class CaixaController extends Controller
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
     * Lists all Caixa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Caixa::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
 public function actionFecha($idCaixa)
    {
      $model = $this->findModel($idCaixa);
      $model->data_fechamento = date("Y-m-d H:i:s");
      $modelVenda = \app\models\Venda::find()->where(["=", "id_caixa", $model->id])->all();
      foreach ($modelVenda as $venda){
          if(!$venda->id_vendaTipo){
          $produtos = \app\models\VendaProduto::find()->where(["=","id_venda",$venda->id])->all();
          foreach ($produtos as $produto){
              $produto->delete();
          }
          $venda->delete();
          }
      }
      $model->valor_fechamento = $model->totalVendasFechada;
      $model->save();
      return "Caixs Fechado";
    }
    /**
     * Displays a single Caixa model.
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
     * Creates a new Caixa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Caixa();

        if ($model->load(Yii::$app->request->post())) {
             $model->data_abertura = date("Y-m-d H:i:s");  
            if ($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }else{
                 return $this->render('create', [
                'model' => $model,
            ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Caixa model.
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
     * Deletes an existing Caixa model.
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
     * Finds the Caixa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Caixa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Caixa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
