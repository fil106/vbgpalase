<?php

namespace app\models;

use yii\db\ActiveRecord;

class film extends ActiveRecord
{
    public function getSessions()
    {
        return $this->hasMany(sessions::className(), ['idFilm' => 'id']);
    }
}