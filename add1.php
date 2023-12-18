<?php
    $conn = new mysqli("localhost", "root", "", "try");
    
    $account = $_GET['txtaccount'];
    $date = $_GET['txtdate'];
    $type = $_GET['txttype'];
    $description = $_GET['txtdesc'];
    $amount = $_GET['txtamount'];

    $query = "INSERT INTO tblledger (account, date, description, debit, credit) VALUES ('$account', '$date', '$description', ";
    $query .= $type === 'Debit' ? "'$amount', '0')" : "'0', '$amount')";

    $result = $conn->query($query);

        header("Location: ledger.php");
    $conn->close();
?>
