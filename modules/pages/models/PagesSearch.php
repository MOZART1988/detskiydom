<?php

namespace app\modules\pages\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pages\models\Pages;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * PagesSearch represents the model behind the search form about `app\modules\pages\models\Pages`.
 */
class PagesSearch extends Pages
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'type_id', 'sort'], 'integer'],
            [
                ['title', 'short_text', 'text', 'sefname'],
                'safe'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {

        $scenarios = Model::scenarios();
        $scenarios['search'] = ['title', 'pub_date', 'status_id', 'user_id', 'is_active', 'category_id'];
        return $scenarios;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pages::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],

        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pages.is_active' => $this->is_active,
            'pages.type_id' => $this->type_id,
            'pages.sort' => $this->sort
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'short_text', $this->short_text])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'sefname', $this->sefname]);


        return $dataProvider;
    }
}
