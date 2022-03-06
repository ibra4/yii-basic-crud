<?php

namespace common\components;

use common\models\Post;
use kartik\mpdf\Pdf;

class PdfGenerator
{
    public function generatePostPdf(Post $post)
    {
        $content = \Yii::$app->controller->renderPartial("pdf", [
            'model' => $post
        ]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_FILE,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'options' => ['title' => $post->title],
            'methods' => [
                'SetHeader' => ['Syarah - Car Details'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);
        $pdf->filename = "uploads/car-$post->id.pdf";
        $pdf->render();
        return $pdf->filename;
    }
}
