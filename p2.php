 <?php
$conn=mysqli_connect("localhost","root","","user");
if (isset($_POST['submit'])) {
   
   extract($_POST);
   $sql="UPDATE `table` SET `name`='$n1',`email`='$n2',`mobile`='$n3',`password`='$n4' WHERE `id`='$id'";
   $qry=mysqli_query($conn,$sql);
   header('location:p1.php');
}
if (isset($_POST['update'])) {
   $id=$_POST['id'];

$sql="SELECT * FROM `table` WHERE `id`='$id'";
$qry=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($qry);
}

?>
 
 <!DOCTYPE html>
 <html>
 <head>
    <title></title>
 </head>
 <body>
 <form method="post">
      <table>
         <tr>
            <td>name</td>
            <TD><input type="text" name="n1" value="<?=$res['name']?>"></TD>
         </tr>
         <tr>
            <td>email</td>
            <TD><input type="email" name="n2" value="<?=$res['email']?>"></TD>
         </tr>
         <tr>
            <td>mobile</td>
            <TD><input type="number" name="n3" value="<?=$res['mobile']?>"></TD>
         </tr>
         <tr>
            <td>password</td>
            <TD><input type="password" name="n4" value="<?=$res['password']?>"></TD>
         </tr>
         <tr>
            <td>
               <input type="hidden" name="id" value="<?=$res['id']?>"></td>
            <TD><input type="submit" name="submit" value="update"></TD>
         </tr>
      </table>
   </form>
 </body>
 </html>