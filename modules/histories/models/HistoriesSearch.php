<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 1:27 PM
 */

namespace app\modules\histories\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class HistoriesSearch extends Histories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['title', 'create_date', 'update_date', 'short_text'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
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
        $query = Histories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
        ->andFilterWhere(['like', 'short_text', $this->short_text]);

        return $dataProvider;
    }
}