<?php

require 'database.php';
require 'Account.php';

$acc = new Account($pdo);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Hello World Bank
            </h1>
            <p class="subtitle">
                Welcome, <strong>Guest</strong>!
            </p>
            <a href="create.php" class="button is-primary is-rounded">Create account</a>
            <br>
            <br>

            <h2>Accounts</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Amount</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    $allAccounts = $acc->all();

                    while ($account = $allAccounts->fetch()) {
                        echo '<tr>
                            <th>
                                ' . $account['id'] . '
                            </th>
                            <td>
                                ' . $account['firstname'] . '
                            </td>
                            <td>
                                ' . $account['lastname'] . '
                            </td>
                            <td>
                            ' . $account['amount'] . '
                            </td>
                        </tr>';
                    }


                    ?>
                    <!-- <tr>
                        <th>1</th>
                        <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester City</a> <strong>(C)</strong>
                        </td>
                        <td>38</td>
                    </tr> -->
                </tbody>
            </table>

        </div>
    </section>
</body>

</html>