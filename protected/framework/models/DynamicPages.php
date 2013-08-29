<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "DynamicPages".
 *
 * The followings are the available columns in table 'DynamicPages':
 * @property integer $id
 * @property string $uri
 * @property string $title
 * @property string $quote
 * @property string $image
 * @property string $content
 * @property string $path
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class DynamicPages extends CActiveRecord
{
    /**
     * @var string
     */
    protected $path = '/../../uploads/DynamicPages/';

    /**
     * Add behavior for image delete and upload
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
	 * @return DynamicPages the static model class
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
		return 'DynamicPages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uri', 'length', 'max'=>50, ),
			array('uri','isUniqueAttribute' ),
			array('uri, title', 'required' ),
			array('title, quote', 'length', 'max'=>100),
			array('title','length', 'max'=>100, ),
            array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'message'=>'Image files only', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'The file was larger than 2MB. Please upload a smaller file.'),
            array('image','checkImageResolution' ),
            array('content', 'length', 'max' => 1024 * 1024 * 1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uri, title, quote, image, content', 'safe', 'on'=>'search'),
		);
	}

    /**
     * @param $attribute
     * @param $params
     */
    public function checkImageResolution($attribute, $params){
        $result = $this->ImageBehavior->checkImageResolution($this,array('image'=>$attribute,'height'=>'114','width'=>'359'));
        if(false == $result){
            $this->addError('image', 'This image size wrong! Must be 359x114!');
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
        $criteria->condition = "uri =:col_val ". ( !is_null($this->id) ? "AND id !=".$this->id : "");
        $criteria->params = array(':col_val' => $this->uri);
        if( !empty($this->$attribute) && DynamicPages::model()->find($criteria) !== null)
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uri' => 'Uri',
			'title' => 'Title',
			'quote' => 'Quote',
			'image' => 'Image',
			'content' => 'Content',
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
		$criteria->compare('uri',$this->uri,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('quote',$this->quote,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return bool
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
     * Upload block image
     * @param array $params
     * @return mixed
     */
    public  function insertUpdateDynamicPage($params = array()){
        $this->attributes=$params;
        return $this->ImageBehavior->uploadImage($this,array('image'));
    }

    /**
     * Return all dynamic page from dynamicPage table
     * @return mixed
     */
    public function getAllDynamicPage(){
        return DynamicPages::model()->findAllByAttributes(
            array(),
            $condition  = "`uri` !=:col_val2",
            $params     = array('col_val2' => 'not-found')
        );
    }
}