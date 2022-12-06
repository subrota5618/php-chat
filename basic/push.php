<?php
//push
$user  = array("name" => "subrota" , "age" => "21" , "roll" => "212") ;
array_push($user , "sex : male "  , "country : bangladesh") ;
print_r($user) ;
//pop 
echo "<br> <br> <br>" ;
$user  = array("name" => "subrota" , "age" => "21" , "roll" => "212") ;
array_pop($user) ;
print_r($user) ;
//slice
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,2));

echo "<br> <br> <br>" ;
//map
function myfunction($v)
{
  return($v*$v);
}

$a=array(1,2,3,4,5);
print_r(array_map("myfunction",$a));
//--------------------class -------------------------//
class Sex {
    public $sex ;
    function set_sex ($sex) {
        $this -> sex = $sex ;
        // this.sex = sex ;
    }
    function get_sex() {
        return $this -> sex ;
    }
}
$getSex = new Sex() ;
$getSex-> set_sex("<br> <br> Male <br> ") ;
echo $getSex -> get_sex() ;
//getSex.set_sex()
?>
