<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "HomePageBlocks".
 *
 * The followings are the available columns in table 'HomePageBlocks':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $btnUrl
 * @property string $btnImg
 * @property string $path
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class HomePageBlocks extends CActiveRecord
{

    /**
     * @var string
     */
    protected $path = '/../../uploads/HomePageBlocks/';

    /**
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
	 * @return HomePageBlocks the static model class
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
		return 'HomePageBlocks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('image', 'required'),
            array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'message'=>'Image files only', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'The file was larger than 2MB. Please upload a smaller file.'),
            array('image', 'checkImageResolution'),
            array('title', 'length', 'max'=>30),
			array('description', 'length', 'max'=>500),
			array('btnUrl','length', 'max'=> 200),
			array('btnImg', 'file', 'allowEmpty'=>true, 'on'=>'update', 'on'=>'create','types'=>'jpg, gif, png', 'message'=>'Image files only', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'The file was larger than 2MB. Please upload a smaller file.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, image, btnUrl, btnImg', 'safe', 'on'=>'search'),
		);
	}

    /**
     * @param $attribute
     * @param $params
     */
    public function checkImageResolution($attribute, $params){
        $result = $this->ImageBehavior->checkImageResolution($this,array('image'=>$attribute,'height'=>'111','width'=>'278'));
        if(false == $result){
            $this->addError('image', 'Image resolution wrong! Must be 278x111!');
        }
    }

    /**
     * @return mixed
     */
    public function beforeValidate() {
       if (!$this->image) {
            $this->addError('image', 'Select banner background image!');
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
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'btnUrl' => 'Btn Url',
			'btnImg' => 'Btn Img',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('btnUrl',$this->btnUrl,true);
		$criteria->compare('btnImg',$this->btnImg,true);

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
            foreach(array('image','btnImg') as $img){
                $this->ImageBehavior->saveImage($img);
            }
            return true;
    }

    /**
     * Upload new block image
     * @param array $params
     * @return mixed
     */
    public  function insertUpdateBlock($params = array()){
        $this->attributes=$params;
        return $this->ImageBehavior->uploadImage($this,array('image','btnImg'));
    }
}