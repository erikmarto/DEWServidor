<?php

namespace app\models;

use Yii;
use app\models\Usuarios;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ResetForm extends \yii\db\ActiveRecord
{
    public $email;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email'], 'required'],
            [['email'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Correo electrónico',
        ];
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
}
