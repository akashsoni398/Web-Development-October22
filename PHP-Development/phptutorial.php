<?php  
$username='Akash ';  
//single line comment
/* multiple
line 
comment */

$var='rwreg';
$x='sddsf';
$y=false;
echo $var.$x;
$arr = ['Akash',34343,true,['akash',243423,32434,true],false];
echo implode($arr[3]); //index value

$array = ['Name'=>'Akash Soni','addr'=>'Bangalore','marks'=>45,'pass'=>true];
echo $array['Name']," lives in ",$array['addr'];  //key-value pair

$res=print($array['Name']." lives in ".$array['addr']);
echo $res;

echo $var,$x,$y;

$a=10;$b=20;

$a+$b;
$a-$b;
$a*$b;
$a/$b = 9;
$a%$b = 1;

//a=100   
$a++;
//a=101  

//a=100   
$a--;
//a=99 

$a='214';
$b=214;

$a==$b;  //true
$a===$b;   //false

//    >  <  >=  <=  !=  ==  ===     --ccomparison operators

//   &&   ||   !

if(!isset($age)) {

}

$age=18;
$age+=5;   $age=$age+5;   

$age-=5;   $age*=5;    $age/=5;    $age%=5;



//branching stmts

$i=100;
if($i<100) 
{
    echo "Less than 100";
}
else if($i==100) 
{
    echo "Equal to 100";
}
else if($i>100)
{
    echo "greater than 100";
}
else {
    echo "error message";
}


$color='red';
switch($color) {
    case 'green':
        echo "color is green";
        break;
    case 'yellow':
        echo "color is yellow";
        break;
    case 'red':
        echo "color is red";
        break;
    case 'black':
        echo "color is black";
        break;
    default:
        echo "error message";
}


// looping stmts

$j=1000;
while($j<=100) {
    if($j%2==0) {
        echo $j;
    }
    $j++;
}

for($j=0;$j<=100;$j++) {
    if($j%2==0) {
        echo $j;
    }
}

$j=1000;
do {
    if($j%2==0) {
        echo $j;
    }
    $j++;
}
while($j<=100);



$array = ['Hello',3424,true,'wqqweqwe'];
foreach($array as $value) {
    echo $value," ";
}

function add($a,$b) {
    return $a+$b;
}

$sum=add(20,40);
echo $sum;


$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day

If ( !isset ($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}

session_start();
$_SESSION['username']="John Doe";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello World! welcome <?php echo $username; ?>
    <form method="post" action="welcome.php">
        <input type="email" name="username" id="">
        <input type="password" name="password" id="">
        <button type="submit">Submit</button>
    </form>
</body>
</html>


