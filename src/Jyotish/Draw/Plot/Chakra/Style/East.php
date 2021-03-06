<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Draw\Plot\Chakra\Style;

use Jyotish\Graha\Graha;
use Jyotish\Base\Data;

/**
 * Class for generate East chakra.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
final class East extends AbstractChakra {

    protected $graha = Graha::KEY_SY;
    
    protected $bhavaPoints = array(
        1  => [1, 0,   2, 0,   2, 1,   1, 1],
        2  => [0, 0,   1, 0,   1, 1],
        3  => [0, 0,   1, 1,   0, 1],
        4  => [0, 1,   1, 1,   1, 2,   0, 2],
        5  => [0, 3,   0, 2,   1, 2],
        6  => [0, 3,   1, 2,   1, 3],
        7  => [1, 2,   2, 2,   2, 3,   1, 3],
        8  => [2, 2,   3, 3,   2, 3],
        9  => [2, 2,   3, 2,   3, 3],
        10 => [2, 1,   3, 1,   3, 2,   2, 2],
        11 => [3, 0,   3, 1,   2, 1],
        12 => [2, 0,   3, 0,   2, 1],
    );

    public function getBhavaPoints($size, $leftOffset = 0, $topOffset = 0) {
        foreach ($this->bhavaPoints as $bhavaKey => $bhavaPoints) {
            foreach ($bhavaPoints as $point => $value) {
                if ($value != 0) {
                    $myPoints[$bhavaKey][] = $point % 2 ? $value * round($size / 3) + $topOffset : $value * round($size / 3) + $leftOffset;
                } else {
                    $myPoints[$bhavaKey][] = $point % 2 ? $topOffset : $leftOffset;
                }
            }
        }

        return $myPoints;
    }

    public function getRashiLabelPoints(Data $Data, array $options) {
        $ratio = round($options['chakraSize'] / 3);
        $offsetBorder = $options['offsetBorder'];
        $offsetCorner3 = $offsetBorder * 3;
        $offsetCorner4 = $offsetBorder * 4;
        $rashis = $Data->getRashiInBhava();

        foreach ($rashis as $rashi => $bhava) {
            $bhava = $rashi;

            if ($bhava == 1) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][6] * $ratio + $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][7] * $ratio - $offsetBorder;
                $myPoints[$rashi]['align'] = 'left';
                $myPoints[$rashi]['valign'] = 'bottom';
            } elseif ($bhava == 2) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][4] * $ratio - $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][5] * $ratio - $offsetCorner3;
                $myPoints[$rashi]['align'] = 'right';
                $myPoints[$rashi]['valign'] = 'bottom';
            } elseif ($bhava == 3) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][2] * $ratio - $offsetCorner4;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][3] * $ratio - $offsetBorder;
                $myPoints[$rashi]['align'] = 'right';
                $myPoints[$rashi]['valign'] = 'bottom';
            } elseif ($bhava == 4) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][4] * $ratio - $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][5] * $ratio - $offsetBorder;
                $myPoints[$rashi]['align'] = 'right';
                $myPoints[$rashi]['valign'] = 'bottom';
            } elseif ($bhava == 5) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][4] * $ratio - $offsetCorner4;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][5] * $ratio + $offsetBorder;
                $myPoints[$rashi]['align'] = 'right';
                $myPoints[$rashi]['valign'] = 'top';
            } elseif ($bhava == 6) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][2] * $ratio - $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][3] * $ratio + $offsetCorner3;
                $myPoints[$rashi]['align'] = 'right';
                $myPoints[$rashi]['valign'] = 'top';
            } elseif ($bhava == 7) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][2] * $ratio - $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][3] * $ratio + $offsetBorder;
                $myPoints[$rashi]['align'] = 'right';
                $myPoints[$rashi]['valign'] = 'top';
            } elseif ($bhava == 8) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][1] * $ratio + $offsetCorner3;
                $myPoints[$rashi]['align'] = 'left';
                $myPoints[$rashi]['valign'] = 'top';
            } elseif ($bhava == 9) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetCorner4;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][1] * $ratio + $offsetBorder;
                $myPoints[$rashi]['align'] = 'left';
                $myPoints[$rashi]['valign'] = 'top';
            } elseif ($bhava == 10) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][1] * $ratio + $offsetBorder;
                $myPoints[$rashi]['align'] = 'left';
                $myPoints[$rashi]['valign'] = 'top';
            } elseif ($bhava == 11) {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][4] * $ratio + $offsetCorner4;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][5] * $ratio - $offsetBorder;
                $myPoints[$rashi]['align'] = 'left';
                $myPoints[$rashi]['valign'] = 'bottom';
            } else {
                $myPoints[$rashi]['x'] = $this->bhavaPoints[$bhava][4] * $ratio + $offsetBorder;
                $myPoints[$rashi]['y'] = $this->bhavaPoints[$bhava][5] * $ratio - $offsetCorner3;
                $myPoints[$rashi]['align'] = 'left';
                $myPoints[$rashi]['valign'] = 'bottom';
            }
        }
        return $myPoints;
    }

    public function getBodyLabelPoints(Data $Data, array $options) {
        $ratio = round($options['chakraSize'] / 3);
        $offsetBorder = $options['offsetBorder'];
        $offsetCorner = $offsetBorder * 4;
        $offsetSum = array();
        $bodies = $Data->getBodyInRashi();

        foreach ($bodies as $graha => $bhava) {
            if(!isset($offsetSum[$bhava])) $offsetSum[$bhava] = 0;

            if ($bhava == 1 or $bhava == 4 or $bhava == 7 or $bhava == 10) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][6] * $ratio + $offsetBorder + $offsetSum[$bhava];
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][7] * $ratio - $ratio / 2;
                $myPoints[$graha]['align'] = 'left';
                $myPoints[$graha]['valign'] = 'middle';
                $offsetSum[$bhava] += $options['widthOffsetLabel'];
            } elseif ($bhava == 2) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetCorner + $offsetSum[$bhava];
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][1] * $ratio + $offsetBorder;
                $myPoints[$graha]['align'] = 'left';
                $myPoints[$graha]['valign'] = 'top';
                $offsetSum[$bhava] += $options['widthOffsetLabel'];
            } elseif ($bhava == 3) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetBorder;
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][1] * $ratio + $offsetCorner + $offsetSum[$bhava];
                $myPoints[$graha]['align'] = 'left';
                $myPoints[$graha]['valign'] = 'top';
                $offsetSum[$bhava] += $options['heightOffsetLabel'];
            } elseif ($bhava == 5) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetBorder;
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][1] * $ratio - $offsetCorner - $offsetSum[$bhava];
                $myPoints[$graha]['align'] = 'left';
                $myPoints[$graha]['valign'] = 'bottom';
                $offsetSum[$bhava] += $options['heightOffsetLabel'];
            } elseif ($bhava == 6) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][0] * $ratio + $offsetCorner + $offsetSum[$bhava];
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][1] * $ratio - $offsetBorder;
                $myPoints[$graha]['align'] = 'left';
                $myPoints[$graha]['valign'] = 'bottom';
                $offsetSum[$bhava] += $options['widthOffsetLabel'];
            } elseif ($bhava == 8) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][2] * $ratio - $offsetCorner - $offsetSum[$bhava];
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][3] * $ratio - $offsetBorder;
                $myPoints[$graha]['align'] = 'right';
                $myPoints[$graha]['valign'] = 'bottom';
                $offsetSum[$bhava] += $options['widthOffsetLabel'];
            } elseif ($bhava == 9) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][4] * $ratio - $offsetBorder;
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][5] * $ratio - $offsetCorner - $offsetSum[$bhava];
                $myPoints[$graha]['align'] = 'right';
                $myPoints[$graha]['valign'] = 'bottom';
                $offsetSum[$bhava] += $options['heightOffsetLabel'];
            } elseif ($bhava == 11) {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][0] * $ratio - $offsetBorder;
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][1] * $ratio + $offsetCorner + $offsetSum[$bhava];
                $myPoints[$graha]['align'] = 'right';
                $myPoints[$graha]['valign'] = 'top';
                $offsetSum[$bhava] += $options['heightOffsetLabel'];
            } else {
                $myPoints[$graha]['x'] = $this->bhavaPoints[$bhava][2] * $ratio - $offsetCorner - $offsetSum[$bhava];
                $myPoints[$graha]['y'] = $this->bhavaPoints[$bhava][3] * $ratio + $offsetBorder;
                $myPoints[$graha]['align'] = 'right';
                $myPoints[$graha]['valign'] = 'top';
                $offsetSum[$bhava] += $options['widthOffsetLabel'];
            }
        }
        return $myPoints;
    }
}