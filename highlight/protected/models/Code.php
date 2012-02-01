<?php

/**
 * This is the model class for table "code".
 *
 * The followings are the available columns in table 'code':
 * @property integer $code_id
 * @property integer $language
 * @property string $description
 * @property string $code
 * @property integer $auditing
 * @property integer $created
 * @property integer $updated
 */
class Code extends CActiveRecord
{
    public $languageText = '';
    public function _language($lang = 0) {
        $language_allow = array(
            '0'  => '文本',
            '1'  => 'PHP',
            '2'  => 'Javascript',
            '3'  => 'C',
            '4'  => 'C++',
            '5'  => 'C#',
            '6'  => 'HTML/XML',
            '7'  => 'python',
            '8'  => 'shell',
            '9'  => 'css',
            '99' => '以上皆不是',
        );
        if ('/' == $lang) {
            return $language_allow;
        }
        if (empty($lang) || FALSE == array_key_exists($lang, $language_allow)) {
            return FALSE;
        }
        return $language_allow[$lang];
    }

    protected function beforeSave() {
        $current =  time();
        if (TRUE == $this->getIsNewRecord()) {
            $this->created = $current;
        }
        $this->updated = $current;
        return TRUE;
    }

    protected function afterFind() {
        $lang = $this->_language($this->language);
        if (FALSE !== $lang) {
            $this->languageText = $lang;
        }
        return true;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Code the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'code';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language, code', 'required'),
			array('language, auditing', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('code_id, language, auditing, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'code_id'     => 'ID',
			'language'    => '语言类型',
			'description' => '代码说明',
            'code'        => '代码',
            'auditing'    => '审核状态',
			'created'     => '建立时间',
			'updated'     => '最后更新',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('code_id',$this->code_id);
		$criteria->compare('language',$this->language);
		$criteria->compare('auditing',$this->auditing);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
