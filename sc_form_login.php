<?php
  ob_start();
  session_start();
  $user = $_POST['username'];
  $password = $_POST['password'];
  $SESSION['username']=$user;
    $Open = mysql_connect("localhost","root","");
    if(!$Open){
      die ("Koneksi gagal!");
          }
    $Koneksi = mysql_select_db("helpdesk");
    if(!$Koneksi){
      die("Koneksi gagal!");
    }     
$sql = "SELECT * FROM user where username='$user'";  // user adalah nama tabel sedangkan username adalah nama sheets di tabel
$qry = mysql_query($sql);
$num = mysql_num_rows($qry);
$row = mysql_fetch_array($qry);

if($num==0 OR $password!=$row['password']) {
  ?>
  <script language="JavaScript">
  alert('Username atau Password salah!');
  document.location='index.html';
  </script>
<?php 
}   
else {
 $_SESSION['login']=1;
  header("Location: dashboard_admin.html");
}

                   
mysql_close($Open); //Tutup koneksi ke MYSQL
?>