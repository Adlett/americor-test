<?php

namespace app\widgets\HistoryList\helpers\states;

use app\interfaces\CommonStateInterface;
use app\models\History;
use app\widgets\HistoryList\helpers\BaseCommonState;
use Yii;
use yii\helpers\Html;

/**
 * @package app\widgets\HistoryList\helpers\states
 *
 */
class FaxState extends BaseCommonState implements CommonStateInterface
{
    public function __construct(History $history)
    {
        $fax = $history->fax;
        $this->body = $history->eventText .
            ' - ' .
            (isset($fax->document) ? Html::a(
                Yii::t('app', 'view document'),
                $fax->document->getViewUrl(),
                [
                    'target' => '_blank',
                    'data-pjax' => 0
                ]
            ) : '');

        $this->isHasFooterDateTime = true;
        $this->footerDateTime = $history->ins_ts;
        $this->iconClass = 'fa-fax bg-green';
    }


}