<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%system_rent}}".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property string $system_name
 * @property string $company_name
 * @property string $office_phone_no
 * @property string $mobile_no
 * @property string $status
 * @property string $isDeleted
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 *
 * @property CarList[] $carLists
 * @property User $owner
 */
class SystemRent extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%system_rent}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['owner_id', 'system_name', 'company_name', 'office_phone_no', 'status'], 'required'],
            [['owner_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['system_name'], 'string', 'max' => 100],
            [['company_name'], 'string', 'max' => 255],
            [['office_phone_no', 'mobile_no'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 5],
            [['isDeleted'], 'string', 'max' => 1],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'owner_id' => Yii::t('app', 'Owner'),
            'system_name' => Yii::t('app', 'System Name'),
            'company_name' => Yii::t('app', 'Company Name'),
            'office_phone_no' => Yii::t('app', 'Office Phone No'),
            'mobile_no' => Yii::t('app', 'Mobile No'),
            'status' => Yii::t('app', 'Status'),
            'isDeleted' => Yii::t('app', 'Is Deleted'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'deleted_by' => Yii::t('app', 'Deleted By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarLists() {
        return $this->hasMany(CarList::className(), ['system_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner() {
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

}
