<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Burried_People()
 * @method static static BurBasic_Needsried()
 * @method static static Clothing()
 * @method static static Response_Centers()
 * @method static static Shelters()
 * @method static static Transportation()
 * @method static static Safe_Centers()
 * @method static static Dialysis()
 * @method static static Medical_Centers()
 * @method static static Volunteers()
 * @method static static Other()
 */
final class CaseType extends Enum
{
    const Burried_People =   1;
    const Basic_Needs =   2;
    const Clothing = 3;
    const Response_Centers =   4;
    const Shelters =   5;
    const Transportation = 6;
    const Safe_Centers =   7;
    const Dialysis =   8;
    const Medical_Centers = 9;
    const Volunteers =   10;
    const Other = 11;

    public static $transalations = [
        self::Burried_People => 'اشخاص عالقين تحت الانقاض',
        self::Basic_Needs => 'مراكز يتوفر فيها حاجات اساسية مثل الطعام والشراب',
        self::Clothing => 'مراكز يتوفر فيها ملابس وتدفئة',
        self::Response_Centers => 'مراكز استجابة، فرق تطوعية',
        self::Shelters => 'مراكز ايواء',
        self::Transportation => 'مراكز يتوفر فيها مواصلات',
        self::Safe_Centers => 'مراكز أمنة',
        self::Dialysis => 'مراكز غسيل كلية',
        self::Medical_Centers => 'مراكز ونقاط طبية',
        self::Volunteers => 'تقديم المساعدة والتطوع',
        self::Other => 'أخرى',
    ];

    public function getTranslation(){
        return data_get(self::$transalations, $this->value);
    }

    public static function asTranslatedSelectArray(): array
    {
        $translatedSelectArray = [];
        
        foreach (self::getInstances() as $type) {
            $translatedSelectArray[$type->value] = $type->getTranslation();
        }

        return $translatedSelectArray;
    }
}
