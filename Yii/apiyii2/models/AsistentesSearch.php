<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Asistentes;

/**
 * AsistentesSearch represents the model behind the search form of `app\models\Asistentes`.
 */
class AsistentesSearch extends Asistentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'clases_id', 'usuarios_id'], 'integer'],
            [['confirmado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
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
        $query = Asistentes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'clases_id' => $this->clases_id,
            'usuarios_id' => $this->usuarios_id,
        ]);

        $query->andFilterWhere(['like', 'confirmado', $this->confirmado]);

        return $dataProvider;
    }
}
