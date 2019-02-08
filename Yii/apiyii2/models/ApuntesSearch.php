<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Apuntes;

/**
 * ApuntesSearch represents the model behind the search form of `app\models\Apuntes`.
 */
class ApuntesSearch extends Apuntes
{
        public $usuario_nombre;
        public $concepto_nombre;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'grupos_id'], 'integer'],
            [['tipo', 'concepto', 'fecha', 'mes','concepto_nombre','usuario_nombre'], 'safe'],
            [['importe'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        
        $query = Apuntes::find()->innerJoinWith(['usuario','grupos'],true);
       

        // add conditions that should always apply here
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['usuario_nombre'] = [
		'asc' => ['usuarios.nombre' => SORT_ASC],
		'desc' => ['usuarios.nombre' => SORT_DESC],
	];
        $dataProvider->sort->attributes['concepto_nombre'] = [
		'asc' => ['grupos.nombre' => SORT_ASC],
		'desc' => ['grupos.nombre' => SORT_DESC],
	];
        
        $this->load($params);
       
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
           
            'usuarios_id' => $this->usuarios_id,
            'importe' => $this->importe,
            'fecha' => $this->fecha,
            'grupos_id' => $this->grupos_id,
            'mes' => $this->mes,
        ]);

        $query
            ->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere( ['like','usuarios.nombre',$this->usuario_nombre])
            ->andFilterWhere( ['like','grupos.nombre',$this->concepto_nombre]);  
        
        return $dataProvider;
    }
}
