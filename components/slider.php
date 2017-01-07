<?php

namespace app\components;

use yii\base\Widget;

class slider extends Widget
{
    public function run()
    {
        return '
            <div class="slider">
            <div class="carousel-top">
                <div class="item item-1"></div>
                <div class="item item-2"></div>
                <div class="item item-3"></div>
                <div class="item item-4"></div>
                <div class="item item-5"></div>
            </div>
        </div>';
    }

}