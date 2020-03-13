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
 * ELROSwitchGen ermöglicht das Steuern von 433Mhz Intertechno-Geräten.
 * Erweitert ELROBase
 *
 */
class ITSwitchGen extends ITBase
{

    protected $on;
    protected $off;

    /**
     * Interne Funktion des SDK.
     *
     * @access public
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString("Code", "0000000000");
        $this->RegisterPropertyString("CodeOn", "FF");
        $this->RegisterPropertyString("CodeOff", "F0");
        $this->RegisterPropertyInteger("Repeat", 1);
    }

    /**
     * Interne Funktion des SDK.
     *
     * @access public
     */
    public function ApplyChanges()
    {

        if (preg_match("/^[01F]{10}$/", trim($this->ReadPropertyString("Code"))) !== 1)
            IPS_SetProperty($this->InstanceID, "Code", "0000000000");
        if (preg_match("/^[01F]{2}$/", trim($this->ReadPropertyString("CodeOn"))) !== 1)
            IPS_SetProperty($this->InstanceID, "CodeOn", "FF");
        if (preg_match("/^[01F]{2}$/", trim($this->ReadPropertyString("CodeOff"))) !== 1)
            IPS_SetProperty($this->InstanceID, "CodeOff", "F0");

        if (IPS_HasChanges($this->InstanceID))
        {
            echo "Config invalid";
            IPS_ApplyChanges($this->InstanceID);
        }
        else
            parent::ApplyChanges();
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     *
     * @access protected
     */
    protected function GetAdress()
    {

        $on = trim($this->ReadPropertyString("CodeOn"));
        $this->on = $on;
        $this->SendDebug('GetAddress ON', $on, 0);
        $off = trim($this->ReadPropertyString("CodeOff"));
        $this->off = $off;
        $this->SendDebug('GetAddress OFF', $off, 0);
        $Target = "";
        $Target = trim($this->ReadPropertyString("Code"));
        return $Target;
    }

    /**
     * IPS-Instanz-Funktion IT_SendSwitch.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     *
     * @access public
     */
    public function SendSwitch(bool $State)
    {
        return parent::SendSwitch($State);
    }

    /**
     * IPS-Instanz-Funktion IT_SendSwitchGen.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     *
     * @access public
     */
    public function SendSwitchGen(bool $State)
    {
        return parent::SendSwitch($State);
    }

}

/** @} */
