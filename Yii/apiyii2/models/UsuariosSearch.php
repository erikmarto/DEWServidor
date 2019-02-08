<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['usuario', 'nombre', 'email', 'password', 'fecha_alta', 'fecha_baja', 'estado', 'telefono', 'origen', 'observ', 'ult_fecha', 'roles', 'fichero_foto', 'token'], 'safe'],
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
        $query = Usuarios::find();

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
            'fecha_alta' => $this->fecha_alta,
            'fecha_baja' => $this->fecha_baja,
            'ult_fecha' => $this->ult_fecha,
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'origen', $this->origen])
            ->andFilterWhere(['like', 'observ', $this->observ])
            ->andFilterWhere(['like', 'roles', $this->roles])
            ->andFilterWhere(['like', 'fichero_foto', $this->fichero_foto])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
