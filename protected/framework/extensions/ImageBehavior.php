<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
*/

/**
 * To change this template use File | Settings | File Templates.
 * Behavior for save|delete|resize uploading images
 * @property string $path
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */

class ImageBehavior  extends CBehavior
{
    public $path;

    /**
     * Validate upload image image size
     * @param $model
     * @param array $params
     * @return bool
     */
    public function checkImageResolution($model,$params = array()){
        $image = CUploadedFile::getInstance($model,$params['image']);
        if(!is_null($image)){
            $imgSize = getimagesize($image->getTempName());
            if(($imgSize[0] >= $params['width']-8) && ($imgSize[0] <= $params['width'] + 8)
                && ($imgSize[1] >= $params['height']-8) && ($imgSize[1] <= $params['height'] + 8)){
                return true;
            }
        }else{
            return true;
        }
        return false;
    }

    /**
     * @param $model
     * @param array $img_arr
     * @return bool
     */
    public function uploadImage($model ,$img_arr = array()){
        $rnd = rand(0,99999999);
        $result = false;

        foreach($img_arr as $img){
            $uploadedImg=CUploadedFile::getInstance($model,$img);
            if(isset($uploadedImg)){
                if(isset($model->$img) && $model->validate())
                   self::deleteImage(Yii::app()->basePath.$model->path.$model->id.'/'.$model->$img);
                $model->$img = $rnd.'-'.$img.'-banner.'.$uploadedImg->getExtensionName();
            }
        }
        if($model->validate() && $model->save())
            $result = $model;
        return $result;
    }

    /**
     * Saves the image for the owner of this behavior.
     * @param string $name the image name.
     * @internal param string $path the path for saving the image.
     * @internal param \CUploadedFile $file the uploaded file.
     * @return Image the model.
     */
    public function saveImage($name = 'image'){
        $uploadedImg=CUploadedFile::getInstance($this->owner,$name);
        if(isset($uploadedImg)){
            if (!is_dir(Yii::app()->basePath.$this->path.$this->owner->id))
                mkdir(Yii::app()->basePath.$this->path.$this->owner->id);
            $uploadedImg->saveAs(Yii::app()->basePath.$this->path.$this->owner->id.'/'.$this->owner->$name);

            if(strpos($this->path,'HomePageBanners') && ( is_file(Yii::app()->basePath.$this->path.$this->owner->id.'/'.$this->owner->$name))){
                $image = Yii::app()->image->load(Yii::app()->basePath.$this->path.$this->owner->id.'/'.$this->owner->$name);
                $image->resize(940, 326);
                $image->save(Yii::app()->basePath.$this->path.$this->owner->id.'/'.$this->owner->$name);
            }
            return $this->owner->$name;
        }
        return false;
    }

    /**
     * @param $dirPath
     * @return int
     * @throws InvalidArgumentException
     */
    public function deleteImage($dirPath){
        /** @var $dirPath string */
        if (! is_dir($dirPath)) {
            if(is_file($dirPath)){
                unlink($dirPath);
            }else{
                return 0;
                throw new InvalidArgumentException("$dirPath must be a directory");
            }
            return 0;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteImage($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}