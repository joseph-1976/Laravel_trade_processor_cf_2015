<?php

/**
 * The CF message processor component Class.
 */
class MessageProcessorCF
{

    /**
     * Function that processes the message
     * Checks if json format is correct and all fields needed are set in the request json
     * @return array
     * @param string $message message data.
     */
    public static function processMessage($message)
    {
        $processed = $message['attributes'];

        //format the float numbers
        $processed['amountBuy'] = round($processed['amountBuy'], 2);
        $processed['amountSell'] = round($processed['amountSell'], 2);
        $processed['rate'] = round($processed['rate'], 4);

        return $processed;
    }


    /**
     * Function that retrieves a message from the database
     * Checks if json format is correct and all fields needed are set in the request json
     * @return mixed
     * @param string $id message ID
     */
    public static function getMessage($id)
    {
        $message = Message::find($id);

        if (!empty($message))
            return MessageProcessorCF::processMessage($message);

        return false;
    }

    /**
     * Function that retrieves all unique currency pairs (FROM/TO) from the existing database
     * Checks if json format is correct and all fields needed are set in the request json
     * @return array
     */
    public static function currencyPairs()
    {
        $pairs = array();

        $currencyFrom = DB::select("SELECT DISTINCT(`currencyTo`) FROM `messages`;");
        if (!empty($currencyFrom)) {
            foreach ($currencyFrom as $id => $currency) {
                $currency_pair = DB::select("SELECT DISTINCT(`currencyFrom`) FROM `messages` WHERE `currencyTo` = '" . $currency->currencyTo . "';");

                if (!empty($currency_pair)) {
                    foreach ($currency_pair as $id2 => $currency_p) {
                        $pairs[] = array(
                            'to' => $currency->currencyTo,
                            'from' => $currency_p->currencyFrom
                        );
                    }
                }
            }
        }

        return $pairs;
    }


    /**
     * Function that retrieves a SUM for the currency pair on a given day
     * @return mixed
     * @param string $id message ID
     */
    public static function getVolume($currencyPair, $day)
    {
        //retrieve SUM of amountBUY between 12 am and 11:59:59 pm on the specific day
        $volume = DB::select("SELECT SUM(`amountBuy`) FROM `messages` WHERE `currencyFrom` = '" . $currencyPair['currencyFrom']
            . "' AND `currencyTo` = '" . $currencyPair['currencyTo']
            . "' AND `timePlaced` >= '" . $day . " 00:00:00' AND `timePlaced` <= '" . $day . " 23:59:59';");

        if (!empty($volume))
            return (array)$volume[0];//transform to array

        return 0;
    }

    /**
     * Function that retrieves min/max of currency pair
     * @return mixed
     * @param array $currencyPair cPair data
     */
    public static function getMinMax($currencyPair)
    {
        $minmax = DB::select("SELECT MIN(`timePlaced`), MAX(`timePlaced`) FROM `messages` WHERE "
            . "`currencyFrom` = '" . $currencyPair['currencyFrom'] . "' AND `currencyTo` = '" . $currencyPair['currencyTo'] . "';");

        if (!empty($minmax))
            return (array)$minmax[0];//transform to array

        return null;
    }

    /**
     * Function based on a currency pair, retrieves transaction volumes per day
     * @return int
     * @param array $currencyPair cPair data
     */
    public static function transactionVolumes($currencyPair)
    {
        $volume = array();

        $pair_daterange = MessageProcessorCF::getMinMax($currencyPair);

        if (!empty($pair_daterange)) {
            $start = new DateTime($pair_daterange['MIN(`timePlaced`)']);
            $end = new DateTime($pair_daterange['MAX(`timePlaced`)']);
            $interval = $end->diff($start);

            for ($i = 0; $i <= $interval->days; $i++) {
                $vol = MessageProcessorCF::getVolume($currencyPair, $start->format('Y-m-d'));
                $volume[$start->format('Y-m-d')] = round($vol['SUM(`amountBuy`)'], 2);//round the value to decimal precision
                $start->modify('+1 day');
            }
        }

        return $volume;
    }
}

?>
