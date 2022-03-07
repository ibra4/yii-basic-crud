<?php

namespace console\controllers\cron;

use Carbon\Carbon;
use common\queue\SendMonthlyMakeReportEmail;
use yii\console\Controller;

class MonthlyMakeEmailsController extends Controller
{
    public function actionIndex()
    {
        $rows = (new \yii\db\Query())
            ->select([
                'm.id as mid',
                'm.name',
                'COUNT(p.id) as all_posts',
                "count(case when p.status = 1 then 1 else null end) as active_posts",
                "count(case when p.status = 0 then 1 else null end) as inactive_posts",
            ])
            ->from('make as m')
            ->join('LEFT JOIN', 'post as p', 'p.make_id=m.id')
            ->where(['between', 'm.created_at', Carbon::now()->subMonths(1)->getTimestamp(), Carbon::now()->getTimestamp()])
            ->groupBy('m.id')
            ->all();

        $content = \Yii::$app->controller->renderPartial("/mailtemplates/monthlyposts", [
            'posts' => $rows
        ]);

        \Yii::$app->queue->push(new SendMonthlyMakeReportEmail([
            'title' => "Posts Monthly Report",
            'content' => $content,
        ]));

    }
}
