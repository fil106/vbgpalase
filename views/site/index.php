<?php
$this->title = 'Главная';

use app\components\slider;
?>

<?php echo slider::widget(); ?>

<section class="content">
    <header>
        <div class="container">
            <h3>Скоро в нашем кинотеатре</h3>
<!--            <div class="btns">-->
<!--                <a class="slider-films b-active">сегодня</a>-->
<!--                <a class="slider-films">завтра</a>-->
<!--                <a class="slider-films">скоро</a>-->
<!--            </div>-->
        </div>
    </header>

    <div class="container">
        <div class="hidden-xs">
            <div class="f-slider">
                <div class="carousel">
                    <?php
                        foreach ($filmsNosessions as $filmsNosession) {
                            echo "<div class='poster'>
                                    <a class='hov-poster' href='#'>
                                        <img class='poster-img' src='" . $filmsNosession['picture'] . "'>
                                        <span class='film-cap'>" . $filmsNosession['genre'] . "</span>
                                        <span class='film-name'>" . $filmsNosession['title'] . "</span>
                                    </a>                          
                                </div>";
                        }?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="dateline">
                    <ul>
                        <a class="get-date d-active" date="<?= date('Y-m-d',(time()+3600*24*$i)) ?>"><li><span class="month"><?= \app\controllers\rus_date('F') ?></span><span class="date"><?= date('d') ?></span><span class="dayweek"><?= \app\controllers\rus_date('l') ?></span></li></a>
                        <?php
                            for($i=1;$i<=6;$i++) {
                                echo '<a class="get-date" date="' . date('Y-m-d', (time()+3600*24*$i)) . '"><li><span class="date">' . date("d", (time()+3600*24*$i)) . '</span><span class="dayweek">' . \app\controllers\rus_date("l", (time()+3600*24*$i)) . '</span></li></a>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="schedule">
                    <div class="filter">
                        <a href="#" class="btn-filter active-filter">Все сеансы</a>
                        <a href="#" class="btn-filter">2D</a>
                        <a href="#" class="btn-filter">3D</a>
                    </div>
                    <div class="sessions scrollbar-light">
                        <div class="row">
                            <div class="sesFilms col-md-12">
                            <?php
                                foreach ($films as $film) {
                                    echo '
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
                                                                echo '<div class="session-date col-md-4 col-xs-4" date="' . $session['date'] . '">
                                                                    <ul class="timeline">
                                                                        <li class="start">' . date('H:i', strtotime($session['time'])) . '</li>
                                                                        <li class="2d">250р<img src="img/2d.png" alt="Формат 2D"></li>
                                                                        <li class="3d"></li>
                                                                        <li class="vip">750р<img src="img/vip.png" alt="VIP ложа"></li>
                                                                    </ul>
                                                                </div>';
                                                            }
                                                    echo '</div>
                                                    </div>
                                                    <div class="s-btns">
                                                        <a class="about" href="#"><img src="img/lenta.png">о фильме</a><a class="buy" href="#"><img src="img/ticket.png">заказать билет</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="events hidden-sm hidden-xs">
                    <div class="e-title">
                        <h3>События в кинотеатре</h3>
                        <div class="post">
                            <div class="add">
                                <img src="img/calendar.png"><span class="p-time">10.08.2016</span>
                                <img src="img/time.png"><span>13:20</span>
                            </div>
                            <a class="p-link-content" href="#">
                                <section class="p-content">
                                    <h3>Выборг снова откроет фестиваль "Окно в Европу"</h3>
                                    <img class="p-img" src="img/p1.png">
                                    <p class="p-text">С 7 по 13 августа в Выборге пройдет XXII фестиваль российского кино «Окно в Европу».
                                        Торжественная церемония открытия состоится 7 августа в 19.00 в кинотеатре «Выборг Палас», планируется участие главы 47-го региона.</p>
                                </section>
                            </a>
                        </div>
                        <div class="post">
                            <div class="add">
                                <img src="img/calendar.png"><span class="p-time">10.08.2016</span>
                                <img src="img/time.png"><span>13:20</span>
                            </div>
                            <a class="p-link-content" href="#">
                                <section class="p-content">
                                    <h3>Выборг снова откроет фестиваль "Окно в Европу"</h3>
                                    <img class="p-img" src="img/p1.png">
                                    <p class="p-text">С 7 по 13 августа в Выборге пройдет XXII фестиваль российского кино «Окно в Европу».
                                        Торжественная церемония открытия состоится 7 августа в 19.00 в кинотеатре «Выборг Палас», планируется участие главы 47-го региона.</p>
                                </section>
                            </a>
                        </div>
                        <div class="post">
                            <div class="add">
                                <img src="img/calendar.png"><span class="p-time">10.08.2016</span>
                                <img src="img/time.png"><span>13:20</span>
                            </div>
                            <a class="p-link-content" href="#">
                                <section class="p-content">
                                    <h3>Выборг снова откроет фестиваль "Окно в Европу"</h3>
                                    <img class="p-img" src="img/p1.png">
                                    <p class="p-text">С 7 по 13 августа в Выборге пройдет XXII фестиваль российского кино «Окно в Европу».
                                        Торжественная церемония открытия состоится 7 августа в 19.00 в кинотеатре «Выборг Палас», планируется участие главы 47-го региона.</p>
                                </section>
                            </a>
                        </div>
                        <div class="post">
                            <div class="add">
                                <img src="img/calendar.png"><span class="p-time">10.08.2016</span>
                                <img src="img/time.png"><span>13:20</span>
                            </div>
                            <a class="p-link-content" href="#">
                                <section class="p-content">
                                    <h3>Выборг снова откроет фестиваль "Окно в Европу"</h3>
                                    <img class="p-img" src="img/p1.png">
                                    <p class="p-text">С 7 по 13 августа в Выборге пройдет XXII фестиваль российского кино «Окно в Европу».
                                        Торжественная церемония открытия состоится 7 августа в 19.00 в кинотеатре «Выборг Палас», планируется участие главы 47-го региона.</p>
                                </section>
                            </a>
                        </div>
                    </div>
                    <div class="e-pagination">
                        <ul>
                            <a href="#"><li class="e-active">1</li></a>
                            <a href="#"><li>2</li></a>
                            <a href="#"><li>3</li></a>
                            <a href="#"><li>4</li></a>
                            <a href="#"><li>5</li></a>
                            <a href="#"><li>6</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="feedback">
                    <div class="contacts">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="c-title">Мы находимся по адресу<img src="img/metka.png"></h3>
                                <span>Ленинградская область, г. Выборг, ул. Крепостная 25</span>
                                <span>Городской телефон: </span>
                                <span><img src="img/phone.png"> тел. 254-56</span><br>
                                <span>Email: </span>
                                <span><img src="img/email.png"> vbgpalace@mail.ru</span>
                                <div class="b1">
                                    <div class="row1">
                                        <img src="img/pic1.jpg">
                                        <img src="img/pic2.jpg">
                                    </div>
                                    <div class="row2">
                                        <img src="img/pic3.jpg">
                                        <img src="img/pic4.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <form class="fb">
                                    <h3>Форма обратной связи</h3>
                                    <div class="grp">
                                        <input placeholder="Ваше имя" class="input-name" type="text">
                                        <button id="btn-name"></button>
                                    </div>
                                    <div class="grp">
                                        <input placeholder="Ваш email" class="input-email" type="text">
                                        <button id="btn-email"></button>
                                    </div>
                                    <textarea rows="6" placeholder="Мы можем Вам чем-то помочь?" class="input-mes"></textarea>
                                    <button type="submit" id="btn-mes">отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>