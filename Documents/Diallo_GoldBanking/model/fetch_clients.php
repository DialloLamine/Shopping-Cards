<?php
    include_once('./model/Connect_DB.php');

    function fetch_Cli() {
       
        $con = mysqli_connect("localhost", "root","", "4ipdw_diallo");

        //$query="select * from Tclient";
        $query="select * from Tclient";

        $result=mysqli_query($con,$query);

?>

        <table align="center" border="1px"  style="width:900px" line-heigth="30px">
            <tr>
                <th colspan="6"></h2>Customers Reccord</h2></th>
            </tr>
            <t>
                <th> id_cli </th>
                <th> name_cli </th>
                <th> email_cli </th>
                <th> address_cli </th>
                <th> add_date </th>
            </t> 
            <?php 
                while($rows=mysqli_fetch_assoc($result))
                {
            ?>        
                    <tr>
                        <td><?php echo $rows['id_cli']; ?></td>
                        <td><?php echo $rows['name_cli']; ?></td>
                        <td><?php echo $rows['email_cli']; ?></td>
                        <td><?php echo $rows['address_cli']; ?></td>
                        <td><?php echo $rows['add_date']; ?></td>
                    </tr>
            <?php        
                }
            ?>   
        </table>
<?php
    }
?>    


            
