<?php
/**
 * @link      http://github.com/kunjara/jyotish for the canonical source repository
 * @license   GNU General Public License version 2 or later
 */

namespace Jyotish\Graha\Object;

use Jyotish\Base\Biblio;
use Jyotish\Base\Object;
use Jyotish\Graha\Graha;
use Jyotish\Graha\Avastha;
use Jyotish\Rashi\Rashi;
use Jyotish\Bhava\Bhava;
use Jyotish\Ganita\Math;
use Jyotish\Varga\Varga;
use Jyotish\Tattva\Jiva\Nara\Deva;

/**
 * Parent class for graha objects.
 *
 * @author Kunjara Lila das <vladya108@gmail.com>
 */
class GrahaObject extends Object {
    /**
     * Options of graha object.
     * 
     * @var array
     */
    protected $options = array(
        'relationSame' => false,
        'relationChaya' => '',
        'bhagaAstangata' => 6,
        'bhagaMrityu' => Biblio::BOOK_JP,
        'specificRashi' => Biblio::BOOK_BPHS,
        'drishtiRahu' => '',
    );
    
    /**
     * Object type
     * 
     * @var string
     */
    protected $objectType = 'graha';

    /**
     * Unicode of the Graha.
     * 
     * @var string
     */
    protected $grahaUnicode;

    /**
     * Amsha of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 2, Verse 2.
     */
    protected $grahaAmsha;


    /**
     * Avatara of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 2, Verse 5-7.
     */
    protected $grahaAvatara;

    /**
     * Devanagari graha title in transliteration.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 10.
     * @see Jyotish\Alphabet\Devanagari
     */
    protected $grahaTranslit;

    /**
     * Character of the Graha (natural beneficence).
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 11.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 5.
     */
    protected $grahaCharacter;
    
    /**
     * Colors of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 16-17.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 4-5.
     */
    protected $grahaColor = array();

    /**
     * Deva of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 18.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 5.
     */
    protected $grahaDeva;

    /**
     * Gender of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 19.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 6.
     */
    protected $grahaGender;

    /**
     * Bhuta of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 20.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 6.
     */
    protected $grahaBhuta;

    /**
     * Varna of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 21.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 7.
     */
    protected $grahaVarna;

    /**
     * Guna of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 22.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 7.
     */
    protected $grahaGuna;

    /**
     * Dhatu of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 31.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 11.
     */
    protected $grahaDhatu;

    /**
     * Kala of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 33.
     */
    protected $grahaKala;

    /**
     * Rasa of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 34.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 14.
     */
    protected $grahaRasa;

    /**
     * Ritu of the Graha.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 45-46.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 12.
     */
    protected $grahaRitu;
    /**
     * Graha basis.
     * 
     * @var string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 47.
     */
    protected $grahaBasis;

    /**
     * Graha exaltation.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 49-50.
     * @see Varahamihira. Brihat Jataka. Chapter 1, Verse 13.
     */
    protected $grahaUcha = array();

    /**
     * Graha debilitation.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 49-50.
     * @see Varahamihira. Brihat Jataka. Chapter 1, Verse 13.
     */
    protected $grahaNeecha = array();

    /**
     * Graha mooltrikon.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 51-54.
     * @see Varahamihira. Brihat Jataka. Chapter 1, Verse 14.
     */
    protected $grahaMool = array();

    /**
     * Own sign of the graha.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 51-54.
     */
    protected $grahaSwa = array();

    /**
     * Natural relationships.
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 55.
     */
    protected $grahaRelation = array();

    /**
     * Graha disha
     * 
     * @var string
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 5.
     */
    protected $grahaDisha;

    /**
     * Graha drishti
     * 
     * @var array
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 26, Verse 2-5.
     * @see Varahamihira. Brihat Jataka. Chapter 2, Verse 13.
     */
    protected $grahaDrishti = array();

    /**
     * Prakriti of graha
     * 
     * @var array
     */
    protected $grahaPrakriti;
    protected $grahaAgeMaturity;
    protected $grahaAgePeriod = array(
        'start',
        'end'
    );
    protected $grahaLongitudeSpeedAvg = array();

