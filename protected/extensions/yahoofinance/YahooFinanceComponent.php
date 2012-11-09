<?php

class YahooFinanceComponent extends CApplicationComponent {

    private $_ticker = null;
    private $_host   = 'http://ichart.finance.yahoo.com/table.csv';

    private $_fromDate = null;
    private $_toDate = null;

    private $_dataKeys = array('date', 'open', 'high', 'low', 'close', 'vol', 'adj');

    /**
     * Returns an array of stock data retrieved from yahoo finance.
     */
    public function getData() {
        $data = array();
        $lines = $this->retrieveYahooData();

        foreach ($lines as $line)
            $data[] = explode(',', $line);

        return $data;
    }

    /**
     * Similar to getData() however only returns the date, open, high, low, close.
     */
    public function getOhlcData() {
        $data = array();
        $lines = $this->retrieveYahooData();

        foreach ($lines as $line)
            $data[] = array_slice(explode(',', $line), 0, 5);
        return $data;
    }

    /**
     * Similar to getData() however only returns the adjusted close.
     */
    public function getCloseData() {
        $data = array();
        $lines = $this->retrieveYahooData();

        foreach ($lines as $line) {
            $data[] = end(explode(',', $line));
        }
        return $data;
    }

    public function setTicker($ticker) {
        $this->_ticker=$ticker;
    }

    public function getTicker() {
        return $this->_ticker;
    }

    public function setFromDate($day, $month, $year) {
        $this->_fromDate = array('d'=>$day, 'm'=>$month-1, 'y'=>$year);
    }

    public function getFromDate() {
        return $this->_fromDate;
    }

    public function setToDate($day, $month, $year) {
        $this->_toDate = array('d'=>$day, 'm'=>$month-1, 'y'=>$year);
    }

    public function getToDate() {
        return $this->_toDate;
    }

    private function retrieveYahooData() {
        $lines = null;
        if(isset($this->_ticker, $this->_fromDate, $this->_toDate)) {
            $queryString = "";
            $queryString .= "&a={$this->_fromDate['m']}";
            $queryString .= "&b={$this->_fromDate['d']}";
            $queryString .= "&c={$this->_fromDate['y']}";
            $queryString .= "&d={$this->_toDate['m']}";
            $queryString .= "&e={$this->_toDate['d']}";
            $queryString .= "&f={$this->_toDate['y']}";
            $queryString .= "&g=d";
            $queryString .= "&ignore=.csv";

            $requestUrl = $this->_host . '?s=' . rawUrlEncode($this->_ticker) . $queryString;

            // Pull data (download CSV as file)
            $csv = file_get_contents($requestUrl);
            $lines = explode("\n", trim($csv));
        }
        return $lines;
    }

}
