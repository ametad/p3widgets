<?php
/**
 * Class file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * This is the model base class for the table "p3_widget_meta".
 *
 * Columns in table "p3_widget_meta" available as properties of the model:
 * @property integer $id
 * @property integer $status
 * @property string $type
 * @property string $language
 * @property integer $treeParent_id
 * @property integer $treePosition
 * @property string $begin
 * @property string $end
 * @property string $keywords
 * @property string $customData
 * @property integer $label
 * @property string $owner
 * @property string $checkAccessCreate
 * @property string $checkAccessRead
 * @property string $checkAccessUpdate
 * @property string $checkAccessDelete
 * @property string $createdAt
 * @property string $createdBy
 * @property string $modifiedAt
 * @property string $modifiedBy
 * @property string $guid
 * @property string $ancestor_guid
 * @property string $model
 *
 * There are no model relations.
 * 
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3widgets.models
 * @since 3.0.1

 */
abstract class BaseP3WidgetMeta extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'p3_widget_meta';
	}

	public function rules()
	{
		return array(
			array('type', 'unique'),
			array('type', 'identificationColumnValidator'),
			array('id, createdAt', 'required'),
			array('status, type, language, treeParent_id, treePosition, begin, end, keywords, customData, label, owner, checkAccessCreate, checkAccessRead, checkAccessUpdate, checkAccessDelete, createdBy, modifiedAt, modifiedBy, guid, ancestor_guid, model', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, status, treeParent_id, treePosition, label', 'numerical', 'integerOnly'=>true),
			array('type, owner, createdBy, modifiedBy, guid, ancestor_guid', 'length', 'max'=>64),
			array('language', 'length', 'max'=>8),
			array('checkAccessCreate, checkAccessRead, checkAccessUpdate, checkAccessDelete', 'length', 'max'=>256),
			array('model', 'length', 'max'=>128),
			array('begin, end, keywords, customData, modifiedAt', 'safe'),
			array('id, status, type, language, treeParent_id, treePosition, begin, end, keywords, customData, label, owner, checkAccessCreate, checkAccessRead, checkAccessUpdate, checkAccessDelete, createdAt, createdBy, modifiedAt, modifiedBy, guid, ancestor_guid, model', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'status' => Yii::t('app', 'Status'),
			'type' => Yii::t('app', 'Type'),
			'language' => Yii::t('app', 'Language'),
			'treeParent_id' => Yii::t('app', 'Tree Parent'),
			'treePosition' => Yii::t('app', 'Tree Position'),
			'begin' => Yii::t('app', 'Begin'),
			'end' => Yii::t('app', 'End'),
			'keywords' => Yii::t('app', 'Keywords'),
			'customData' => Yii::t('app', 'Custom Data'),
			'label' => Yii::t('app', 'Label'),
			'owner' => Yii::t('app', 'Owner'),
			'checkAccessCreate' => Yii::t('app', 'Check Access Create'),
			'checkAccessRead' => Yii::t('app', 'Check Access Read'),
			'checkAccessUpdate' => Yii::t('app', 'Check Access Update'),
			'checkAccessDelete' => Yii::t('app', 'Check Access Delete'),
			'createdAt' => Yii::t('app', 'Created At'),
			'createdBy' => Yii::t('app', 'Created By'),
			'modifiedAt' => Yii::t('app', 'Modified At'),
			'modifiedBy' => Yii::t('app', 'Modified By'),
			'guid' => Yii::t('app', 'Guid'),
			'ancestor_guid' => Yii::t('app', 'Ancestor Guid'),
			'model' => Yii::t('app', 'Model'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('status', $this->status);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('language', $this->language, true);
		$criteria->compare('treeParent_id', $this->treeParent_id);
		$criteria->compare('treePosition', $this->treePosition);
		$criteria->compare('begin', $this->begin, true);
		$criteria->compare('end', $this->end, true);
		$criteria->compare('keywords', $this->keywords, true);
		$criteria->compare('customData', $this->customData, true);
		$criteria->compare('label', $this->label);
		$criteria->compare('owner', $this->owner, true);
		$criteria->compare('checkAccessCreate', $this->checkAccessCreate, true);
		$criteria->compare('checkAccessRead', $this->checkAccessRead, true);
		$criteria->compare('checkAccessUpdate', $this->checkAccessUpdate, true);
		$criteria->compare('checkAccessDelete', $this->checkAccessDelete, true);
		$criteria->compare('createdAt', $this->createdAt, true);
		$criteria->compare('createdBy', $this->createdBy, true);
		$criteria->compare('modifiedAt', $this->modifiedAt, true);
		$criteria->compare('modifiedBy', $this->modifiedBy, true);
		$criteria->compare('guid', $this->guid, true);
		$criteria->compare('ancestor_guid', $this->ancestor_guid, true);
		$criteria->compare('model', $this->model, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->id;		
		
			}
	
}