    /**
     * Get bhava, where graha is positioned or owned.
     * 
     * @param null|string $which Which bhava to get (optional)
     * @return null|int|array
     */
    public function getBhava($which = null)
    {
        $this->checkEnvironment();

        $getBhava = function($rashi){
            $bhava = 0;
            do{
                $bhava++;
                $bhavaRashi = $this->ganitaData['bhava'][$bhava]['rashi'];
            }
            while($rashi <> $bhavaRashi);
            return $bhava;
        };
        
        switch($which){
            case Rashi::GRAHA_SWA:
                $swa = $this->grahaSwa;
                
                if(isset($swa['positive'])){
                    $bhava[] = $getBhava($swa['positive']['rashi']);
                    $bhava[] = $getBhava($swa['negative']['rashi']);
                }else{
                    $bhava = is_null($swa[0]['rashi']) ? null : $getBhava($swa[0]['rashi']);
                }
                break;
            case null:
            default:
                $grahaRashi = $this->ganitaData['graha'][$this->objectKey]['rashi'];
                $bhava = $getBhava($grahaRashi);
        }

        return $bhava;
    }

    /**
     * Get ruler of the bhava, where graha is positioned.
     * 
     * @return string
     */
    public function getDispositor()
    {
        $this->checkEnvironment();
        
        $rashi = $this->ganitaData['graha'][$this->objectKey]['rashi'];
        $Rashi = Rashi::getInstance($rashi);
        
        return $Rashi->rashiRuler;
    }
    
    /**
     * Get state of the graha, depending on its position in rashi.
     * 
     * @return string
     */
    public function getRashiAvastha()
    {
        $this->checkEnvironment();
        
        $rashi = $this->ganitaData['graha'][$this->objectKey]['rashi'];
        $degree = $this->ganitaData['graha'][$this->objectKey]['degree'];
        
        if($rashi == $this->grahaUcha['rashi']){
            if($this->objectKey == Graha::KEY_CH or $this->objectKey == Graha::KEY_BU){
                if($degree >= 0 and $degree < $this->grahaUcha['degree']) return Rashi::GRAHA_UCHA;
            }else{
                return Rashi::GRAHA_UCHA;
            }
        }
        
        if($rashi == $this->grahaNeecha['rashi'])
            return Rashi::GRAHA_NEECHA;
        
        if($rashi == $this->grahaMool['rashi'] and $degree >= $this->grahaMool['start'] and $degree < $this->grahaMool['end'])
            return Rashi::GRAHA_MOOL;
        
        foreach ($this->grahaSwa as $key => $value){
            if($rashi == $value['rashi'] and $degree >= $value['start'] and $degree < $value['end'])
                return Rashi::GRAHA_SWA;
        }
        
        $relation = $this->grahaRelation;
        $dispositor = $this->getDispositor();
        switch ($relation[$dispositor]){
            case 1:
                return Rashi::GRAHA_FRIEND;
                break;
            case 0:
                return Rashi::GRAHA_NEUTRAL;
                break;
            case -1:
                return Rashi::GRAHA_ENEMY;
        }
    }
    
    /**
     * Get avastha of graha.
     * 
     * @return array
     */
    public function getAvastha()
    {
        $avastha[Avastha::TYPE_BALADI] = $this->getAvasthaBaladi();
        $avastha[Avastha::TYPE_JAGRADI] = $this->getAvasthaJagradi();
        
        return $avastha;
    }
    
