<?php

include_once "operations.php";
include_once "data base.php";
class Car_Owner extends Database implements operations 
{

   var $phoneNum;
   var $address;
   var $name;
   var $email;
   var $password;
   var $id;
   var $car_num;
   var $car_color;
   var $car_license;
   var $car_type;
   var $photoName;

   public function GetCarNum(){

    return $this->car_num;

   }

 
   public function GetCarColor(){

    return $this->car_color;

   }


   public function GetCarLicesnse(){

    return $this->car_license;

   }

   public function GetCarType(){

    return $this->car_type;

   }

   public function GetID(){

    return $this->id;

   }

   public function setCarNum($cn){

   $this->car_num=$cn;

   }

   public function setID($no){

    $this->id=$no;

   }

   public function setCarType($ct){

    $this->car_type=$ct;

   }

   public function setCarLicesnse($cl){

    $this->car_license=$cl;

   }

   public function setCarColor($cc){

    $this->car_color=$cc;

   }

   
   public function GetName(){

    return $this->name;

   }

   public function GetPassword(){

      return $this->password;
  
     }

   public function GetEmail(){

    return $this->email;

   }

   public function GetPhoneNum(){

    return $this->phoneNum;

   }

   public function GetAddress(){

    return $this->address; 

   }

   public function GetphotoName(){

    return $this->photoName; 

   }

   public function setphotoName($photoName){

    $this->photoName=$photoName;

   }

   public function setName($n){

    $this->name=$n;

   }
   public function setPassword($pass){

      $this->password=$pass;
  
     }

   public function setEmail($e){

    $this->email=$e;

   }

   public function setAddress($add){

    $this->address=$add;

   }

   public function setPhoneNum($phn){

    $this->phoneNum=$phn;

   }

   ///////////////////
   public function Add(){

      return parent::RunDML("insert into `car owner` values (Default,'".$this->GetName()."','".sha1($this->GetPassword())."','".$this->GetPhoneNum()."','".$this->GetAddress()."','".$this->GetEmail()."',Default)");
   }

   public function AddCar(){

    return parent::RunDML("insert into `car numbers` values ('".$this->GetCarNum()."','".$this->GetCarColor()."','".$this->GetCarLicesnse()."','".$this->GetCarType()."','".$this->GetID()."')");
 }

    public function UpdateProfile(){

        return parent::RunDML("update  `car owner` set Name='".$this->GetName()."', Phone_Number='".$this->GetPhoneNum()."',Address='".$this->GetAddress()."',Email='".$this->GetEmail()."',Photo_Name='".$this->GetphotoName()."'  where Owner_Id='".$this->GetID()."' ");
    }

   public function Update(){

   	 return parent::RunDML("update `car owner` set  Password='".sha1($this->GetPassword())."' where Owner_Id='".$this->GetID()."' ");

   }
   public function Delet(){
		
		return parent::RunDML("delete from `car owner` where Owner_Id ='".$this->GetID()."'");

	 }
	 

   public function Search(){

   }

   public function GetDataByPhone(){

    $da=parent::CheckData("select * from `car owner` where Phone_Number='".$this->GetPhoneNum()."'");
    return $da;
   }

   public function Login(){

   $log=parent::CheckData("select * from `car owner` where (Email ='".$this->GetEmail()."' or Phone_Number='".$this->GetPhoneNum()."') and Password='".sha1($this->GetPassword())."'");
  
   return $log;

}

    public function CheckById(){

			$log=parent::CheckData("select * from `car owner` where Owner_Id ='".$this->GetID()."'and Password='".sha1($this->GetPassword())."'");
			return $log;
        
    }

    public function GetDataById(){

        $pro=parent::CheckData("select * from `viewcarowner` where Owner_Id ='".$this->GetID()."'");
        return $pro;
    
}

    public function CheckEmail(){

    $log=parent::CheckData("select * from `car owner` where Email = '".$this->GetEmail()."'");
   
    return $log;
 
 }

 public function UserData()
 {
    $pro=parent::CheckData("select * from `car owner` where Owner_Id ='".$this->GetID()."'");
    return $pro;
}
 

//    public function fnEncrypt($sValue, $sSecretKey)
//    {
//        return rtrim(
//            base64_encode(
//             openssl_encrypt(
//                 $sValue, 
//                 'AES-256-CBC',
//                    $sSecretKey, 
//                    OPENSSL_RAW_DATA, 
//                  openssl_random_pseudo_bytes(
//                        mcrypt_get_iv_size(
//                            MCRYPT_RIJNDAEL_256, 
//                            MCRYPT_MODE_ECB
//                        ), 
//                        MCRYPT_RAND)
//                    )
//                ), "\0"
//            );
//    }

//    public  function fnDecrypt($sValue, $sSecretKey)
//        {
//            return rtrim(
//                mcrypt_decrypt(
//                    MCRYPT_RIJNDAEL_256, 
//                    $sSecretKey, 
//                    base64_decode($sValue), 
//                    MCRYPT_MODE_ECB,
//                    mcrypt_create_iv(
//                        mcrypt_get_iv_size(
//                            MCRYPT_RIJNDAEL_256,
//                            MCRYPT_MODE_ECB
//                        ), 
//                        MCRYPT_RAND
//                    )
//                ), "\0"
//            );
//        }
 }
