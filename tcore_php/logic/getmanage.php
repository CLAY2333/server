<?php
    class getmanage extends auth{
        public function __instance() {
            //dump($GLOBALS);
            $this->show();
        }
        public function get_url(){
            $con = mysql_connect("localhost","root","");
		    if (!$con){
        
                $res[0]=1;
                $this->json_return( $res[0],$row['pic'], $row['url']);
                die( mysql_error());
                }
                   else
                   {
                       $res[0]=0;
                   }
            mysql_select_db("taotaochi", $con);

            $result = mysql_query("SELECT * FROM admanage order by rand() limit 1");

         

            while($row = mysql_fetch_array($result)){
                    
                // echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                // echo "<td>" . $row['pic'] . "</td>";
                // echo "<td>" . $row['url'] . "</td>";
                // echo "</tr>";
                $manage=array(
                    'id:'=>$row['id'],
                    'pic'=>$row['pic'], 
                    'url'=>$row['url']
                    );
                $this->json_return( $res[0],"success", $manage);
            

            mysql_close($con);
        }
     }
      
     public function PPP(){
         $arr[] = array('name'=>'b','flag'=>1);
        $arr[] = array('name'=>'a','flag'=>2);
        $arr[] = array('name'=>'b','flag'=>1);
         $newArr=array();
        for($j=0;$j<count($arr);$j++){
        $newArr[]=$arr[$j]['flag'];
        }
        array_multisort($newArr,SORT_DESC,$arr);

        dump($arr);
     }  
}