    /**
     * Get baladi avastha of graha.
     * 
     * @return string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 45, Verse 3.
     */
    public function getAvasthaBaladi()
    {
        $this->checkEnvironment();
        
        $grahaBhaga = $this->ganitaData['graha'][$this->objectKey]['degree'];
        $grahaRashi = $this->ganitaData['graha'][$this->objectKey]['rashi'];
        
        $avasthaBhaga = $grahaRashi % 2 ? $grahaBhaga : 30 - $grahaBhaga;
        
        switch($avasthaBhaga){
            case ($avasthaBhaga >= 0 and $avasthaBhaga < 6):
                $avastha = Avastha::NAME_BALA;
                break;
            case ($avasthaBhaga >= 6 and $avasthaBhaga < 12):
                $avastha = Avastha::NAME_KUMARA;
                break;
            case ($avasthaBhaga >= 12 and $avasthaBhaga < 18):
                $avastha = Avastha::NAME_YUVA;
                break;
            case ($avasthaBhaga >= 18 and $avasthaBhaga < 24):
                $avastha = Avastha::NAME_VRIDHA;
                break;
            case ($avasthaBhaga >= 24 and $avasthaBhaga < 30):
                $avastha = Avastha::NAME_MRITA;
        }
        return $avastha;
    }
    
    /**
     * Get jagradi avastha of graha.
     * 
     * @return string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 45, Verse 5.
     */
    public function getAvasthaJagradi()
    {
        $rashiAvastha = $this->getRashiAvastha();
        
        switch ($rashiAvastha){
            case Rashi::GRAHA_UCHA:
            case Rashi::GRAHA_MOOL:
            case Rashi::GRAHA_SWA:
                $avastha = Avastha::NAME_JAGRATA;
                break;
            case Rashi::GRAHA_FRIEND:
            case Rashi::GRAHA_NEUTRAL:
                $avastha = Avastha::NAME_SWAPNA;
                break;
            case Rashi::GRAHA_ENEMY:
            case Rashi::GRAHA_NEECHA:
                $avastha = Avastha::NAME_SUSHUPTA;
        }
        return $avastha;
    }

    /**
     * Get graha character depending on what bhava it is (functional beneficence).
     * 
     * @return string
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 34, Verse 2-7.
     */
    public function getBhavaCharacter()
    {
        $bhava = $this->getBhava(Rashi::GRAHA_SWA);
        $bhavaKendra = Bhava::$bhavaKendra;
        array_shift($bhavaKendra);
        
        if(is_int($bhava)){
            if(in_array($bhava, Bhava::$bhavaTrikona)){
                $character = Graha::CHARACTER_SHUBHA;
            }elseif(in_array($bhava, Bhava::$bhavaTrishadaya) or $bhava == 8){
                $character = Graha::CHARACTER_PAPA;
            }elseif(in_array($bhava, $bhavaKendra)){
                $character = Graha::CHARACTER_MISHRA;
            }else{
                $character = $this->getConjunctCharacter();
            }
        }else{
            if($this->isYogakaraka()){
                $character = Graha::CHARACTER_YOGAKARAKA;
            }elseif(Math::arrayInArray($bhava, $bhavaKendra, true)){
                $character = Graha::CHARACTER_KENDRADHI;
            }elseif(
                    (in_array(1, $bhava)) or
                    (Math::arrayInArray($bhava, Bhava::$bhavaParashraya) and Math::arrayInArray($bhava, Bhava::$bhavaTrikona)) or
                    (Math::arrayInArray($bhava, Bhava::$bhavaTrishadaya) and Math::arrayInArray($bhava, Bhava::$bhavaTrikona))
            ){
                $character = Graha::CHARACTER_SHUBHA;
            }elseif(
                    Math::arrayInArray($bhava, Bhava::$bhavaParashraya) or
                    Math::arrayInArray($bhava, Bhava::$bhavaTrishadaya)
            ){
                $character = Graha::CHARACTER_PAPA;
            }else{
                $character = Graha::CHARACTER_MISHRA;
            }
        }
        
        return $character;
    }

    /**
     * Get speed of graha in longitude.
     * 
     * @return float Degrees per day
     */
    public function getLongitudeSpeed()
    {
        $this->checkEnvironment();
        
        return $this->ganitaData['graha'][$this->objectKey]['speed'];
    }
    
    /**
     * Determine if the graha is vargottama (in the same sign in rasi and navamsha).
     * 
     * @return bool
     * @see Venkatesh Sharma. Sarvarth Chintamani. Chapter 1, Verse 50.
     */
    public function isVargottama()
    {
        $this->checkEnvironment();
        
        $d1Data = $this->ganitaData;
        
        $Varga9 = Varga::getInstance('D9');
        $d9Data = $Varga9->getVargaData($d1Data);
        
        if($d1Data['graha'][$this->objectKey]['rashi'] == $d9Data['graha'][$this->objectKey]['rashi'])
            return true;
        else
            return false;
    }
    
