<?php

class TwitterController extends Controller {
    
    public  $amount = 10;
    public $page = 0;
    public function actionNews()
    {
        $this->render('news',array('tweets'=>$this->getTweets()));
        
    }
    
    public function actionGetDataByAjax()
    {
        print_r($_REQUEST);die;
        $this->page = $_REQUEST['draw'];
        $data = $this->getTweets($_REQUEST['draw']['value']);
    }

    public function getTweets($search=""){
        $t = Yii::app()->twitter->getTwitterTokened(Yii::app()->session['token']['oauth_token'], Yii::app()->session['token']['oauth_token_secret']);
        $r= $t->get('search/tweets', array("q" => "%".$search."%","lang"=>'es','since_id'=>  $this->page ,'count'=>$this->amount));
        return $r;
    }
    public function actionTwitterCallBack() {

        /* If the oauth_token is old redirect to the connect page. */
        if (isset($_REQUEST['oauth_token']) && Yii::app()->session['oauth_token'] !== $_REQUEST['oauth_token']) {
            Yii::app()->session['oauth_status'] = 'oldtoken';
        }

        /* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
        $twitter = Yii::app()->twitter->getTwitterTokened(Yii::app()->session['oauth_token'], Yii::app()->session['oauth_token_secret']);

        /* Request access tokens from twitter */
        $access_token = $twitter->getAccessToken($_REQUEST['oauth_verifier']);

        /* Save the access tokens. Normally these would be saved in a database for future use. */
        Yii::app()->session['token'] = $access_token;

        /* Remove no longer needed request tokens */
//        unset(Yii::app()->session['oauth_token']);
//        unset(Yii::app()->session['oauth_token_secret']);
           
        if (200 == $twitter->http_code) {
            /* The user has been verified and the access tokens can be saved for future use */
            Yii::app()->session['status'] = 'verified';

            //get an access twitter object
            $twitter = Yii::app()->twitter->getTwitterTokened($access_token['oauth_token'], $access_token['oauth_token_secret']);
            //get user details
//            $twuser = $twitter->get("account/verify_credentials");
//            print_r($twuser);
            //get friends ids
//            $friends = $twitter->get("friends/ids");
            //get followers ids
//            $followers = $twitter->get("followers/ids");
            //tweet
//            $t = $twitter->get('search/tweets', array("q" => "%ideas","lang"=>'es','screen_name'=>'yoriento'));
//            $t = $twitter->get('statuses/user_timeline', array("q" => "%ideas","lang"=>'es','screen_name'=>'yoriento','count'=>2));
//            echo "<pre>";
//            print_r($t);
            $this->redirect(Yii::app()->createAbsoluteUrl('twitter/news'));
        } else {
            /* Save HTTP status for error dialog on connnect page. */
            //header('Location: /clearsessions.php');
            $this->redirect(Yii::app()->homeUrl);
        }
//        $this->render('TwitterCallBack');
    }

    public function actionIndex() {
        $twitter = Yii::app()->twitter->getTwitter();
        $request_token = $twitter->getRequestToken();

        //set some session info
        Yii::app()->session['oauth_token'] = $token = $request_token['oauth_token'];
        Yii::app()->session['oauth_token_secret'] = $request_token['oauth_token_secret'];

        if ($twitter->http_code == 200) {
            //get twitter connect url
            $url = $twitter->getAuthorizeURL($token);
            //send them
            $this->redirect($url);
        } else {
            //error here
            $this->redirect(Yii::app()->homeUrl);
        }
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
