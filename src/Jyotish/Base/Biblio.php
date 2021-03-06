<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Base;

/**
 * Biblio data class.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class Biblio {
    /**
     * Brihat Parashara Hora Shastra
     */
    const BOOK_BPHS = 'bphs';
    /**
     * Upadesha Sutras
     */
    const BOOK_US = 'us';
    /**
     * Brihat Jataka
     */
    const BOOK_BJ = 'bj';
    /**
     * Brihat Samhita
     */
    const BOOK_BS = 'bs';
    /**
     * Saravali
     */
    const BOOK_SA = 'sa';
    /**
     * Satya Jatakam
     */
    const BOOK_SJ = 'sj';
    /**
     * Uttara Kalamritam
     */
    const BOOK_UK = 'uk';
    /**
     * Sarvarth Chintamani
     */
    const BOOK_SC = 'sc';
    /**
     * Phaladeepika
     */
    const BOOK_PH = 'ph';
    /**
     * Jataka Parijata
     */
    const BOOK_JP = 'jp';
    /**
     * Srimad-Bhagavatam
     */
    const BOOK_SB = 'sb';
    /**
     * Bhavishya Purana
     */
    const BOOK_BP = 'bp';
    /**
     * Surya Siddhanta
     */
    const BOOK_SS = 'ss';
    
    /**
     * Parashara
     */
    const AUTHOR_PARASHARA = 'parashara';
    /**
     * Jaimini
     */
    const AUTHOR_JAIMINI = 'jaimini';
    /**
     * Varahamihira
     */
    const AUTHOR_VARAHAMIHIRA = 'varahamihira';
    
    /**
     * Common
     */
    const COMMON = 'common';
    
    /**
     * List of literatures.
     * 
     * @var array
     */
    static public $book = array(
        self::BOOK_BPHS => 'Brihat Parashara Hora Shastra',
        self::BOOK_US => 'Upadesha Sutras',
        self::BOOK_BJ => 'Brihat Jataka',
        self::BOOK_BS => 'Brihat Samhita',
        self::BOOK_SA => 'Saravali',
        self::BOOK_SJ => 'Satya Jatakam',
        self::BOOK_UK => 'Uttara Kalamritam',
        self::BOOK_SC => 'Sarvarth Chintamani',
        self::BOOK_PH => 'Phaladeepika',
        self::BOOK_JP => 'Jataka Parijata',
        self::BOOK_SB => 'Srimad-Bhagavatam',
        self::BOOK_BP => 'Bhavishya Purana',
        self::BOOK_SS => 'Surya Siddhanta',
    );
}
