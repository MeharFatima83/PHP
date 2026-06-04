<?php
function registerUser(){
    $file=fopen("credential.txt","a+");
    $content=fread($file,filesize("credential.txt"));
    $content=explode(",",$content);
    print_r($content);
    $id=rand(11,99);
    $user=readline("enter your name: ");
    $pass=readline("enter your password: ");
    if(!in_array($user,$content)and !in_array($id,$content)){
        fwrite($file,", $id,$user,$pass");
        echo "you are registered";
    }
    else{
        echo 'already exist';
    }
    fclose($file);

}
function login(){
      $file=fopen("credential.txt","r+");
    $content=fread($file,filesize("credential.txt"));
    $content=explode(",",$content);
     $user=readline("enter your name:/id: ");
      $pass=readline("enter your password: ");
      $flag=false;
      for($i=1;$i<count($content);$i+=3){
         if(($user==$content[$i] || $user==$content[$i+1]) && $pass==$content[$i+2]){
            
         $flag=true;
            echo "login success";
            break;
         }
         
      }
      if($flag==false){
        echo "login failed";
      }


}
// registerUser();
login();

?>