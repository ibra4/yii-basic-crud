<?php

namespace common\queue;

use yii\base\BaseObject;

class SendDeletedPostsEmail extends BaseObject implements \yii\queue\JobInterface
{
    public $content;

    const FROM = 'i.hammad@syarah.com';

    public function execute($queue)
    {
        \Yii::$app->mailer->compose()
            ->setFrom(self::FROM)
            ->setTo('ibra9959@hotmail.com')
            ->setSubject("Deleted Posts")
            ->setHtmlBody($this->content)
            ->send();
    }
}
