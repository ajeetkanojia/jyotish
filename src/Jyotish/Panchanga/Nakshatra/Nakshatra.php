<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Panchanga\Nakshatra;

use Jyotish\Base\Utils;

/**
 * Class with Nakshatra names and attributes.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class Nakshatra {
    /**
     * Fixed constellation
     */
    const TYPE_DHRUVA = 'dhruva';
    /**
     * Movable constellation
     */
    const TYPE_CHARANA = 'charana';
    /**
     * Sharp & Horrible constellation
     */
    const TYPE_TIKSHNA = 'tikshna';
    /**
     * Delicate & Friendly constellation
     */
    const TYPE_MRIDU = 'mridu';
    /**
     * Mixed constellation
     */
    const TYPE_SADHARANA = 'sadharana';
    /**
     * Cruel constellation
     */
    const TYPE_UGRA = 'ugra';
    /**
     * Small constellation
     */
    const TYPE_KSHIPRA = 'kshipra';

    const ENERGY_SRISHTI = 'srishti';
    const ENERGY_STHITI = 'sthiti';
    const ENERGY_LAYA = 'laya';

    const LIFT_AROHA = 'aroha';
    const LIFT_AVAROHA = 'avaroha';

    const LIMB_KANTHA = 'kantha';
    const LIMB_KATI = 'kati';
    const LIMB_PADA = 'pada';
    const LIMB_SHIRO = 'shiro';
    const LIMB_NABHI = 'nabhi';

    /**
     * Array of all nakshatras.
     * 
     * @var array 
     */
    static public $nakshatra = array(
        1 => 'Ashwini',
        2 => 'Bharani',
        3 => 'Krittika',
        4 => 'Rohini',
        5 => 'Mrigashirsha',
        6 => 'Ardra',
        7 => 'Punarvasu',
        8 => 'Pushya',
        9 => 'Ashlesha',
        10 => 'Magha',
        11 => 'Poorva Phalguni',
        12 => 'Uttara Phalguni',
        13 => 'Hasta',
        14 => 'Chitra',
        15 => 'Swati',
        16 => 'Vishakha',
        17 => 'Anuradha',
        18 => 'Jyeshtha',
        19 => 'Moola',
        20 => 'Purva Ashadha',
        21 => 'Uttara Ashadha',
        22 => 'Shravana',
        23 => 'Dhanishta',
        24 => 'Shatabhisha',
        25 => 'Purva Bhadrapada',
        26 => 'Uttara Bhadrapada',
        27 => 'Revati',
        28 => 'Abhijit'
    );

    /**
     * Array of navatara (nine stars).
     * 
     * @var array 
     */
    static public $navatara = array(
        1 => 'Janma',
        2 => 'Sampat',
        3 => 'Vipat',
        4 => 'Kshema',
        5 => 'Pratyak',
        6 => 'Saadhana',
        7 => 'Naidhana',
        8 => 'Mitra',
        9 => 'Atimitra'
    );

    /**
     * Devanagari title 'nakshatra' in transliteration.
     * 
     * @var array
     * @see Jyotish\Alphabet\Devanagari
     */
    static public $translit = ['na','ka','virama','ssa','ta','virama','ra'];


    /**
     * Returns the requested instance of nakshatra class.
     * 
     * @param int $key The number of nakshatra
     * @param null|array $options Options to set (optional)
     * - `withAbhijit`: with Abhijit
     * @return the requested instance of nakshatra class
     * @throws Exception\InvalidArgumentException
     */
    static public function getInstance($key, array $options = null)
    {
        if (!array_key_exists($key, self::$nakshatra)) {
            throw new \Jyotish\Panchanga\Exception\InvalidArgumentException("Nakshatra with the number '$key' does not exist.");
        }

        $nakshatraClass = 'Jyotish\\Panchanga\\Nakshatra\\Object\\N' . $key;
        $nakshatraObject = new $nakshatraClass($options);

        return $nakshatraObject;
    }

    /**
     * Returns the list of nakshatras.
     * 
     * @param bool $withAbhijit
     * @return array
     */
    static public function nakshatraList($withAbhijit = false)
    {
        $nakshatras = self::$nakshatra;

        if($withAbhijit){
            $result = 
                array_slice($nakshatras, 0, 21, true) +
                array_slice($nakshatras, -1, 1, true) + 
                array_slice($nakshatras, 21, 6, true); 
        }else{
            unset($nakshatras[28]);
            $result = $nakshatras;
        }
        return $result;
    }
    
    /**
     * Returns the list of navataras for nakshatra. Will be very useful when 
     * choosing Muhurta.
     * 
     * @param string $nakshatraKey Nakshatra key
     * @return array
     */
    static public function nakshatraNavatara($nakshatraKey){
        if (!array_key_exists($nakshatraKey, self::nakshatraList())) {
            throw new \Jyotish\Panchanga\Exception\InvalidArgumentException("Nakshatra with the number '$nakshatraKey' does not exist.");
        }
        
        $nakshatas = Utils::shiftArray(self::nakshatraList(), $nakshatraKey, true);

        $number = 1;
        $block = 1;
        
        foreach ($nakshatas as $key => $name){
            $navataras[$key] = [
                'block' => $block,
                'number' => $number,
                'name' => self::$navatara[$number]
            ];
            
            $number++;
            if($number > 9){
                $block += 1;
                $number = 1;
            }
        }
        
        return $navataras;
    }
}