<?php

class YahooFinanceComponent extends CApplicationComponent {

    private $_ticker = null;
    private $_host   = 'http://ichart.finance.yahoo.com/table.csv';

    private $_fromDate;
    private $_toDate;

    /**
     * Returns an array of stock data retrieved from yahoo finance. Each element contains keys: date, open, high, low, close, vol, and adj.
     */
    public function getData() {
        $data = null;

        if(isset($this->_ticker)) {
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
            $data = "";

            foreach ($lines as $line) {
                $cells = explode(',', $line);
                $data[] = array(
                    'date'  => $cells[0],
                    'open'  => $cells[1],
                    'high'  => $cells[2],
                    'low'   => $cells[3],
                    'close' => $cells[4],
                    'vol'   => $cells[5],
                    'adj'   => $cells[6],
                );
            }
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

}
