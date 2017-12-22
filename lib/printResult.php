<?php
require('fpdf/fpdf.php');


class UserResult{
    
    private $pdf;
   
    /** public functions **/
    
    public function UserResult(){
        
        $this->pdf = new FPDF('P','mm','A4');
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(0,10,'FIROB',0,1,'C');
        $this->pdf->Cell(0,10,'Fundamental Interpersonal Relations Orientation Behaviour','B',1,'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(0,10,'Result',0,1,'C');
        $this->pdf->Ln(20);
    }
    
    public function userProfile($id, $name, $organisation, $date){
        
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(17,7,'Profile','B',0,'L');
        $this->pdf->Ln(15);
        
        $this->pdf->Cell(20);
        $this->pdf->Cell(40,10,'Id : ',0,0,'L');
        $this->pdf->SetFont('Arial','',14);
        $this->pdf->Cell(0,10,$id,0,0,'L');
        $this->pdf->Ln(8);
        
        $this->pdf->Cell(20);
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(40,10,'Name : ',0,0,'L');
        $this->pdf->SetFont('Arial','',14);
        $this->pdf->Cell(0,10,$name,0,0,'L');
        $this->pdf->Ln(8);
        
        $this->pdf->Cell(20);
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(40,10,'Organisation : ',0,0,'L');
        $this->pdf->SetFont('Arial','',14);
        $this->pdf->Cell(0,10,$organisation,0,0,'L');
        $this->pdf->Ln(8);
        
        $this->pdf->Cell(20);
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(40,10,'Date : ',0,0,'L');
        $this->pdf->SetFont('Arial','',14);
        $this->pdf->Cell(0,10,$date,0,0,'L');
        $this->pdf->Ln(30);
        
    }
    
    public function userResultTable($e_i, $w_c, $e_a, $w_i, $w_a, $e_c){
        
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(15,7,'Table','B',0,'L');
        $this->pdf->Ln(15);
        
        $this->pdf->Cell(55);
        $this->pdf->Cell(20,20,'',1,0,'C');
        $this->pdf->Cell(20,20,'I',1,0,'C');
        $this->pdf->Cell(20,20,'C',1,0,'C');
        $this->pdf->Cell(20,20,'A',1,1,'C');
        $this->pdf->Cell(55);
        $this->pdf->Cell(20,20,'E',1,0,'C');
        $this->pdf->Cell(20,20,$e_i,1,0,'C');
        $this->pdf->Cell(20,20,$e_c,1,0,'C');
        $this->pdf->Cell(20,20,$e_a,1,1,'C');
        $this->pdf->Cell(55);
        $this->pdf->Cell(20,20,'W',1,0,'C');
        $this->pdf->Cell(20,20,$w_i,1,0,'C');
        $this->pdf->Cell(20,20,$w_c,1,0,'C');
        $this->pdf->Cell(20,20,$w_a,1,1,'C');
        
    }
    
    public function userResultAnalytics($text){
        
        $this->pdf->Cell(10);
        $this->pdf->Cell(0,10,$text,0,1,'L');
        
    }
    
    public function showResult(){
        
        $this->pdf->Output();
        
    }
        
}
?>