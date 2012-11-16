<?php

/**
 * This is the model class for table "market_daily".
 *
 * The followings are the available columns in table 'market_daily':
 * @property integer $id
 * @property string $date_recorded
 * @property string $ticker
 * @property double $close_price
 */
class MarketDaily extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarketDaily the static model class
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
		return 'market_daily';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_recorded, ticker, close_price', 'required'),
			array('close_price', 'numerical'),
			array('ticker', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_recorded, ticker, close_price', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'date_recorded' => 'Date Recorded',
			'ticker' => 'Ticker',
			'close_price' => 'Close Price',
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
		$criteria->compare('date_recorded',$this->date_recorded,true);
		$criteria->compare('ticker',$this->ticker,true);
		$criteria->compare('close_price',$this->close_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}