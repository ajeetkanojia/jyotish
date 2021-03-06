<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Tattva;

/**
 * Class of jiva data.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class Jiva {
    const GENDER_MALE   = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_NEUTER = 'neuter';

    /**
     * Two legged
     */
    const TYPE_NARA     = 'nara';
    /**
     * Four legged
     */
    const TYPE_PASU     = 'pasu';
    /**
     * Aquatic
     */
    const TYPE_JALA     = 'jala';
    /**
     * Insect
     */
    const TYPE_KITA     = 'kita';
    /**
     * Wild
     */
    const TYPE_VANA     = 'vana';

    /**
     * Vasya jiva.
     * 
     * @var array
     */
    static public $typeVasya = array(
        self::TYPE_PASU,
        self::TYPE_NARA,
        self::TYPE_JALA,
        self::TYPE_VANA,
        self::TYPE_KITA
    );
}
