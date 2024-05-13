<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('hi', function($botman) {
            $this->askName($botman);
        });
        $botman->hears('services', function($botman) {
            $botman->reply('We offer a variety of services including manicures, pedicures, facials, and massages. How can I assist you today?');
        });

        $botman->hears('manicure', function($botman) {
            $this->provideManicureDetails($botman);
        });

        $botman->hears('pedicure', function($botman) {
            $this->providePedicureDetails($botman);
        });

        $botman->hears('facial', function($botman) {
            $this->provideFacialDetails($botman);
        });

        $botman->hears('massage', function($botman) {
            $this->provideMassageDetails($botman);
        });

        $botman->hears('price list', function($botman) {
            $this->providePriceList($botman);
        });

        $botman->hears('booking', function($botman) {
            $this->provideBookingInfo($botman);
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you '.$name);
        });
    }


    public function provideManicureDetails($botman)
    {
        $botman->ask('Our manicure services include classic manicures, gel manicures, and spa manicures. Would you like to know more or book an appointment?', function(Answer $answer) use ($botman) {
            $response = strtolower($answer->getText());
            if (strpos($response, 'book') !== false) {
                $this->provideBookingInfo($botman);
            } else {
                $botman->say('For more details, please visit our manicure services page.');
            }
        });
    }

    public function providePedicureDetails($botman)
    {
        $botman->ask('We offer classic pedicures, spa pedicures, and deluxe pedicures. Would you like to know more or book an appointment?', function(Answer $answer) use ($botman) {
            $response = strtolower($answer->getText());
            if (strpos($response, 'book') !== false) {
                $this->provideBookingInfo($botman);
            } else {
                $botman->say('For more details, please visit our pedicure services page.');
            }
        });
    }

    public function provideFacialDetails($botman)
    {
        $botman->ask('Our facial services include deep cleansing facials, hydrating facials, and anti-aging facials. Would you like to know more or book an appointment?', function(Answer $answer) use ($botman) {
            $response = strtolower($answer->getText());
            if (strpos($response, 'book') !== false) {
                $this->provideBookingInfo($botman);
            } else {
                $botman->say('For more details, please visit our facial services page.');
            }
        });
    }

    public function provideMassageDetails($botman)
    {
        $botman->ask('We provide Swedish massages, deep tissue massages, and hot stone massages. Would you like to know more or book an appointment?', function(Answer $answer) use ($botman) {
            $response = strtolower($answer->getText());
            if (strpos($response, 'book') !== false) {
                $this->provideBookingInfo($botman);
            } else {
                $botman->say('For more details, please visit our massage services page.');
            }
        });
    }

    public function providePriceList($botman)
    {
        $botman->say('You can view our price list at the Services page. Do you need information on a specific service?');
    }

    public function provideBookingInfo($botman)
    {
        $botman->say('To book an appointment, please visit our appointments page.');
    }
}
