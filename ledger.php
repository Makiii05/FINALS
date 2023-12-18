<html>
    <body>
        <form action="add1.php" method="get"><br>


            Account:
                <select name="txtaccount">
                    <?PHP
                    $conn=new mysqli("localhost","root","","try");
                    $result = $conn->query("select * from tblaccount");
                    while ($row = $result->fetch_assoc()) {
                    echo "<option value={$row['email']}>{$row['email']}</option>";
                    }
                    ?>
                </select><br><br>
                        
            Date:
                <input type="date" name=txtdate><br><br>

            Type:
                <select name="txttype">
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                </select><br><br>

            Description:
                <br><textarea name="txtdesc"cols="40" rows="10"></textarea><br><br>

            Amount <input type="number" name=txtamount><br><br>
            <input type="submit" Value=Add>
            <input type="button" value=Print onclick="window.location.href='pdf.php'">
        </form>
        <table cellspacing=0 cellpadding=0 border=1 width=1000>
            <tr>
                <th>Account</th><th>Date</th><th>Description</th><th>Debit</th><th>Credit</th><th>Balance</th>
            </tr>
            <?php
                // Display tblledger entries
                $conn = new mysqli("localhost", "root", "", "try");
                $result = $conn->query("SELECT * FROM tblledger ORDER BY account, date");

                $balances = [];

                while ($row = $result->fetch_assoc()) {
                    $account = $row['account'];
                    $balances[$account] = ($balances[$account] ?? 0) + $row['debit'] - $row['credit'];

                    echo "<tr>";
                    echo "<td>{$row['account']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['description']}</td>";
                    echo "<td>{$row['debit']}</td>";
                    echo "<td>{$row['credit']}</td>";

                    // Display the running balance
                    echo "<td>{$balances[$account]}</td>";

                    echo "</tr>";
                }

                $conn->close();
                ?>

            </table>
    </body>
</html>