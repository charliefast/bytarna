
<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('members');
   $this -> db -> where('username = ' . "'" . $username . "'");
   $this -> db -> where('password = ' . "'" . SHA1('shru7hTTls'.$password) . "'");
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}


//insert into members (username, password) values ('bob', SHA1('shru7hTTlssupersecret'));
?>




