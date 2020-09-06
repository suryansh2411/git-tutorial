 <?php
 
$conn=mysqli_connect("localhost","root","","user");
if (isset($_POST['submit'])) {
   extract($_POST);
   $n4=$_POST['n4'];
    $hash=md5($n4);
  
   $sql="INSERT INTO `table` (`name`,`email`,`mobile`,`password`)VALUES('$n1','$n2','$n3','$hash')";

   $qry=mysqli_query($conn,$sql);
   if ($qry) {
      echo "success";
   }
}
 ?>
 <?php
if (isset($_POST['delete'])) {
   $id=$_POST['id'];
   // $sql="DELETE FROM `table` ";
   $sql="UPDATE `table` SET `delete`=1 WHERE `id`='$id'";
   $qry=mysqli_query($conn,$sql);
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
            <TD><input type="text" name="n1"></TD>
         </tr>
         <tr>
            <td>email</td>
            <TD><input type="email" name="n2"></TD>
         </tr>
         <tr>
            <td>mobile</td>
            <TD><input type="number" name="n3"></TD>
         </tr>
         <tr>
            <td>password</td>
            <TD><input type="password" name="n4"></TD>
         </tr>
         <tr>
            <td></td>
            <TD><input type="submit" name="submit"></TD>
         </tr>
      </table>
   </form>
   <table border="1">
      <tr>
         <th>name</th>
         <th>email</th>
         <th>mobile</th>
         <th>password</th>
         <th>delete</th>
         <th>update</th>
      </tr>
      <?php
          $sql="SELECT * FROM `table` WHERE `delete`=0";
          $qry=mysqli_query($conn,$sql);
             while ($data=mysqli_fetch_array($qry)) {?>
           <tr>
              <td><?=$data['name']?></td>
              <td><?=$data['email']?></td>
              <td><?=$data['mobile']?></td>
              <td><?=$data['password']?></td>
              <td>
                 <form method="post">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <input type="submit" name="delete" value="delete">
                 </form>
              </td>
              <td>
                 <form method="post" action="p2.php">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <input type="submit" name="update" value="update">
                 </form>
              </td>
           </tr>
       <?php }
      ?>
   </table>
 </body>
 </html>