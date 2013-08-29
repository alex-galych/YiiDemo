<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/**
 * This is the model class for table "Logging".
 *
 * The followings are the available columns in table 'Logging':
 * @property integer $id
 * @property string $sessionId
 * @property string $visitTime
 * @property string $url
 * @property string $visitedPageCount
 * @property string $startTime
 * @property string $secondsOnPage
 * @property string $finishTime
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */
class Logging extends CActiveRecord
{

    public $visitedPageCount;
    public $startTime;
    public $sessionTime;
    public $secondsOnPage;
    public $finishTime;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Logging the static model class
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
		return 'Logging';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sessionId', 'length', 'max'=>50),
			array('url', 'safe'),
			array('url', 'checkValidUrl'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sessionId, visitTime, url', 'safe', 'on'=>'search'),
			array('visitedPageCount, startTime, sessionTime, secondsOnPage, finishTime', 'safe', 'on'=>'search'),
		);
	}

    public function checkValidUrl($attribute, $params){
        foreach(array('.ico','.js','.css','site/captcha', 'site/logout') as $str){
            if( strpos($this->$attribute,$str,count($this->$attribute) - count($str)) !== false || strpos($this->$attribute,'admin/',0) !== false)
                $this->addError($attribute, 'This '.$attribute.' have wrong format!');
        }
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
			'sessionId' => 'Session',
			'visitTime' => 'Visit Time',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('sessionId',$this->sessionId,true);
		$criteria->compare('visitTime',$this->visitTime,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Retrieves a visited page url.
     * @return error code.
     */
    public function visitPageLog($page_url){
        $this->url = $page_url;
        $this->sessionId = Yii::app()->session->getSessionID();
        $this->save();
        return $this->getErrors();
    }

    /**
     * @return CActiveDataProvider list of sessions.
     */
    public function getAllSessions(){
        /*
            SELECT `sessionId`, COUNT(`id`) AS 'Visited Page', MIN(`visitTime`) AS 'Start Time',
                    MAX(`visitTime`) AS 'Finish Time',
                    TIMESTAMPDIFF(SECOND,MIN(`visitTime`), MAX(`visitTime`)) AS 'Session time',
                    COUNT(`id`) / TIMESTAMPDIFF(SECOND,MIN(`visitTime`), MAX(`visitTime`)) AS 'Second per Page'
            FROM  `Logging`
            GROUP BY  `sessionId`
            ORDER BY  `sessionId` DESC;
        */
        $dataProvider = new CActiveDataProvider('Logging',
            array(
                'criteria' => array(
                    'select' => "sessionId, COUNT(id) visitedPageCount,
                                 MIN(visitTime) startTime,
                                 MAX(visitTime) finishTime,
                                 TIMESTAMPDIFF( SECOND,MIN(visitTime) , MAX(visitTime) ) sessionTime,
                                 TIMESTAMPDIFF( SECOND,MIN(visitTime) , MAX(visitTime) ) / COUNT(id) secondsOnPage",
                    'group' => 'sessionId',
                    'order'=> 'sessionId ASC',
                    'condition' => '',
                ),
                'pagination'=>array(
                    'pageSize'=>40,
                ),
            )
        );
        return $dataProvider;
    }

    /**
     * Get session infor from session id
     * Retrive a session id
     * @return CActiveDataProvider visited pages for session.
     */
    public function getSessionInfo($sessionId){
        /*
            SELECT `url`,`visitTime`, TIMESTAMPDIFF(SECOND,visitTime,
                    (   SELECT `visitTime`
                        FROM `Logging`
                        WHERE `sessionId` = '8retm5f2v468mmhqnf62jpbcn5'
                              AND `visitTime` > `log`.`visitTime` AND `url` <> `log`.`url`
                        ORDER BY  `visitTime` ASC
                        LIMIT 1
                    )
            ) AS 'secondsOnPage'
            FROM  `Logging` AS `log`
            WHERE `sessionId` = '8retm5f2v468mmhqnf62jpbcn5'
            ORDER BY  `visitTime` ASC;
        */
        $dataProvider = new CActiveDataProvider('Logging',
            array(
                'criteria' => array(
                    'select' => "url, visitTime",
                    'group' => '',
                    'order'=> 'visitTime ASC',
                    'condition' => "sessionId = :sessionId",
                    'params'    => array( ':sessionId' => $sessionId )
                ),
                'pagination'=>array(
                    'pageSize'=>40,
                ),
            )
        );


        $sessionData = $dataProvider->getData();
        foreach($sessionData as $key=>$value){
            if( isset($sessionData[$key+1]->visitTime) ){
                $sessionData[$key]->secondsOnPage = strtotime($sessionData[$key+1]->visitTime) - strtotime($sessionData[$key]->visitTime);
            }else{
                $sessionData[$key]->secondsOnPage = 'last page';
            }
        }
        return $dataProvider;
    }

    /**
     * Retrive a session id and delete session with this id
     */
    public function deleteSessionItem($sessionId){
        $this->deleteAll('`sessionId` = :sessionId',array(
            ':sessionId'=>$sessionId,
        ));
    }
}
