<?php

require_once 'CRM/Event/Badge.php';

class CRM_Event_Badge_BrazilianChamber extends CRM_Event_Badge {
    
    function __construct() {
        parent::__construct();
        $pw=210; $ph=297;// A4
        $h=21; $w=76;
        $this->format = array( 'name' => 'Sigel 3C', 'paper-size' => 'A4', 'metric' => 'mm', 'lMargin' => 24,
                              'tMargin' => 9, 'NX' => 2, 'NY' => 12, 'SpaceX' => 0, 'SpaceY' => 0,
                              'width' => $w, 'height' => $h, 'font-size' => 12 );
        $this->tMarginName = 10;
        //      $this->setDebug ();
    }
    
    public function generateLabel( $participant ) {
        $x = $this->pdf->GetAbsX();
        $y = $this->pdf->GetY();
        $this->printBackground (true);
        $this->pdf->SetLineStyle( array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,2', 'color' => array(200, 200, 200 ) ) );
       
        $this->pdf->SetFont('dejavusans', 'BI', 14, '', 'false');
        $this->pdf->MultiCell ( $this->pdf->width, 0, $participant['first_name']. " ".$participant['last_name'], $this->border, "C", 0, 1, $x, $y+$this->tMarginName );
        $this->pdf->SetFont('dejavusans', '', 11, '', 'false');
        $this->pdf->MultiCell ( $this->pdf->width, 0, $participant['current_employer'], $this->border, "C", 0, 1, $x, $this->pdf->getY() );
    }
}