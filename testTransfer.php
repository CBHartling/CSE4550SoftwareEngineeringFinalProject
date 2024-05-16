$conn->begin_transaction();

try {
    // Subtract the transaction amount from the source account
    $sql = "UPDATE checking SET Balance = Balance - $TransAmt WHERE Acct_no = $Acct_noFrom";
    $conn->query($sql);

    // Add the transaction amount to the target account
    $sql = "UPDATE checking SET Balance = Balance + $TransAmt WHERE Acct_no = $Acct_noTar";
    $conn->query($sql);

    // Insert the transaction record
    $sql = "INSERT INTO checking_transactions (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
            SELECT TRansID, 'Transfer', CURRENT_DATE(), $TransAmt, lastname, firstname, phone
            FROM checking
            WHERE Acct_no = $Acct_noFrom";

    // Commit the transaction
    $conn->commit();

    echo "Transaction successful.";
} catch (Exception $e) {
    // Rollback the transaction if an error occurred
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
}
