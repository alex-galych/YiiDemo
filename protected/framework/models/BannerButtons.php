<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "BannerButtons".
 *
 * The followings are the available columns in table 'BannerButtons':
 * @property string $id
 * @property string $image
 * @property integer $bannerId
 * @property string $url
 * @property string $path
 *
 * The followings are the available model relations:
 * @property HomePageBanners $banner
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class BannerButtons extends CActiveRecord
{

    protected $path = '/../../uploads/BannerButtons/';

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
	 * @return BannerButtons the static model class
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
		return 'BannerButtons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('bannerId', 'numerical', 'integerOnly'=>true),
			array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'message'=>'Image files only', 'maxSize' => 1024 * 1024 * 1, 'tooLarge' => 'The file was larger than 1MB. Please upload a smaller file.'),
			array('url', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bannerId, url', 'safe', 'on'=>'search'),
		);
	}

    /**
     * @return mixed
     */
    public function beforeValidate() {
        if (!$this->image) {
            $this->addError('image', 'Select banner button background image!');
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
			'banner' => array(self::BELONGS_TO, 'HomePageBanners', 'bannerId'),
            //'banner'=>array(self::BELONGS_TO, 'HomePageBanners', '', 'on'=>'id=bannerId', 'joinType'=>'RIGHT JOIN', 'alias'=>'banner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'bannerId' => 'Banner',
			'url' => 'Url',
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

        $criteria->compare('id',$this->id,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('bannerId',$this->bannerId);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Get privet attribute $path
     * @return string
     */
    public function  getFilePath(){
        return $this->path;
    }

    /**
     * @return bool
     */
    protected function beforeDelete(){
        if (parent::beforeDelete())
        {
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
     * Method for Upload bannerButton image
     * @param array $params
     * @return mixed
     */
    public function insertUpdateBannerButton($params = array()){
        $this->attributes=$params;
        return $this->ImageBehavior->uploadImage($this,array('image'));
    }
}