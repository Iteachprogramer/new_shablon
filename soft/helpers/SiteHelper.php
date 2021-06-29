<?php

namespace soft\helpers;

use Yii;

/**
 * Class SiteHelper
 * Saytda ishlatish ba'zi funksiyalar
 * @package soft\components
 */
class SiteHelper
{


    public static function setLanguage()
    {
        $params = Yii::$app->params;
        $lang = Yii::$app->request->get($params['languageParam'], $params['defaultLanguage']);
        if (!array_key_exists($lang, $params['languages'])) {
            $lang = $params['defaultLanguage'];
        }
        Yii::$app->language = $lang;
    }

    public static function clearPhoneNumber($phoneNumber = '')
    {
        $tel = trim($phoneNumber);
        return strtr($tel, [
            "+" => '',
            " " => '',
            "(" => '',
            ")" => '',
            "-" => '',
        ]);
    }

    /**
     * Telefon raqamdan davlat kodi (+998) ni olib tashlaydi
     * @param string $phoneNumber
     * @return false|string|null
     */
    public static function removeCountryCode($phoneNumber = '')
    {
        if (empty($phonenumber)) {
            return null;
        }

        $phoneNumber = self::clearPhoneNumber($phoneNumber);

        $length = strlen($phoneNumber);
        if ($length > 9) {
            $start = $length - 9;
            $phoneNumber = substr($phoneNumber, $start);
        }

        return $phoneNumber;
    }

    /**
     * Sistemani aniqlash
     * @return string
     */
    public static function getOsName()
    {
        return strtoupper(substr(PHP_OS, 0, 3));
    }


    /**
     * @return string
     */
    public static function userDefaultAvatar()
    {
        return "/images/user-default-avatar.png";
    }

    public static function favicon()
    {
        return '<link href="' . Yii::$app->acf->getValue('site_favicon') . '" rel="shortcut icon">';
    }

    public static function siteTitle()
    {
        return Yii::$app->acf->getValue('site_title');
    }

    public static function siteDescription()
    {
        return Yii::$app->acf->getValue('site_description');
    }

    public static function metaTitle()
    {
        return ArrayHelper::getValue(Yii::$app->view->params, 'metaTitle', Yii::$app->acf->getValue('meta_title'));
    }
    public static function metaDescription()
    {
        return ArrayHelper::getValue(Yii::$app->view->params, 'metaDescription', Yii::$app->acf->getValue('meta_description'));
    }
    public static function metaKeywords()
    {
        return ArrayHelper::getValue(Yii::$app->view->params, 'metaKeywords', Yii::$app->acf->getValue('meta_keywords'));
    }
    public static function metaImage()
    {
        return ArrayHelper::getValue(Yii::$app->view->params, 'metaImage', Yii::$app->acf->getValue('meta_image'));
    }
}


?>