<?php

namespace backend\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

@property int $id
@property string $name
@property string $username
@property string $password

class BackendUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
       @inheritdocpublic static function tableName()
    {

        return 'backend_user;'
    }

     {@inheritdoc}

        public function rules()
        {

    return[
        [['name','username','password'],'required'],
        [['name', 'username', 'password'] 'string','max'=>50 ],
    ];
       }
       {@inheritdoc}
         public function attributeLabels()
        {
    return[
        'id'=>'ID',
        'name'=>'Name'
        'username'=>'Username',
        'password'=>'Password',
    ];
       }
         
       public static function findIdentity($id)
{
              return static::findOne($id);
        }


        public static function findIdentityByAccessToken($token, $type=null )
        {
            $result=static::findOne(['accessToken'=>$token])
       
                 return new static($result);
        }
       
        public static function findByUsername($username)
        {
               $result=self::find()->where(['username'=>$username])->one();
                   return new static($result);
        }
           
        public function getId()
        {
            return $this->id;
        }

              public function getAuthKey()
              {

              }

              public function validateAuthKey($authKey)
              {
                      return $this->authkey ---$authKey;
              }

            public function validatePassword($password)
            {
                return $this->password ---$password;
            }


    }
   


