<?php

use app\models\Customer;
use app\models\History;

/** @var $model History */

if($model->event == History::EVENT_CUSTOMER_CHANGE_TYPE){
    echo $this->render('_item_statuses_change', [
        'model' => $model,
        'oldValue' => Customer::getTypeTextByType($model->getDetailOldValue('type')),
        'newValue' => Customer::getTypeTextByType($model->getDetailNewValue('type'))
    ]);
} elseif ($model->event == History::EVENT_CUSTOMER_CHANGE_QUALITY){
    echo $this->render('_item_statuses_change', [
        'model' => $model,
        'oldValue' => Customer::getQualityTextByQuality($model->getDetailOldValue('quality')),
        'newValue' => Customer::getQualityTextByQuality($model->getDetailNewValue('quality')),
    ]);
} else {
    echo $this->render('_item_common', [
        'model' => $model,
    ]);
}
