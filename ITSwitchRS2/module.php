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
 * ELROSwitchDIP ermöglicht das Steuern von 433Mhz Geräten vom Typ FLS mit Drehschaltern.
 * Erweitert ELROBase
 *
 */
class ITSwitchRS2 extends ITBase
{

    protected $on = 'FF';
    protected $off = 'F0';

    /**
     * Interne Funktion des SDK.
     *
     * @access public
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString("CharAdr", "0FFF");
        $this->RegisterPropertyString("ByteAdr", "0FFF");
        $this->RegisterPropertyInteger("Repeat", 2);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     *
     * @access protected
     */
    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString("CharAdr") . $this->ReadPropertyString("ByteAdr") . "FF";
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
     * IPS-Instanz-Funktion ELRO_SendSwitchRS2.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     *
     * @access public
     */
    public function SendSwitchRS2(bool $State)
    {
        parent::SendSwitch($State);
    }

}

/** @} */
