<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\asignaturasEducacion;

/**
 * AsignaturasEducacionSearch represents the model behind the search form of `app\models\asignaturasEducacion`.
 */
class AsignaturasEducacionSearch extends asignaturasEducacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipoeducacion_id'], 'integer'],
            [['nombre_asignatura'], 'safe'],
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
        $query = asignaturasEducacion::find();

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
            'tipoeducacion_id' => $this->tipoeducacion_id,
        ]);

        $query->andFilterWhere(['like', 'nombre_asignatura', $this->nombre_asignatura]);

        return $dataProvider;
    }
}
