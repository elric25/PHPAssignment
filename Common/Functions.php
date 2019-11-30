<?php
    function drawCalc($pAmount, $interest, $years, $pAmountErr, $interestErr, $yearsErr)
    {
?>

        <div class="horizontal-margin vertical-margin">
        <h4>Enter principal amount, interest rate and select number of years to deposit <br><br></h4>
	
        <form id="depositForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table style="width: 60%;">
                <tr>
                <td>Principal Amount:</td>
                <td><input type="text" name="PrinAm" id="PrinAm" value="<?php echo $_GET["PrinAm"];?>"></td>
                <td><?php echo '<div style="Color:red">'.$PrinErr.'</div>'; ?></td>
                </tr>
                <tr>
                <td>Interest Rate (%):</td>
                <td><input type="text" name="IntRate" id="IntRate"value="<?php echo $_GET["IntRate"];?>"></td>
                <td><?php echo '<div style="Color:red">'.$IntErr.'</div>'; ?></td>
                </tr>

                <tr>
                <td>Years to Deposit:</td>
               <td><select name="Years" id="Years">
                <?php
                for($y = 1; $y <=20; $y++){  
                    if($_GET["Years"] == $y){
                print( "<option value='$y' selected='selected'  >$y</option>");
                    }else{
                      print( "<option value='$y' >$y</option>");  
                    }
                }
                ?>
                
                </td>
                <td><?php echo '<div style="Color:red">'.$YearErr.'</div>'; ?></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="btnSubmit" id="btnSubmit" value="Calculate" class="btn btn-primary">
            <input type="submit" name="reset" id="reset" value="Clear" class="btn btn-primary">

        </form>        
        </table>


            
        </table>
        
    </div>
<?php
    }
?>

<?php

function OutPutTable($col1,$col2,$col3) 
{
print "<tr><td>$col1</td><td>\$$col2</td><td>\$$col3</td></tr>";
}

Function MakeTable($Time, $Total, $Int){
    for ( $x=1; $x<=$Time; $x++ ) {
	$Raise = $Total * ($Int * 0.01);
        $Total += $Raise;
        $Raise = number_format($Raise, 2, '.', '');
        $Total = number_format($Total, 2, '.', '');
        OutPutTable( $x, $Total, $Raise );
        }
}

?>

<?php
        function validatestring($data)
        {
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            
            return $data;
        }
?>

<?php
        function ValidatePrincipal($Prin)
        {
            $pAmount = trim($Prin);
            if(empty($pAmount))
            {
                $Valid = false;
                $GLOBALS["PrinErr"] = "Please input a Principal Amount. <br><br>";
            }
            elseif (!is_numeric($pAmount))
            {
                $Valid = false;
                $GLOBALS["PrinErr"] = "Please input a numeric value. <br><br>";
            }
            elseif ($pAmount <= 0)
            {
                $Valid = false;
                $GLOBALS["PrinErr"] = "Principal Amount must be greater than 0. <br><br>";                
            }
            else
            {$Valid = true;}
            return $Valid;
        }
        function ValidateInterest($Int)
        {
            $interest = trim($Int);
            if(empty($interest))
            {
                $Valid = false;
                $GLOBALS["IntErr"] = "Please input Interest Rate.<br><br>";
            }
            elseif (!is_numeric($interest))
            {
                $Valid = false;
                $GLOBALS["IntErr"] = "Please input a numeric value. <br><br>";
            }
            elseif ($interest < 0)
            {
                $Valid = false;
                $GLOBALS["IntErr"] = "Interest Rate must not be negative (can be zero!). <br><br>";
            }
            else
            {
                $Valid = true;
            }
            return $Valid;
        }
        
        function ValidateYears($Year){
        if($Year <= 0 || $Year > 20){
            $Valid = false;
            $GLOBALS["YearErr"] = "Please don't mess with me!";

        }else
        {
            $Valid = true;
        }
        return $Valid;
        }
        
        function ValidateName($UName)
        {
            $name = trim($UName);
            if(empty($name))
            {
                $Valid = false;
                $GLOBALS["NameErr"] = "Please enter a name.<br><br>";
            }
            else
            {
                $Valid = true;
            }
            return $Valid;
        }
        function ValidatePost($PCode)
        {
            $postal = trim($PCode);
            $postalCodeRegex = "/[a-z][0-9][a-z]\s*[0-9][a-z][0-9]/i";
            if(empty($postal))
            {
                $Valid = false;
                $GLOBALS["PostErr"] = "Please enter a Postal Code. <br><br>";
            }
            elseif (!preg_match($postalCodeRegex, $postal))
            {
                $Valid = false;
                $GLOBALS["PostErr"] = "Postal field must use A1A1A1 format. <br><br>";
            }
            else
            {
                $Valid = true;
            }
            return $Valid;
        }
        function ValidatePhone($PNum)
        {
            $phone = trim($PNum);
            $phoneCodeRegex = "/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/";
            if(empty($phone))
            {
                $Valid = false;
                $GLOBALS["PhoneErr"] = "Please enter a phone number. <br><br>";
            }
            elseif(!preg_match($phoneCodeRegex, $phone) || strlen($phone) != 12)
            {
                $Valid = false;
                $GLOBALS["PhoneErr"] = "Invalid phone number.";
            }
            else
            {
                $Valid = true;
            }
            return $Valid;
        }
        function ValidateEmail($Eadd)
        {
            $email = trim($Eadd);
            $EmailRegex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
            if(empty($email))
            {
                $Valid = false;
                $GLOBALS["EmailErr"] = "Please enter an email address.<br><br>";
            }
            elseif(!preg_match($EmailRegex, $email)) {
                $Valid = false;
                $GLOBALS["EmailErr"] = "Invalid email address.<br><br>";
            }
            else
            {
                $Valid = true;
            }
            return $Valid;
        }

        function ValidateContact ($CType, $CTime){
        if($CType == "Email"){
            $Valid = true;
        }elseif($CType == "Phone" && empty($CTime)){
                $Valid = false;
                $GLOBALS["TimeErr"] = "Cannot contact via phone without contact times.<br><br>";
            }else{
                $Valid = true;
            }
        return $Valid; 
        }
?> 
