<?php

    

    function fetch_data()  
    {  
      $output = ''; 
      include_once "db.php"; 
      $sql = "SELECT * FROM details ORDER BY id ASC";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["tamilvalue"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
    } 


    
    if(isset($_POST['btn']))
    {
        require_once "tcpdf/tcpdf_min/tcpdf.php";
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("PDF File To View All The value");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('freeserif');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false);  
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('freeserif', '', 12);
        $obj_pdf->AddPage();
        $content = '';
        $content .= '  
            <h3 align="center">PDF File To View All The value</h3><br /><br />  
                <table border="1" cellspacing="0" cellpadding="5">  
                <tr>  
                    <th width="30%">Name</th>  
                    <th width="30%">Tamilname</th>   
                </tr>           
                '; 
        $content .= fetch_data();  
        $content .= '</table>';        
        $obj_pdf->writeHTML($content);
        $obj_pdf->Output('sample.pdf', 'I');

    }

?>