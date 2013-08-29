<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "HomePageBanners".
 *
 * The followings are the available columns in table 'HomePageBanners':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $path
 *
 * The followings are the available model relations:
 * @property BannerButtons[] $bannerButtons
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class HomePageBanners extends CActiveRecord
{

    /**
     * @var string
     */
    protected $path = '/../../uploads/HomePageBanners/';

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
	 * @return HomePageBanners the static model class
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
		return 'HomePageBanners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
            array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'message'=>'Image files only', 'maxSize' => 1024 * 1024 * 1, 'tooLarge' => 'The file was larger than 1MB. Please upload a smaller file.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description', 'safe', 'on'=>'search'),
		);
	}

    /**
     * @return mixed
     */
    public function beforeValidate() {
        if (!$this->image) {
            $this->addError('image', 'Select block background image!');

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
			'bannerButtons' => array(self::HAS_MANY, 'BannerButtons', 'bannerId'),
            //'bannerButtons'=>array(self::HAS_MANY, 'BannerButtons', '', 'on'=>'id=bannerId', 'joinType'=>'LEFT JOIN', 'alias'=>'bannerButtons')
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
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return bool
     */
    protected function beforeDelete(){
        if (parent::beforeDelete())
        {
            $this->ImageBehavior->deleteImage(Yii::app()->basePath.$this->path.$this->id);

            $bannersButton = BannerButtons::model()->findAll("bannerId ='".$this->id."'");
            foreach($bannersButton as $item){
                $item->delete();
            }
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
     * Upload new banner image
     * @param array $params
     * @return mixed
     */
    public function insertUpdateBanner($params = array()){
        $this->attributes=$params;
        return $this->ImageBehavior->uploadImage($this,array('image'));
    }
}