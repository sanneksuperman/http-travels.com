<?php
namespace app\controllers;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;
class AuthController extends Controller{



  public function actionLogin()
  {
      if (!Yii::$app->user->isGuest) {
          return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->login()) {
          return $this->goBack();
      }

      $model->password = '';
      return $this->render('login', [
          'model' => $model,
      ]);
  }

  /**
   * Logout action.
   *
   * @return Response
   */
  public function actionLogout()
  {
      Yii::$app->user->logout();

      return $this->goHome();
  }


  public function actionSignup()
  {
    $model = new SignupForm();

    if(Yii::$app->request->isPost)
    {
      $model->load(Yii::$app->request->post());
      if($model->signup())
      {
        return $this->redirect(['auth/login']);
      }
    }
    return $this->render('signup', ['model' => $model]);
  }

  public function actionLoginVK($uid, $first_name, $photo)
  {
    $user = new User();
        if($user->saveFromVk($uid, $first_name, $photo))
        {
            return $this->redirect(['site/index']);
        }
  }

  public function actionTest()
  {
      $user = User::findOne(1);
      //Yii::$app->user->login($user);
      // var_dump();
      Yii::$app->user->logout($user);
      if(Yii::$app->user->isGuest)
      {
        echo "User is gost";
      }
      else
      {
        echo "User is avtorizovan";
      }
  }

}
