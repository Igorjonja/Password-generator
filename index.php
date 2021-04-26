


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
$numOfsSymbol=intval(($_POST["num_of_symbols"]));
var_dump($numOfsSymbol);
"</br>";
//$keySpace="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; //all available symbols
$caseNumbers= "23456789"; //Numbers without 0 and 1
$caseBigLetters="ABCDEFGHIJKLMNPQRSTUVWXYZ" ;//Big letters without o and O
$caseSmallLetters="abcdefghijkmnopqrstuvwxyz";//Small letters without l
$case1=$_POST["numberNo10"];
$case2=$_POST["Bletters"];
$case3=$_POST["Sletters"];
$generatedPass="";
$characters="";

$checkNum="";




function gernerate_pass($case1, $case2, $case3,$numOfsSymbol){
    $caseNumbers = "0123456789"; //Numbers without 0 and 1
    $caseBigLetters = "ABCDEFGHIJKLMNPQRSTUVWXYZ";//Big letters without o and O
    $caseSmallLetters = "abcdefghijkmnopqrstuvwxyz";//Small letters without l
    $keySpace="";
    $characters = "";
    $condition = [$case1, $case2, $case3];

    if($condition[0]=="true"){
        $keySpace.=$caseNumbers;
    }if($condition[1]=="true"){
        $keySpace.=$caseBigLetters;
    }if($condition[2]=="true"){
        $keySpace .= $caseSmallLetters;
    }
    echo "<br> kakie simvoly ispolzujutsja: $keySpace</br>";

    str_shuffle($keySpace);
    $input_length = strlen($keySpace);
    echo "<br>";
    echo "kolichestvo simvolov parolle: $input_length","</br>";

    for ($i = 0; $i<$numOfsSymbol;) { //nachal s nulja i do togo kolichestva kotoroje my vveli

        $random_character = $keySpace[random_int(0, $input_length - 1)];// vyberaet randomnyj simvol iz spiska simvolov $keySpace dopustim 2

//        var_dump(in_array("$random_character", [$characters]));

//        (in_array("$random_character",[$characters]))!="true"
        if (in_array("$random_character", [$characters])!='true'){

            if ($condition[0] === 'true' & $random_character != 0 & $random_character != 1) {
                $characters .= $random_character;
                $i++;

            }

//        if ($condition[1] === 'true' && $random_character!="o" && $random_character!="O")
//        {
//            $characters.= $random_character;
//            $i++;
//        }
//
//        if($condition[2] === 'true' && $random_character!="l")
//        {
//            $characters.=$random_character;
//            $i++;
//        }

        }
        }
    echo "</br>";
"<br>";
echo "Random password is: "; echo var_dump($characters),"</br>";
}

gernerate_pass($case1, $case2, $case3, $numOfsSymbol);


?>
