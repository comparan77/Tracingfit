<?php

class AsistenciaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			//array('allow',  // allow all users to perform 'index' and 'view' actions
			//	'actions'=>array('index','view'),
			//	'users'=>array('*'),
			//),
			//array('allow', // allow authenticated user to perform 'create' and 'update' actions
			//	'actions'=>array('create','update'),
			//	'users'=>array('@'),
			//),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete','deleteAjax'),
				'roles'=>array('super'),
			),
			array('allow', // allow admin user to call some methods
				'actions'=>array('AjaxComplete','PartUpdate'),
				'roles'=>array('super'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Asistencia;
		$model->with('alumno');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Asistencia']))
		{
			$model->attributes=$_POST['Asistencia'];
			if($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
                {
                    echo CJSON::encode($model);
                    exit;               
                }
                else
					$this->redirect(array('view','id'=>$model->id));
			}
		}
		if (Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode(array(
                'status'=>'failure', 
                //'div'=>$this->renderPartial('_form', array('model'=>$model), true)
			));
            exit;               
        }
        else
			$this->render('create',array('model'=>$model,));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Asistencia']))
		{
			$model->attributes=$_POST['Asistencia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Deletes ajax model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteAjax($id)
	{
		
		$this->loadModel($id)->delete();
		if (Yii::app()->request->isAjaxRequest)	{
            echo CJSON::encode(array(
            	'status'=>'success', 
                'div'=>"Classroom successfully added"
                ));
        	exit;               
        }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax']))
		//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->with=array('alumno','horario');
		$dataProvider=new CActiveDataProvider('Asistencia', array(
			'criteria'=>$criteria,
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Asistencia('search');
		//$model->with('alumno','horario');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Asistencia']))
			$model->attributes=$_GET['Asistencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Asistencia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Asistencia::model()->findByPk($id)->with('alumno','horario');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Asistencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='asistencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxComplete()
	{
		if (!YII_DEBUG && !Yii::app()->request->isAjaxRequest) {
			throw new CHttpException('403', 'Forbidden access.');
		}
		if (empty($_GET['term'])) {
			throw new CHttpException('404', 'Missing "term" GET parameter.');
		}
		$term = $_GET['term'];
		$filters = empty($_GET['exclude']) ? null : (int) $_GET['exclude'];
		header('content-type: application/json; charset="UTF-8"');
		echo json_encode(Alumno::completeTerm($term, $filters));
		Yii::app()->end();
	}

	public function actionPartUpdate($id_horario = null, $fecha_sel = null) {

		if (!YII_DEBUG && !Yii::app()->request->isAjaxRequest) {
			throw new CHttpException('403', 'Forbidden access.');
		}

		$model=new Asistencia;

		$data = $model->searchBy($id_horario, $fecha_sel);		

        if ($data === null)
            throw new CHttpException(404, 'The requested page does not exist.');
 
        $this->renderPartial('_alumnoHorario', array('data'=>$data));
        //$this->renderPartial('_alumnoHorario', $data);
        Yii::app()->end();
	}
}
