<?php

include_once "operations.php";
include_once "data base.php";
class message extends Database implements operations 
{

   var $messageid;
   var $subject;
   var $content;
   var $reply;
   var $UserId;
   var $timestamp;

///////////////////////////////////////////////////////////GET
   public function Getmessageid()
   {
    return $this->messageid;
   }
   public function Getsubject()
   {
    return $this->subject;
   }
   public function Getcontent()
   {
    return $this->content;
   }
   public function Getreply()
   {
    return $this->reply;
   }
   public function GetUserId()
   {
    return $this->UserId;
   }
   public function Gettimestamp()
   {
    return $this->timestamp;
   }

///////////////////////////////////////////////////////////SET      

   public function Setmessageid($input)
   {
    $this->messageid=$input;
   }
   public function Setsubject($input)
   {
    $this->subject=$input;
   } 
   public function Setcontent($input)
   {
    $this->content=$input;
   } 
   public function Setreply($input)
   {
    $this->reply=$input;
   } 
   public function SetUserId($input)
   {
    $this->UserId=$input;
   } 
   public function Settimestamp($input)
   {
    $this->timestamp=$input;
   }

   /////////////////////////////////////////////
   public function Add()
   {
    $data= parent::RunDML("insert into messages (message_Id, subject, messageBody, sendUser_Id, sendTime) values (Default,'".$this->Getsubject()."','".$this->Getcontent()."' ,'".$this->GetUserId()."', now() ) ");
    return $data;
   }
   public function Update()
   {
   }
   public function Delet()
   {
   }
   public function Search()
   {
   }
   public function getlastmessage()
   {
      $data= parent::CheckData("select * from messages where sendUser_Id = '".$this->GetUserId()."' order by message_Id DESC limit 1");
      return $data;
   }

}


?>