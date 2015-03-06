<?php

/**
 * The CF message consumer component Class
 */
class MessageControllerCF extends \BaseController
{

    /**
     * Function that receives the json from postCreate and...
     * Checks if json format is correct and all fields needed are set in the request json
     * @return bool
     * @param string $input post data.
     */
    private function validateData($input)
    {
        //check if input has all the fields required
        if (!empty($input['userId']) && !empty($input['currencyFrom'])
            && !empty($input['currencyTo']) && !empty($input['amountSell'])
            && !empty($input['amountBuy']) && !empty($input['rate'])
            && !empty($input['timePlaced']) && !empty($input['originatingCountry'])
        ) {
            //if input has all the fields required for a message, return true
            return true;
        }

        //validation failed, return false
        return false;
    }


    /**
     * Function that creates a message entry in the db with the specific input data
     * @return bool
     * @param string $input post data.
     */
    private function createMessage($input)
    {
        //associate a new entry with the input data
        $message = new Message;
        $message->userId = $input['userId'];
        $message->currencyFrom = $input['currencyFrom'];
        $message->currencyTo = $input['currencyTo'];
        $message->amountSell = $input['amountSell'];
        $message->amountBuy = $input['amountBuy'];
        $message->rate = $input['rate'];
        $message->timePlaced = date('Y-m-d H:i:s', strtotime($input['timePlaced']));
        $message->originatingCountry = $input['originatingCountry'];

        //save the entry in the db and return true if success
        if ($message->save())
            return true;

        //saving to db failed, return false
        return false;
    }


    /**
     * Function endpoint for receiving json message data (message/create)
     * @return string
     */
    public function InvokedPost()

    {
        $input = Input::all();
        if ($this->validateData($input)) {
            //try to save the message to the db
            if ($this->createMessage($input)) {
                //message saved properly, respond 200 OK
                return Response::make('Message created', 200);
            }

            //message not saved
            //respond with 500 Internal Error
            return Response::make('Error while saving the message', 500);
        } else {
            //json format validation failed, respond 400 Bad Request
            return Response::make('Bad Request', 400);
        }
    }

}