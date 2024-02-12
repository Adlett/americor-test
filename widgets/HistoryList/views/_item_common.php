<?php

use yii\helpers\Html;

/** @var $model \app\models\History */

$stateService = (new \app\widgets\HistoryList\helpers\BaseCommonState($model));
$state = $stateService->getState();
?>
<?= Html::tag('i', '', ['class' => "icon icon-circle icon-main white " . $state->getIconClass()]); ?>

    <div class="bg-success ">
        <?= $state->getBody() ?>

        <?php if ($state->getBodyDateTime()): ?>
            <span>
                <?= \app\widgets\DateTime\DateTime::widget(['dateTime' => $state->getBodyDateTime()]) ?>
            </span>
        <?php endif; ?>
    </div>

<?php if ($model->user): ?>
    <div class="bg-info"><?= $model->user->username ?? '' ?></div>
<?php endif; ?>

<?php if ($state->getIsHasContent() && $state->getContent()): ?>
    <div class="bg-info">
        <?= $state->getContent() ?>
    </div>
<?php endif; ?>

<?php if ($state->getFooter() || $state->getFooterDateTime()): ?>
    <div class="bg-warning">
        <?= $state->getFooter() ?>
        <?php if ($state->getFooterDateTime()): ?>
            <span><?= \app\widgets\DateTime\DateTime::widget(['dateTime' => $state->getFooterDateTime()]) ?></span>
        <?php endif; ?>
    </div>
<?php endif; ?>