    /**
     * Determine if the graha is yogakaraka.
     * 
     * @return boolean
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 34, Verse 13.
     */
    public function isYogakaraka()
    {
        $this->checkEnvironment();
        
        $yogaKarakas = [
            Graha::KEY_MA => [4, 5],
            Graha::KEY_SK => [10, 11],
            Graha::KEY_SA => [2, 7]
        ];
        
        if(array_key_exists($this->objectKey, $yogaKarakas)){
            $lagna = $this->ganitaData['extra'][Graha::KEY_LG]['rashi'];
            $isYogakaraka = in_array($lagna, $yogaKarakas[$this->objectKey]) ? true : false;
            
            return $isYogakaraka;
        }else{
            return false;
        }
    }

    /**
     * Determine if the graha is astangata (combustion).
     * 
     * @return null|bool|array Combustion data
     */
    public function isAstangata()
    {
        $this->checkEnvironment();
        
        if(in_array($this->objectKey, [
            Graha::KEY_SY, Graha::KEY_RA, Graha::KEY_KE
        ])) return null;
        
        $degreeSy = $this->ganitaData['graha'][Graha::KEY_SY]['longitude'];
        $degreeGr = $this->ganitaData['graha'][$this->objectKey]['longitude'];
        
        $distanceGraha = abs($degreeSy - $degreeGr);
        
        if(in_array($this->options['bhagaAstangata'], [Biblio::BOOK_SS, Biblio::BOOK_BJ])){
            $bhagas = Graha::listBhagaAstangata($this->options['bhagaAstangata']);
            
            if(is_array($bhagas[$this->objectKey])){
                $cheshta = $this->getLongitudeSpeed() >= 0 ? Graha::CHESHTA_SAMA : Graha::CHESHTA_VAKRA;
                $distanceCombustion = $bhagas[$this->objectKey][$cheshta];
            }elseif(is_int($bhagas[$this->objectKey])){
                $distanceCombustion = $bhagas[$this->objectKey];
            }else{
                return null;
            }
        }else{
            $distanceCombustion = $this->options['bhagaAstangata'];
        }
        
        if($distanceGraha <= $distanceCombustion){
            $percent = ($distanceCombustion - $distanceGraha) * 100 / $distanceCombustion;
            
            return [
                'distance' => $distanceGraha,
                'combustion' => $distanceCombustion,
                'percent' => $percent,
            ];
        }else{
            return false;
        }
    }
    
    /**
     * Determine if the graha is in mrityu bhaga. Indicate when to mrityu bhaga 
     * remains less than 2 degrees.
     * 
     * @return bool|float Distance to mrityu bhaga
     * @see Vaidyanatha Dikshita. Jataka Parijata. Chapter 1, Verse 57.
     */
    public function isMrityu()
    {
        $this->checkEnvironment();
        
        $rashiGraha = $this->ganitaData['graha'][$this->objectKey]['rashi'];
        $degMrityu = Graha::listBhagaMrityu($this->options['bhagaMrityu'])[$this->objectKey][$rashiGraha];
        $lonMrityu = ($rashiGraha - 1) * 30 + $degMrityu;
        $lonGraha = $this->ganitaData['graha'][$this->objectKey]['longitude'];
        
        $distanceGraha = abs($lonMrityu - $lonGraha);
        
        if($distanceGraha > 2){
            return false;
        }else{
            return $distanceGraha;
        }
    }
    
