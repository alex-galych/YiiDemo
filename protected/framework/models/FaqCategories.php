<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "FaqCategories".
 *
 * The followings are the available columns in table 'FaqCategories':
 * @property integer $id
 * @property string $name
 * @property integer $orderCategory
 * @property integer $isActive
 *
 * The followings are the available model relations:
 * @property FaqBody[] $faqBodies
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class FaqCategories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FaqCategories the static model class
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
		return 'FaqCategories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orderCategory, name, isActive', 'required'),
			array('orderCategory', 'isUniqueAttribute'),
			array('orderCategory, isActive', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, orderCategory, isActive', 'safe', 'on'=>'search'),
		);
	}

    /**
     * Check orderCategory on unique value
     * @param $attribute
     * @param $params
     */
    public function isUniqueAttribute($attribute, $params)
    {
        $criteria = new CDbCriteria;

        $criteria->select = array('id');
        $criteria->condition = "orderCategory =:col_val ". ( !is_null($this->id) ? "AND id !=".$this->id : "");;
        $criteria->params = array(':col_val' => $this->orderCategory);

        if( !empty($this->$attribute) && FaqCategories::model()->find($criteria) !== null)
            $this->addError($attribute, 'This '.$attribute.' already exists!');
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'faqBodies' => array(self::HAS_MANY, 'FaqBody', 'faqCategory'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'orderCategory' => 'Category Order',
			'isActive' => 'Is Active',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('orderCategory',$this->orderCategory);
		$criteria->compare('isActive',$this->isActive);

        $sort = new CSort;
        $sort->defaultOrder = '`orderCategory` ASC';
        $sort->attributes = array(
            'name' => 'name',
            'orderCategory' => 'orderCategory',
            'id' => 'id',
            'isActive' => 'isActive',
        );
        $sort->applyOrder($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => $sort,
		));
	}

    /**
     * Return list of Categories names
     * @return array
     */
    public static function getCategories(){
        $result = array();
        $categories = self::model()->findAll();
        foreach($categories as $value){
            $result[$value->id] = $value->name;
        }
        return $result;
    }

    /**
     * Replace order's between two categories
     * @param $modeCategory
     */
    public function replaceCategoriesOrder($modeCategory){
        $categoryOrder = $this->orderCategory;
        $this->orderCategory = $modeCategory->orderCategory;
        $modeCategory -> orderCategory = $categoryOrder;
        $modeCategory->save(false);
        $this->save();
    }

    /**
     * Return all active Categories with all active ask and answers
     * @return array
     */
    public static function getAllFaqArr(){
        $result = array();
        $faqObj = FaqCategories::model()->with('faqBodies')->findAll(
            array('order'=>'orderCategory ASC',
                'condition'=>"`t`.`isActive` =:col_val2 AND `faqBodies`.`isActive` =:col_val2",
                'params'=>array('col_val2' => '1'),
            )
        );

        foreach($faqObj as $val){
            $result[$val->name]['Items'] = array();
            foreach($val['faqBodies'] as $bodyKey=>$bodyValue){
                $result[$val->name]['Items'][$bodyKey] = array('ask'=>$bodyValue->ask,'answer'=>$bodyValue->answer);
            }
        }
        return $result;
    }
}