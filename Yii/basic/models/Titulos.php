<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titulos".
 *
 * @property int $id
 * @property string $titulo
 * @property int $autor_id
 * @property int $categoria_id
 * @property string $coleccion
 * @property string $numero
 * @property string $sinopsis
 * @property double $calificacion
 * @property int $usuarios_id
 * @property string $fecha
 * @property int $descargas
 * @property string $anyo
 * @property string $isbn
 * @property string $estado
 * @property string $portada
 *
 * @property Comentarios[] $comentarios
 * @property Ebooks[] $ebooks
 * @property Autores $autor
 * @property Categorias $categoria
 * @property Usuarios $usuarios
 */
class Titulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'autor_id', 'categoria_id', 'calificacion', 'usuarios_id', 'fecha', 'descargas', 'estado', 'portada'], 'required'],
            [['autor_id', 'categoria_id', 'usuarios_id', 'descargas'], 'integer'],
            [['sinopsis'], 'string'],
            [['calificacion'], 'number'],
            [['fecha'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['coleccion'], 'string', 'max' => 80],
            [['numero', 'anyo'], 'string', 'max' => 4],
            [['isbn'], 'string', 'max' => 14],
            [['estado', 'portada'], 'string', 'max' => 1],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autores::className(), 'targetAttribute' => ['autor_id' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'categoria_id' => Yii::t('app', 'Categoria ID'),
            'coleccion' => Yii::t('app', 'Coleccion'),
            'numero' => Yii::t('app', 'Numero'),
            'sinopsis' => Yii::t('app', 'Sinopsis'),
            'calificacion' => Yii::t('app', 'Calificacion'),
            'usuarios_id' => Yii::t('app', 'Usuarios ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'descargas' => Yii::t('app', 'Descargas'),
            'anyo' => Yii::t('app', 'Anyo'),
            'isbn' => Yii::t('app', 'Isbn'),
            'estado' => Yii::t('app', 'Estado'),
            'portada' => Yii::t('app', 'Portada'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['titulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEbooks()
    {
        return $this->hasMany(Ebooks::className(), ['titulos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autores::className(), ['id' => 'autor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }
}
