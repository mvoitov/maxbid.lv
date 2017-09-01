<?php

/**
 *
 * @author Ivan Teleshun <teleshun.ivan@gmail.com>
 * @link http://molotoksoftware.com/
 * @copyright 2016 MolotokSoftware
 * @license GNU General Public License, version 3
 */

/**
 *
 * This file is part of MolotokSoftware.
 *
 * MolotokSoftware is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MolotokSoftware is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with MolotokSoftware.  If not, see <http://www.gnu.org/licenses/>.
 */
class Country extends CActiveRecord
{
    public function tableName()
    {
        return 'country';
    }

    public function defaultScope()
    {
        return array(
            'alias' => 'ctr',
            'order' => 'ctr.order_weight DESC, ctr.name ASC'
        );
    }

    public function rules()
    {
        return array(
            array('name', 'required'),
            array('id_country, name', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'regions' => array(self::HAS_MANY, 'Region', 'id_country'),
            'cities' => array(self::HAS_MANY, 'City', 'id_country')
        );
    }

    public function attributeLabels()
    {
        return array(
            'id_country' => 'ID',
            'name' => 'Страна',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id_country', $this->id_country);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getAllCountries()
    {
        $countries = Yii::app()->cache ? Yii::app()->cache->get('country') : false;

        if ($countries === false) {
            $countries = Country::model()->findAll();
            if (Yii::app()->cache) {
                Yii::app()->cache->set('country', $countries, Yii::app()->params['cache_duration']);
            }
        }

        for($i = 0;$i<sizeof($countries);$i++){
            $countries[$i]['name'] = self::auto_translate($countries[$i]['name']);
        }

        return $countries;
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function auto_translate($text)
    {
        $key = 'trnsl.1.1.20170901T085332Z.6c3b05e192d0d0a1.f0edb873c622a27173cf3effdb0bebb4c8113822';
        $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $key . '&text=' . urlencode($text) . '&lang=ru-en';
        $data = file_get_contents($url);
        $result = json_decode($data, true);
        return $result['text'][0];
    }

    public static function getNameById($id)
    {
        $cityName = Yii::app()
            ->getDb()
            ->createCommand()
            ->select('name')
            ->from(self::model()->tableName())
            ->where('id_country = :id_country', [':id_country' => (int)$id])
            ->queryScalar();
        return self::auto_translate($cityName);
    }
}
