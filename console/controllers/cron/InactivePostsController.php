<?php

namespace console\controllers\cron;

use Carbon\Carbon;
use common\models\Post;
use common\queue\SendDeletedPostsEmail;
use yii\console\Controller;
use yii\db\Connection;

class InactivePostsController extends Controller
{
    public function actionIndex()
    {
        $posts = Post::find()
            ->andFilterWhere(['<=', 'created_at', Carbon::now()->subMonths(2)->getTimestamp()])
            ->all();

        foreach ($posts as $post) {
            $post->delete();
        }

        $content = \Yii::$app->controller->renderPartial("/mailtemplates/deletedposts", [
            'posts' => $posts
        ]);
        \Yii::$app->queue->push(new SendDeletedPostsEmail([
            'content' => $content,
        ]));
    }
}
