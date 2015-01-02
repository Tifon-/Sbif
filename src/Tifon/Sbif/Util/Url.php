<?php


namespace Tifon\Sbif\Util;


class Url {

    const PREVIOUS = 'anteriores';

    const AFTER = 'posteriores';

    const PERIOD = 'periodo';

    const DAYS = 'dias';

    protected $queryType;

    protected $url;

    protected $query;

    protected $dates;

    protected $indexTime;

    protected $years;

    protected $months;

    protected $days;

    public function __construct($url_base) {
        $this->url = $url_base;
        $this->query = array();
        $this->dates = array();
        $this->queryType = '';
        $this->years = array();
        $this->months = array();
        $this->days = array();
        $this->indexTime = 0;
    }



    protected function setTimeElement($element, $value) {
        if (isset($this->{$element}[$this->indexTime])) {
          $this->indexTime++;
        }
        $this->{$element}[$this->indexTime] = $value;
    }


    public function setYear($year) {
        $this->setTimeElement('years', $year);
    }


    public function setMonth($month) {
        $this->setTimeElement('months', $month);
    }

    public function setDay($day) {
      $this->setTimeElement('days', $day);
    }

    public function add($path) {
        $this->url .= '/' . $path;
    }

    public function setQueryType($queryType) {
        $this->queryType = $queryType;
    }

    /**
     *
     */
    public function addQuery(array $data) {
        $this->query += $data;
    }


    private function buildDate($index, $includeDayText = TRUE) {
        $day = $month = $year = '';
        if (isset($this->days[$index])) {
            if ($includeDayText) {
              $day .= '/' . self::DAYS;
            }
            $day .= '/' . $this->days[$index];
        }

        if (isset($this->months[$index])) {
            $month = '/' . $this->months[$index];
        }
        elseif ($day != '') {
            $month = '/' . date('n');
        }

        if (isset($this->years[$index])) {
            $year = $this->years[$index];
        }
        elseif ($month != '') {
            $year = date('Y');
        }

        return $year . $month . $day;
    }

    public function build() {
        switch ($this->queryType) {
          case self::AFTER:
          case self::PREVIOUS:
            $date = $this->buildDate($this->indexTime);
            $this->add($this->queryType);
            $this->add($date);
            break;
          default:
            $date = $this->buildDate($this->indexTime);
            $this->add($date);
        }

        $this->url .= '?' . http_build_query($this->query);

        return $this->url;
    }
}
