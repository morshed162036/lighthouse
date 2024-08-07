<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Herosection;
use App\Models\Counter;
use App\Models\HomeAboutUs;
use App\Models\HomeAgeSpecific;
class FrontendController extends Controller
{
    public function index(){
        $herosection = Herosection::get()->first();
        $counter = Counter::get()->first();
        $aboutus = HomeAboutUs::get()->first();
        $agespecifics = HomeAgeSpecific::get()->all();
        return view('frontend.index',compact('herosection','counter','aboutus','agespecifics'));
    }

    public function vision(){
        return view('frontend.vision');
    }

    public function message(){
        return view('frontend.principal_massage');
    }
    public function choose(){
        return view('frontend.choose_us');
    }

    public function team(){
        return view('frontend.team');
    }

    public function curriculam(){
        return view('frontend.curriculam');
    }
    public function calender(){
        return view('frontend.calender');
    }
    public function campus(){
        return view('frontend.campus');
    }
    public function event(){
        return view('frontend.event');
    }
    public function gallery(){
        return view('frontend.gallery');
    }

    public function addmission_procedure(){
        return view('frontend.admission_procedure');
    }

    public function fees(){
        return view('frontend.fees');
    }

    public function how_to_apply(){
        return view('frontend.layouts.how_applay');
    }

    public function applay_online(){
        return view('frontend.applay_online');
    }

    public function online_payment(){
        return view('frontend.online_payment');
    }

    public function contuct(){
        return view('frontend.contuct');
    }

    public function notice(){
        return view('frontend.notice');
    }

    public function book(){
        return view('frontend.book');
    }

    public function cafeteria(){
        return view('frontend.cafeteria');
    }
    public function transport(){
        return view('frontend.transport');
    }

    public function ielts(){
        return view('frontend.ielts');
    }

    public function summer_camp(){
        return view('frontend.summer_camp');
    }

    public function winter_camp(){
        return view('frontend.winter_camp');
    }

    public function achivement(){
        return view('frontend.achivement');
    }
    public function polices(){
        return view('frontend.policy');
    }

    public function facilities(){
        return view('frontend.facility');
    }

    public function tour_request(){
        return view('frontend.tour');
    }

    public function login(){
        return view('frontend.login');
    }
}
