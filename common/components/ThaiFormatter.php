<?php
namespace common\components;
use DateTime;
use DateTimeZone;
use yii\helpers\FormatConverter;
use yii\base\InvalidParamException;

class ThaiFormatter extends \yii\i18n\Formatter
{
    private $_intlLoaded = false;
    public function init()
    {
        parent::init();
        $this->_intlLoaded = extension_loaded('intl');
        if (!$this->_intlLoaded) {
            if ($this->decimalSeparator === null) {
                $this->decimalSeparator = '.';
            }
            if ($this->thousandSeparator === null) {
                $this->thousandSeparator = ',';
            }
        }
    }
    private function formatDateTimeValue($value, $format, $type)
    {
        $timeZone = $this->timeZone;
        // avoid time zone conversion for date-only values
        if ($type === 'date') {
            list($timestamp, $hasTimeInfo) = $this->normalizeDatetimeValue($value, true);
            if (!$hasTimeInfo) {
                $timeZone = $this->defaultTimeZone;
            }
        } else {
            $timestamp = $this->normalizeDatetimeValue($value);
        }
        if ($timestamp === null) {
            return $this->nullDisplay;
        }
        // intl does not work with dates >=2038 or <=1901 on 32bit machines, fall back to PHP
        $year = $timestamp->format('Y');
        if ($this->_intlLoaded && !(PHP_INT_SIZE === 4 && ($year <= 1901 || $year >= 2038))) {
            if (strncmp($format, 'php:', 4) === 0) {
                $format = FormatConverter::convertDatePhpToIcu(substr($format, 4));
            }
            if (isset($this->_dateFormats[$format])) {
                if ($type === 'date') {
                    $formatter = new IntlDateFormatter($this->locale, $this->_dateFormats[$format], IntlDateFormatter::NONE, $timeZone, $this->calendar);
                } elseif ($type === 'time') {
                    $formatter = new IntlDateFormatter($this->locale, IntlDateFormatter::NONE, $this->_dateFormats[$format], $timeZone, $this->calendar);
                } else {
                    $formatter = new IntlDateFormatter($this->locale, $this->_dateFormats[$format], $this->_dateFormats[$format], $timeZone, $this->calendar);
                }
            } else {
                $formatter = new IntlDateFormatter($this->locale, IntlDateFormatter::NONE, IntlDateFormatter::NONE, $timeZone, $this->calendar, $format);
            }
            if ($formatter === null) {
                throw new InvalidConfigException(intl_get_error_message());
            }
            // make IntlDateFormatter work with DateTimeImmutable
            if ($timestamp instanceof \DateTimeImmutable) {
                $timestamp = new DateTime($timestamp->format(DateTime::ISO8601), $timestamp->getTimezone());
            }
            return $formatter->format($timestamp);
        } else {
            if (strncmp($format, 'php:', 4) === 0) {
                $format = substr($format, 4);
            } else {
                $format = FormatConverter::convertDateIcuToPhp($format, $type, $this->locale);
            }
            if ($timeZone != null) {
                if ($timestamp instanceof \DateTimeImmutable) {
                    $timestamp = $timestamp->setTimezone(new DateTimeZone($timeZone));
                } else {
                    $timestamp->setTimezone(new DateTimeZone($timeZone));
                }
            }
            return $timestamp->format($format);
        }
    }
    /*
    *Override
    */
    public function asDate($value, $format = null)
    {
        if ($format === null) {
            $format = $this->dateFormat;
        }
        return $this->setBuddistText($this->formatDateTimeValue($value, $format, 'date'));
    }
    /*
    *Override
    */
    public function asDatetime($value, $format = null)
    {
        if ($format === null) {
            $format = $this->datetimeFormat;
        }
        return $this->setBuddistText($this->formatDateTimeValue($value, $format, 'datetime'));
    }
    /*
    *Override
    */
    protected function normalizeDatetimeValue($value, $checkTimeInfo = false)
    {
        // checking for DateTime and DateTimeInterface is not redundant, DateTimeInterface is only in PHP>5.5
        if ($value === null || $value instanceof DateTime || $value instanceof DateTimeInterface) {
            // skip any processing
            return $checkTimeInfo ? [$value, true] : $value;
        }
        if (empty($value)) {
            $value = 0;
        }
        try {
            if (is_numeric($value)) { // process as unix timestamp, which is always in UTC
                $timestamp = new DateTime();
                $timestamp->setTimezone(new DateTimeZone('UTC'));
                $timestamp->setTimestamp($value);
                $timestamp = $this->setBuddistYear($timestamp);
                return $checkTimeInfo ? [$timestamp, true] : $timestamp;
            } elseif (($timestamp = DateTime::createFromFormat('Y-m-d', $value, new DateTimeZone($this->defaultTimeZone))) !== false) { // try Y-m-d format (support invalid dates like 2012-13-01)
                $timestamp = $this->setBuddistYear($timestamp);
                return $checkTimeInfo ? [$timestamp, false] : $timestamp;
            } elseif (($timestamp = DateTime::createFromFormat('Y-m-d H:i:s', $value, new DateTimeZone($this->defaultTimeZone))) !== false) { // try Y-m-d H:i:s format (support invalid dates like 2012-13-01 12:63:12)
                $timestamp = $this->setBuddistYear($timestamp);
                return $checkTimeInfo ? [$timestamp, true] : $timestamp;
            }
            // finally try to create a DateTime object with the value
            if ($checkTimeInfo) {
                $timestamp = new DateTime($value, new DateTimeZone($this->defaultTimeZone));
                $info = date_parse($value);

                return [$timestamp, !($info['hour'] === false && $info['minute'] === false && $info['second'] === false)];
            } else {
                return new DateTime($value, new DateTimeZone($this->defaultTimeZone));
            }
        } catch (\Exception $e) {
            throw new InvalidParamException("'$value' is not a valid date time value: " . $e->getMessage()
                . "\n" . print_r(DateTime::getLastErrors(), true), $e->getCode(), $e);
        }
    }

    public function setBuddistYear(DateTime $timestamp){
        if($this->locale == 'th' || $this->locale == 'th_TH' || $this->locale == 'th-TH'){
            $this->defaultTimeZone = 'UTC+7';
            return $timestamp->setDate($timestamp->format('Y') + 543, $timestamp->format('m'), $timestamp->format('d'));
        }else{
            return $timestamp;
        }
    }

    public function setBuddistText($date)
    {
        return str_replace('ค.ศ.','พ.ศ.',$date);
    }
}
