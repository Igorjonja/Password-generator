


<form action="index.php" method="post">
    <fieldset>
        <p>Type number of symbols</p>
        <p><input type="number" min="1" name="num_of_symbols" ></p>
        <input type="checkbox" id="without_1_0_numbers" name="numberNo10" value="true">
        <label for="without_1_0_numbers"> Numbers without 0 and 1</label><br>
        <input type="checkbox" id="Big_letters" name="Bletters" value="true">
        <label for="vehicle2">Big letters without o and O</label><br>
        <input type="checkbox" id="Small_letters" name="Sletters" value="true">
        <label for="vehicle3"> Small letters without "l"</label>
        <p><input type="submit" value="Generete"></p>
    </fieldset>
</form>





<?php
//input data
$numOfSymbol=intval($_POST["num_of_symbols"]);
//echo "<br>"."Input numbers of
/




 symbol: ";//TEST
//echo "<br>".var_dump($_POST["num_of_symbols"])."</br>";//TEST input data
$case1=$_POST["numberNo10"];
$case2=$_POST["Bletters"];
$case3=$_POST["Sletters"];


function gernerate_pass($case1, $case2, $case3,$numOfSymbol){
    $caseNumbers = "0123456789";
    $caseBigLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $caseSmallLetters = "abcdefghijklmnopqrstuvwxyz";
    $keySpace="";
    $pattern="";
    $replacement="";
    $characters = "";
    $condition = [$case1, $case2, $case3];


    if($condition[0]=="true"){$pattern.="01"; $keySpace.=$caseNumbers;}
    if($condition[1]=="true"){$pattern.="Oo"; $keySpace.=$caseBigLetters;}
    if($condition[2]=="true"){$pattern.="l"; $keySpace.=$caseSmallLetters;}
//    var_dump("/[".$pattern."]/");
    $keySpace=preg_replace("/[".$pattern."]/","",$keySpace);
    $input_length=strlen($keySpace); // kolihestvo simvolov

// var_dump($keySpace);


    if($input_length>=$numOfSymbol){          //key space length should be greater then input numbers

        for ($i = 0; $i < $numOfSymbol;) { // characters counter

            $random_character = $keySpace[random_int(0, $input_length-1)];

            if (strpos($characters, $random_character) === false) { //same symbol searching

                if ($condition[0] === 'true' & $random_character !== "0" & $random_character !== "1")//Numbers without 0 and 1
                {
                    $characters .= $random_character;
                    $i++;

                } elseif($condition[1] === 'true' & $random_character !== "o" & $random_character !== "O") //Big letters without o and O
                {
                    $characters .= $random_character;
                    $i++;
                }

                elseif($condition[2] === 'true' & $random_character != "l") //Small letters without l
                {
                    $characters .= $random_character;
                    $i++;
                }
            }

        }
         echo"password : "; var_dump($characters);
    }else{echo"Please select more cases or insert more characters";}

}

gernerate_pass($case1, $case2, $case3, $numOfSymbol);


?>
