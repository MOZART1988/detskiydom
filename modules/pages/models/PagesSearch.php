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

    public $pub_date_from;
    public $pub_date_to;
    public $category_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'lang_id', 'views', 'is_active', 'category_id'], 'integer'],
            [
                ['title', 'short_text', 'text', 'sefname', 'pub_date', 'pub_date_from', 'pub_date_to', 'status_id'],
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

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'pub_date_from' => 'С',
            'pub_date_to' => ' По'
        ]);
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
            'user_id' => $this->user_id,
            'pages.lang_id' => $this->lang_id,
            'pub_date' => $this->pub_date,
            'views' => $this->views,
            'pages.is_active' => $this->is_active,
        ]);

        if (!empty($this->status_id)) {
            $query->andWhere(['status_id' => $this->status_id]);
        }

        if (!empty($this->pub_date_from)) {
            $query->andWhere('pub_date>=:from_date', [':from_date' => $this->pub_date_from]);
        }

        if (!empty($this->pub_date_to)) {
            $query->andWhere('pub_date<=:to_date', [':to_date' => $this->pub_date_to]);
        }



        if (!empty($this->category_id)) {
            $query->joinWith('categories');
            $query->andWhere(['categories.id' => $this->category_id]);
        }

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'short_text', $this->short_text])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'sefname', $this->sefname]);


        return $dataProvider;
    }
}