    /**
     * Determine if the graha is in pushkara bhaga or pushkara navamsha. Indicate 
     * when to pushkara bhaga remains less than 1 degree.
     * 
     * @return bool|int|float Distance to pushkara bhaga
     * @see Vaidyanatha Dikshita. Jataka Parijata. Chapter 1, Verse 58.
     */
    public function isPushkara($type = Graha::PUSHKARA_NAVAMSHA)
    {
        $this->checkEnvironment();
        
        $rashiGraha = $this->ganitaData['graha'][$this->objectKey]['rashi'];
        $degGraha = $this->ganitaData['graha'][$this->objectKey]['degree'];
        $valNavamsha = Math::dmsToDecimal(['d' => 3, 'm' => 20]);
        
        switch ($type){
            case Graha::PUSHKARA_BHAGA:
                $degPushkara = Rashi::$pushkaraBhaga[$rashiGraha];
                $distanceGraha = abs($degGraha - $degPushkara);
                
                if($distanceGraha < 1){
                    return $distanceGraha;
                }else{
                    return false;
                }
                break;
            case Graha::PUSHKARA_NAVAMSHA:
            default:
                $numNavamsha = null;
                for($i = 0; $i <= 1; $i++){
                    $degNavamsha['start'] = (Rashi::$pushkaraNavamsha[$rashiGraha][$i] - 1) * $valNavamsha;
                    $degNavamsha['end'] = $degNavamsha['start'] + $valNavamsha;
                    
                    if($degGraha >= $degNavamsha['start'] and $degGraha < $degNavamsha['end']){
                        $numNavamsha = Rashi::$pushkaraNavamsha[$rashiGraha][$i];
                        break;
                    }
                }
                
                if(!is_null($numNavamsha)){
                    $number = ($rashiGraha - 1) * 9 + $numNavamsha;
                    $navamsha = Math::numberInCycle(1, $number);
                    return $navamsha;
                }else{
                    return false;
                }
        }
    }

    /**
     * Determine if the graha is in planetary war.
     * 
     * @return bool|array
     * @see Surya Siddhanta. Chapter 7, Verse 18-23.
     * @see Varahamihira. Brihat Samhita. Chapter 17.
     * @todo Determine who the winner and loser
     */
    public function isYuddha()
    {
        $this->checkEnvironment();
        
        if(in_array($this->objectKey, [
            Graha::KEY_SY, Graha::KEY_CH, Graha::KEY_RA, Graha::KEY_KE
        ])) return null;
        
        $lonGraha = $this->ganitaData['graha'][$this->objectKey]['longitude'];
        $grahas = Graha::grahaList(Graha::LIST_PANCHA);
        $isYuddha = false;
        
        foreach ($grahas as $key => $name){
            if($key == $this->objectKey) continue;
            
            $distance = abs($lonGraha - $this->ganitaData['graha'][$key]['longitude']);
            if($distance <= 1){
                $isYuddha[$key] = $distance;
            }
        }
        return $isYuddha;
    }

    /**
     * Determine if the graha is gocharastha.
     * 
     * @return int
     * @see Venkatesh Sharma. Sarvarth Chintamani. Chapter 1, Verse 23-24.
     */
    public function isGocharastha()
    {
        $this->checkEnvironment();
        
        $rashiAvastha = $this->getRashiAvastha();
        
        $avasthaGochara = [Rashi::GRAHA_UCHA, Rashi::GRAHA_MOOL, Rashi::GRAHA_SWA];
        $grahaInGochara = in_array($rashiAvastha, $avasthaGochara) ? true : false;
        
        $bhavaDusthana = Bhava::$bhavaDusthana;
        $grahaInDusthana = in_array($this->getBhava(), $bhavaDusthana) ? true : false;
        
        $grahaIsAstangata = $this->isAstangata();
        
        $grahaInNeecha = $rashiAvastha == Rashi::GRAHA_NEECHA ? true : false;
        
        if($grahaInGochara)
            if(!$grahaIsAstangata and !$grahaInDusthana) 
                $result = 1;
            else
                $result = 0;
        elseif($grahaIsAstangata or $grahaInDusthana or $grahaInNeecha)
            $result = -1;
        else
            $result = 0;
        
        return $result;
    }
    
    /**
     * Set graha names.
     * 
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 10.
     */
    protected function setGrahaNames()
    {
        if($this->objectKey != Graha::KEY_RA and $this->objectKey != Graha::KEY_KE){
            $nameDeva = 'name'.$this->objectName;
            $this->objectNames = array_merge(Deva::${$nameDeva}, $this->objectNames);
        }
    }

