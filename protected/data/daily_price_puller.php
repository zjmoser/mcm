<?php
# Pulls daily prices from Yahoo finance and inserts them into a database

include 'YahooFinance.php';

$tickers = array_slice($argv, 1);

$yf = new YahooFinance('^GSPC');
$all_data = array();

# Fetch all the required data
foreach ($tickers as $ticker) {

    $yf->setTicker($ticker);

    echo "\nRetrieving data for ticker: $ticker\n";

    $data = $yf->getCloseData();
    if (!$data) {
        echo ("Retrieved NULL data...\n");
        continue;
    }

    $all_data[] = array('ticker'=>$ticker, 'historic_data'=>array_reverse(array_slice($data, 1)));

    echo "$ticker data retrieved successfully\n";
}

# Prepare the sql statement
$mysqli = new mysqli('localhost', 'zany', '', 'mcm');
if ($mysqli->connect_errno)
    die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);

$mysqli->autocommit(FALSE);

echo "\nPreparing SQL statement\n";
if (!($stmt = $mysqli->prepare("INSERT INTO market_daily(date_recorded, ticker, close_price) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE close_price=VALUES(close_price)")))
    die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);

$formatted_date = '';
$close_price    = '';
$ticker         = '';
if (!$stmt->bind_param('ssd', $formatted_date, $ticker, $close_price))
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;

$sql_error = false;
# Update db tables by executing statment
foreach ($all_data as $data) {
    $ticker = $data['ticker'];
    echo "\nUpdating $ticker data\n";
    foreach ($data['historic_data'] as $daily_tick) {
        $date        = $daily_tick[0];
        $close_price = $daily_tick[1];

        $dt = new DateTime($date);
        $formatted_date = date_format($dt, 'Y-m-d');

        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $sql_error = true;
        }
    }
    echo "$ticker data updated\n\n";
}

if ($sql_error) {
    echo "Rolling back transaction\n";
    $mysqli->rollback();
} else {
    echo "Committing transaction\n";
    $mysqli->commit();
}

$stmt->close();
echo "MySQL connection closed\n";

?>
