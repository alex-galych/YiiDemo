<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "Services".
 *
 * The followings are the available columns in table 'Services':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $text
 * @property string $url
 * @property string $image
 * @property string $path
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class Services extends CActiveRecord
{
    /**
     * @var string
     */
    protected $path = '/../../uploads/Services/';

    /**
     * Add behavior for upload and delete image
     * @return array
     */
    public function behaviors(){
        return array(
            'ImageBehavior' => array(
                'class' => 'ImageBehavior',
                'path' => $this->path,
            ),
        );
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Services the static model class
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
		return 'Services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>30),
			array('description', 'length', 'max'=>200),
			array('url', 'length', 'max'=>200),
			array('url', 'isUniqueAttribute'),
            array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'message'=>'Image files only', 'maxSize' => 1024 * 1024 * 1, 'tooLarge' => 'The file was larger than 1MB. Please upload a smaller file.'),
			array('image', 'checkImageResolution'),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, text, url, image', 'safe', 'on'=>'search'),
		);
	}

    /**
     * @param $attribute
     * @param $params
     */
    public function checkImageResolution($attribute, $params){
        $result = $this->ImageBehavior->checkImageResolution($this,array('image'=>$attribute,'height'=>'32','width'=>'46'));
        if(false == $result){
            $this->addError('image', 'This image resolution wrong! Must be 46x32!');
        }
    }

    /**
     * @param $attribute
     * @param $params
     */
    public function isUniqueAttribute($attribute, $params)
    {
        $criteria = new CDbCriteria;
        $criteria->select = array('id');
        $criteria->condition = "url =:col_val ". ( !is_null($this->id) ? "AND id !=".$this->id : "");
        $criteria->params = array(':col_val' => $this->url);
        if( !empty($this->$attribute) && Services::model()->find($criteria) !== null)
            $this->addError($attribute, 'This '.$attribute.' already exists!');
    }

    /**
     * @return parent beforeValidate
     */
    public function beforeValidate() {
        if (!$this->image) {
            $this->addError('image', 'Select service background image!');
        }
        return parent::beforeValidate();
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
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'text' => 'Text',
			'url' => 'Url',
			'image' => 'Image',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return boolean value
     */
    protected function beforeDelete(){
        if (parent::beforeDelete()){
            $this->ImageBehavior->deleteImage(Yii::app()->basePath.$this->path.$this->id);
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    protected function afterSave(){
        parent::afterSave();
        $this->ImageBehavior->saveImage('image');
        return true;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public  function insertUpdateBlock($params = array()){
        $this->attributes=$params;
        return $this->ImageBehavior->uploadImage($this,array('image'));
    }
}