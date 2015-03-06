<?php

/**
 * The CF message frontend component Class
 */
class FrontendControllerCF extends \BaseControllerCF
{


    public function getIndex()
    {
        return View::make('frontend::index');
    }


    /**
     * Function to custom query on the db to use for pagination on viewallquestions via Ajax
     * @return object / array
     * @param string $input post data.
     * @param int $page page numher.
     */
    private function retrieveTheMessages($limit, $page = null)
    {
        $retrieve_m = DB::select('SELECT * FROM `messages` ORDER BY `id_message` ASC LIMIT ' . (!empty($page) ? (intval($page) * $limit) . ', ' : '') . $limit . ";");

        return $retrieve_m;
    }


    /**
     * Function for messages called by the Grid View through ajax
     * @return json
     */
    public function postMoremessages()
    {
        $more = $this->retrieveMessages(10, $_POST['page']);
        $processedMessages = array();

        if (!empty($more)) {
            foreach ($more as $id => $message) {
                $processedMessages[] = MessageProcessorCF::getMessage($message->id_message);
            }
            //stringify the array and return it
            echo json_encode($processedMessages);
        } else
            echo 'fail';
    }


    /**
     * Function to retrieve the first 10 messages from the database to be displayed initially on gridview
     * @return array
     */
    public function getGridview()
    {
        $messages = $this->retrieveTheMessages(10);
        $processedMessages = array();

        if (count($messages)) {//there are messages in the table
            foreach ($messages as $id => $message) {
                $processedMessages[] = MessageProcessorCF::getMessage($message->id_message);
            }
        }

        return View::make('frontend::gridview', array(
            'messages' => $processedMessages,
        ));
    }

    /**
     * Function for frontend/analytics view ajax request. Retrieves transaction volumes for that pair from the Message Processor
     * @return json
     */
    public function postTransactionvolume()
    {
        $currencyFrom = $_POST['from'];
        $currencyTo = $_POST['to'];

        return json_encode(MessageProcessorCF::transactionVolumes(array(
            'currencyFrom' => $currencyFrom,
            'currencyTo' => $currencyTo
        )));
    }


    /**
     * Function for frontend/analytics action. The View asks volume transactions for the specific pair from the MessageProcessorCF through ajax
     * @return array
     */
    public function getAnalytics()
    {
        return View::make('frontend::analytics', array(
            'pairs' => MessageProcessorCF::currencyPairs(),
        ));
    }

}