    /**
     * Set natural relationships.
     * 
     * @param array $options Options to set
     * @see Maharishi Parashara. Brihat Parashara Hora Shastra. Chapter 3, Verse 55.
     */
    protected function setGrahaRelation($options)
    {
        $relationships = array();
        $friendsFromMt = [2, 4, 5, 8, 9, 12];
        $enemiesFromMt = [3, 6, 7, 10, 11];

        $rashiMool = $this->grahaMool['rashi'];
        $rashiUcha = $this->grahaUcha['rashi'];

        $friends = array();
        $R = Rashi::getInstance($rashiUcha);
        $gFriend = $R->rashiRuler;
        if($this->objectKey != $gFriend) $friends[] = $gFriend;

        $relation = function($distance) use($rashiMool){
            foreach($distance as $step){
                $r = Math::numberInCycle($rashiMool, $step);
                $R = Rashi::getInstance((int)$r);
                $gRuler = $R->rashiRuler;

                if($this->objectKey == $gRuler) continue;
                $grahas[] = $gRuler;
            }
            return $grahas;
        };

        $friends = array_unique(array_merge($friends, $relation($friendsFromMt)));
        $enemies = array_unique($relation($enemiesFromMt));

        foreach (Graha::$graha as $key => $name){
            if($this->objectKey == $key) continue;

            if(in_array($key, $friends) and in_array($key, $enemies)){
                $relationships[$key] = 0;
            }elseif(in_array($key, $friends)){
                $relationships[$key] = 1;
            }elseif(in_array($key, $enemies)){
                $relationships[$key] = -1;
            }else{
                $G = Graha::getInstance($key, $options);
                $relationships[$key] = $G->grahaRelation[$this->objectKey];
            }
        }
        $relationships[$this->objectKey] = $options['relationSame'] ? 1 : null;

        $this->grahaRelation = $relationships;
    }

    /**
     * Set exaltation, sebilitation, mooltrikon and own.
     * 
     * @param array $specificRashi
     */
    protected function setGrahaSpecificRashi(array $specificRashi)
    {
        $this->grahaUcha   = [
            'rashi' => $specificRashi['ucha']
        ];
        
        $this->grahaMool   = [
            'rashi' => $specificRashi['mool'],
            'start' => 0,
            'end'   => 30
        ];
        
        if(is_null($specificRashi['swa'])){
            $this->grahaSwa = [
                ['rashi' => null]
            ];
        }else{
            $this->grahaSwa = [
                [
                    'rashi' => $specificRashi['swa'],
                    'start' => 0,
                    'end'   => 30
                ]
            ];
        }
        
        $this->grahaNeecha = [
            'rashi' => $specificRashi['neecha']
        ];
    }
    
    /**
     * Get graha character depending on the conjuntion with the other planets.
     * 
     * @return string
     */
    protected function getConjunctCharacter()
    {
        $benefic = 0;
        $malefic = 0;
        
        foreach($this->ganitaData['graha'] as $key => $params){
            if($key == $this->objectKey) continue;

            if($params['rashi'] == $this->objectRashi){
                $G = Graha::getInstance($key);
                $G->setEnvironment($this->ganitaData);

                if($G->grahaCharacter == Graha::CHARACTER_SHUBHA)
                    $benefic = $benefic + 1;
                else
                    $malefic = $malefic + 1;
            }
        }
        
        if(($benefic > 0 and $malefic > 0) or ($benefic == 0 and $malefic == 0))
            $character = Graha::CHARACTER_MISHRA;
        elseif($malefic > 0)
            $character = Graha::CHARACTER_PAPA;
        else
            $character = Graha::CHARACTER_SHUBHA;
        
        return $character;
    }

    /**
     * Constructor
     * 
     * @param null|array $options Options to set
     */
    public function __construct($options)
    {
        parent::__construct($options);
        
        $this->setGrahaNames();
        $this->setGrahaRelation($this->options);
    }
}
