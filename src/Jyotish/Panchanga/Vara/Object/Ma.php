<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Panchanga\Vara\Object;

use Jyotish\Panchanga\Vara\Vara;
use Jyotish\Graha\Graha;

/**
 * Mangalavar class.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class Ma extends VaraObject {
    /**
     * Vara key.
     * 
     * @var string
     */
    protected $varaKey = Graha::KEY_MA;
    
    /**
     * Vara name.
     * 
     * @var string
     */
    protected $varaName = Vara::NAME_MA;

    public function __construct($options = null) {
        return $this;
    }
}