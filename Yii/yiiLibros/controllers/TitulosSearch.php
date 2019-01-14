<?php

namespace app\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Titulos;

/**
 * TitulosSearch represents the model behind the search form of `app\models\Titulos`.
 */
class TitulosSearch extends Titulos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'autor_id', 'categoria_id', 'usuarios_id', 'descargas'], 'integer'],
            [['titulo', 'coleccion', 'numero', 'sinopsis', 'fecha', 'anyo', 'isbn', 'estado', 'portada'], 'safe'],
            [['calificacion'], 'number'],
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
        $query = Titulos::find();

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
            'autor_id' => $this->autor_id,
            'categoria_id' => $this->categoria_id,
            'calificacion' => $this->calificacion,
            'usuarios_id' => $this->usuarios_id,
            'fecha' => $this->fecha,
            'descargas' => $this->descargas,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'coleccion', $this->coleccion])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'sinopsis', $this->sinopsis])
            ->andFilterWhere(['like', 'anyo', $this->anyo])
            ->andFilterWhere(['like', 'isbn', $this->isbn])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'portada', $this->portada]);

        return $dataProvider;
    }
}
