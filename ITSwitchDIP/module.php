<?

/**
 * @addtogroup ipselro
 * @{
 *
 * @package       IPSElro
 * @file          module.php
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2016 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 * @version       1.0
 *
 */
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "ITBase.php");  // ELROBase Klasse

/**
 * ELROSwitchDIP ermöglicht das Steuern von 433Mhz Geräten mit DIP-Schaltern.
 * Erweitert ELROBase
 *
 */
class ITSwitchDIP extends ITBase
{

    protected $on = "FF";
    protected $off = "F0";

    /**
     * Interne Funktion des SDK.
     *
     * @access public
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyBoolean("Bit0", false);
        $this->RegisterPropertyBoolean("Bit1", false);
        $this->RegisterPropertyBoolean("Bit2", false);
        $this->RegisterPropertyBoolean("Bit3", false);
        $this->RegisterPropertyBoolean("Bit4", false);
        $this->RegisterPropertyBoolean("Bit5", false);
        $this->RegisterPropertyBoolean("Bit6", false);
        $this->RegisterPropertyBoolean("Bit7", false);
        $this->RegisterPropertyBoolean("Bit8", false);
        $this->RegisterPropertyBoolean("Bit9", false);
        $this->RegisterPropertyInteger("Repeat", 1);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     *
     * @access protected
     */
    protected function GetAdress()
    {
        $Target = "0000000000";
        if (!$this->ReadPropertyBoolean("Bit9"))
            $Target[9] = "F";
        if (!$this->ReadPropertyBoolean("Bit8"))
            $Target[8] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit7"))
            $Target[7] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit6"))
            $Target[6] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit5"))
            $Target[5] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit4"))
            $Target[4] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit3"))
            $Target[3] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit2"))
            $Target[2] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit1"))
            $Target[1] = "F" ;
        if (!$this->ReadPropertyBoolean("Bit0"))
            $Target[0] = "F" ;
        return $Target;
    }

    /**
     * IPS-Instanz-Funktion ELRO_SendSwitch.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     *
     * @access public
     */
    public function SendSwitch(bool $State)
    {
        parent::SendSwitch($State);
    }

    /**
     * IPS-Instanz-Funktion ELRO_SendSwitchDIP.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     *
     * @access public
     */
    public function SendSwitchDIP(bool $State)
    {
        parent::SendSwitch($State);
    }

}

/** @} */
