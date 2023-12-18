<html>
    <body>
        <form action="add.php" method=get>
            Account: <input type="text" name="txtemail"><br><br>
            Name: <input type="text" name="txtname"> <input type="submit" value=Add><br><br>
        </form>

        <table cellpadding=0 cellspacing=0 border=1 width=700>
            <tr><th>Delete</th><th>Account</th><th>Name</th></tr></tr>
            <?PHP
            $conn=new mysqli("localhost","root","","try");
            $result = $conn->query("select * from tblaccount");
            while ($row = $result->fetch_assoc()) {
                echo "<tr align='center'>
                    <td><a href=delete1.php?txtemail={$row['email']}><input type=button value=Delete></a></td>
                    <td>{$row['email']}</td>
                    <td>{$row['name']}</td>
                    </tr>";
            }
            ?>
        </table>
    </body>
</html>