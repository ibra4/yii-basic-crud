<?php

namespace common\queue;

use yii\base\BaseObject;

class SendPostEmail extends BaseObject implements \yii\queue\JobInterface
{
    public $post_title;
    public $post_id;

    const FROM = 'i.hammad@syarah.com';

    public function execute($queue)
    {
        $test = "";
        \Yii::$app->mailer->compose()
            ->setFrom(self::FROM)
            // Admin email
            ->setTo('ibra9959@hotmail.com')
            ->setSubject("$this->post_id Status changed!")
            ->setTextBody("$this->post_title Status changed!")
            ->setHtmlBody("The post <b>$this->post_title</b> with id <b>$this->post_id</b> status changed from Published to Inactive")
            ->send();
    }
}
