<?php

namespace common\models\Search;

use common\models\Post;
use DateTime;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PostSearch extends Post
{
    public function rules()
    {
        return [
            [['status', 'created_at', 'start', 'end'], 'safe'],
            [['model_id', 'make_id'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Post::find();
        $query->joinWith('model');
        $query->joinWith('make');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['post.status' => $this->status])
            ->andFilterWhere(['model.id' => $this->model_id])
            ->andFilterWhere(['make.id' => $this->make_id]);
        if ($this->start) {
            $query->andFilterWhere(['>=', 'post.created_at', strtotime($this->start)]);
        }
        if ($this->end) {
            $query->andFilterWhere(['<=', 'post.created_at', strtotime($this->end)]);
        }

        return $dataProvider;
    }
}
