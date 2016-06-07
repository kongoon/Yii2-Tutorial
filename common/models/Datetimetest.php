<?php

namespace common\models;

use Yii;
use common\models\MyActiveRecord;

class Datetimetest extends MyActiveRecord
{

    public static function tableName()
    {
        return 'datetimetest';
    }

    public function rules()
    {
        return [
            [['datetime1', 'datetime2'], 'required'],
            [['datetime1', 'datetime2'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datetime1' => 'Datetime1',
            'datetime2' => 'Datetime2',
        ];
    }

    public function attributeHints()
    {
        return [
            'datetime1' => 'ตัวอยาง 13/05/2559 01:20:30',
            'datetime2' => 'ตัวอย่าง 13/05/2559 01:20:30',
        ];
    }
}
