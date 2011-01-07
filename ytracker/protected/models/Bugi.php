<?php

/**
 * This is the model class for table "{{bugi}}".
 *
 * The followings are the available columns in table '{{bugi}}':
 * @property integer $bug_id
 * @property integer $bug_reporter
 * @property integer $bug_status
 * @property string $bug_text
 * @property integer $bug_time
 * @property integer $bug_last_time
 * @property string $status
 * @property string $color
 * @property string $time
 * @property string $last_time
 * @property string $username
 * @property string $url
 */
class Bugi extends CActiveRecord {
	const STATUS_NEW = 0;
	const STATUS_KNOW = 1;
	const STATUS_PROGRESS = 2;
	const STATUS_FIXED = 3;
	const STATUS_CLOSED = 4;
	const STATUS_WONT_FIX = 5;
	const STATUS_FEEDBACK = 6;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Bugi the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{bugi}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bug_title, bug_text', 'required'),
			array('bug_status', 'numerical', 'integerOnly' => true),
			array('bug_status', 'in', 'range' => array(0, 1, 2, 3, 4, 5, 6)),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bug_id, bug_reporter, bug_status, bug_title, bug_text, bug_time, bug_last_time', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'bug_reporter')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'bug_id' => '#ID',
			'bug_reporter' => 'Zgłaszający',
			'bug_status' => 'Status',
			'bug_title' => 'Tytuł',
			'bug_text' => 'Opis',
			'bug_time' => 'Zgłoszony',
			'bug_last_time' => 'Ostatnia modyfikacja',
			'time' => 'Zgłoszony',
			'last_time' => 'Ostatnia modyfikacja'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('bug_id', $this->bug_id);
		$criteria->compare('bug_reporter', $this->bug_reporter);
		$criteria->compare('bug_status', $this->bug_status);
		$criteria->compare('bug_text', $this->bug_text, true);
		$criteria->compare('bug_time', $this->bug_time);
		$criteria->compare('bug_last_time', $this->bug_last_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function _getStatusOptions() {
		return array(
			self::STATUS_NEW => 'Nowy',
			self::STATUS_KNOW => 'Przyjęty',
			self::STATUS_PROGRESS => 'W trakcie',
			self::STATUS_FIXED => 'Naprawiony',
			self::STATUS_CLOSED => 'Zamknięty',
			self::STATUS_WONT_FIX => 'Odrzucony',
			self::STATUS_FEEDBACK => 'Feedback',
		);
	}

	public function _getStatusColors() {
		return array(
			self::STATUS_NEW => '#fcbdbd',
			self::STATUS_KNOW => '#fff494',
			self::STATUS_PROGRESS => '#c2dfff',
			self::STATUS_FIXED => '#d2f5b0',
			self::STATUS_CLOSED => '#c9ccc4',
			self::STATUS_WONT_FIX => 'white',
			self::STATUS_FEEDBACK => '#e3b7eb',
		);
	}

	public function getStatus() {
		$options = $this->_getStatusOptions();
		return (!empty($options[$this->bug_status])) ? $options[$this->bug_status] : FALSE;
	}

	public function getColor() {
		$options = $this->_getStatusColors();
		return (!empty($options[$this->bug_status])) ? $options[$this->bug_status] : FALSE;
	}

	public function getTime() {
		return (!empty($this->bug_time)) ? Yii::app()->getDateFormatter()->formatDateTime($this->bug_last_time,'full','short') : FALSE;
	}

	public function getLast_Time() {
		return (!empty($this->bug_last_time)) ? Yii::app()->getDateFormatter()->formatDateTime($this->bug_last_time,'full','short') : FALSE;
	}

	public function getUrl() {
		if (!isset($this->url)) {
			$this->url = Yii::app()->createUrl('bugi/view', array(
						'id' => $this->bug_id,
					));
		}
		return $this->url;
	}

	public function setUrl($val) {
		$this->url = $val;
	}

	public function getUsername() {
		return $this->author->username;
	}

	public function getMantis_Id() {
		return str_repeat('0', 5 - strlen($this->bug_id)) . $this->bug_id;
	}

	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->bug_time = $this->bug_last_time = time();
				$this->bug_reporter = Yii::app()->user->id;
				$this->bug_status = self::STATUS_NEW;
			} else {
				$this->bug_last_time = time();
			}
			return TRUE;
		} else
			return FALSE;
	}

}