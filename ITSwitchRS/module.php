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
 * ELROSwitchRS ermöglicht das Steuern von 433Mhz Intertechno-Geräten mit Drehschaltern.
 * Erweitert ELROBase
 *
 */
class ITSwitchRS extends ITBase
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
        $this->RegisterPropertyString("CharAdr", "0000");
        $this->RegisterPropertyString("ByteAdr", "0000");
        $this->RegisterPropertyInteger("Repeat", 1);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     *
     * @access protected
     */
    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString("CharAdr") . $this->ReadPropertyString("ByteAdr") . "0F";
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
     * IPS-Instanz-Funktion ELRO_SendSwitchRS.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     *
     * @access public
     */
    public function SendSwitchRS(bool $State)
    {
        parent::SendSwitch($State);
    }

}

/** @} */
