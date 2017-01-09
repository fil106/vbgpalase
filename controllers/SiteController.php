<?php

namespace app\controllers;

use app\models\film;
use app\models\sessions;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->request->isAjax) {
            $films = film::find()->innerJoinWith('sessions')->where('sessions.date="' . $_GET['date'] . '"')->all();

            foreach ($films as $film) {
                $str .= '
                    <div class="row flm">
                        <div class="col-md-4 col-xs-4">
                            <!--<div class="raiting">7.3</div>-->
                            <div class="left">
                                <div class="img">
                                    <img src="' . $film['picture'] . '">
                                    <a href="' . $film['trailer'] . '" class="tr"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-8">
                            <div class="right">
                                <h3>' . $film['title'] . '</h3>
                                <span class="genre">' . $film['genre'] . '</span>
                                <img alt="Продолжительность" class="time" src="img/ico-time.png"><span class="dur"> - ' . $film['duration'] . ' мин</span>
                                <ul class="stars">
                                    <li><a href="#"><img src="img/star.png"></a></li>
                                    <li><a href="#"><img src="img/star.png"></a></li>
                                    <li><a href="#"><img src="img/star.png"></a></li>
                                    <li><a href="#"><img src="img/star.png"></a></li>
                                    <li><a href="#"><img src="img/star-gray.png"></a></li>
                                </ul>
                                <div class="s-time">
                                    <div class="row">';
                                    $sessions = $film->sessions;
                                    foreach ($sessions as $session) {
                                        $str .= '<div class="session-date col-md-4 col-xs-4" date="' . $session['date'] . '">
                                                                    <ul class="timeline">
                                                                        <li class="start">' . date('H:i', strtotime($session['time'])) . '</li>
                                                                        <li class="2d">250р<img src="img/2d.png" alt="Формат 2D"></li>
                                                                        <li class="3d"></li>
                                                                        <li class="vip">750р<img src="img/vip.png" alt="VIP ложа"></li>
                                                                    </ul>
                                                                </div>';
                                    }
                                    $str .= '</div>
                                                    </div>
                                                    <div class="s-btns">
                                                        <a class="about" href="#"><img src="img/lenta.png">о фильме</a><a class="buy" href="#"><img src="img/ticket.png">заказать билет</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
            }
            return $str;
        }

        $films = film::find()->innerJoinWith('sessions')->where('sessions.date="' . date('Y-m-d') . '"')->all();
//
        $filmsNosessions = film::find()->leftJoin('sessions', 'film.id=sessions.idFilm')->where('idFilm is NULL')->all();
//
        return $this->render('index', compact('films', 'filmsNosessions'));

//        print_r($films);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionViewer()
    {
        return $this->render('viewer');
    }
}

function rus_date() {
// Перевод
    $translate = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "Понедельник",
        "Mon" => "Пн",
        "Tuesday" => "Вторник",
        "Tue" => "Вт",
        "Wednesday" => "Среда",
        "Wed" => "Ср",
        "Thursday" => "Четверг",
        "Thu" => "Чт",
        "Friday" => "Пятница",
        "Fri" => "Пт",
        "Saturday" => "Суббота",
        "Sat" => "Сб",
        "Sunday" => "Воскресенье",
        "Sun" => "Вс",
        "January" => "Январь",
        "Jan" => "Янв",
        "February" => "Февраль",
        "Feb" => "Фев",
        "March" => "Март",
        "Mar" => "Мар",
        "April" => "Апрель",
        "Apr" => "Апр",
        "May" => "Мая",
        "May" => "Мая",
        "June" => "Июнь",
        "Jun" => "Июн",
        "July" => "Июль",
        "Jul" => "Июл",
        "August" => "Август",
        "Aug" => "Авг",
        "September" => "Сентябрь",
        "Sep" => "Сен",
        "October" => "Октябрь",
        "Oct" => "Окт",
        "November" => "Ноябрь",
        "Nov" => "Ноя",
        "December" => "Декабрь",
        "Dec" => "Дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое"
    );
    // если передали дату, то переводим ее
    if (func_num_args() > 1) {
        $timestamp = func_get_arg(1);
        return strtr(date(func_get_arg(0), $timestamp), $translate);
    } else {
// иначе текущую дату
        return strtr(date(func_get_arg(0)), $translate);
    }
}