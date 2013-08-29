<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "FaqBody".
 *
 * The followings are the available columns in table 'FaqBody':
 * @property integer $id
 * @property string $ask
 * @property string $answer
 * @property integer $isActive
 * @property integer $faqCategory
 *
 * The followings are the available model relations:
 * @property FaqCategories $faqCategory0
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class FaqBody extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FaqBody the static model class
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
		return 'FaqBody';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('faqCategory, isActive, ask, answer', 'required'),
			array('isActive, faqCategory', 'numerical', 'integerOnly'=>true),
			array('ask', 'length', 'max'=>250),
			array('answer', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ask, answer, isActive, faqCategory', 'safe', 'on'=>'search'),
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
            'faqBody' => array(self::BELONGS_TO, 'FaqCategories', 'faqCategory'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ask' => 'Ask',
			'answer' => 'Answer',
			'isActive' => 'Is Active',
			'faqCategory' => 'Faq Category',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ask',$this->ask,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('faqCategory',$this->faqCategory);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Return FAQ Category name from id
     * @param $data
     * @param null $row
     * @return mixed
     */
    public function getFaqCategoryName($data,$row = null){
        $category = FaqCategories::model()->findByPk($data->faqCategory);
        return $category->name;
    }
}