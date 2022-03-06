<?php

namespace common\queue;

use yii\base\BaseObject;

class SendMonthlyMakeReportEmail extends BaseObject implements \yii\queue\JobInterface
{
    const FROM = 'i.hammad@syarah.com';

    public $content;
    public $title;

    public function execute($queue)
    {
        \Yii::$app->mailer->compose()
            ->setFrom(self::FROM)
            ->setTo('ibra9959@hotmail.com')
            ->setSubject("$this->title")
            ->setTextBody($this->content)
            ->setHtmlBody($this->content)
            ->send();
    }
}
