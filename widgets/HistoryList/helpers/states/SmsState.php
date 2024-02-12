<?php

namespace app\widgets\HistoryList\helpers\states;

use app\interfaces\CommonStateInterface;
use app\models\History;
use app\widgets\HistoryList\helpers\BaseCommonState;

/**
 * @package app\widgets\HistoryList\helpers\states
 *
 */
class SmsState extends BaseCommonState implements CommonStateInterface
{
    public function __construct(History $history)
    {
        $this->body = $history->sms->message ?? '';

        $this->isHasFooterDateTime = true;
        $this->footerDateTime = $history->ins_ts;
        $this->iconClass = 'icon-sms bg-dark-blue';
    }


}