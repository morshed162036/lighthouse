<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Herosection;
use App\Models\Counter;
use App\Models\HomeAboutUS;
use App\Models\HomeAgeSpecific;
class HeroSectionController extends Controller
{
    public function heroSection (Request $request)
    {
        $herosection = Herosection::get()->first();
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $herosection->main_title = $request->main_title;
            $herosection->top_title = $request->top_title;
            $herosection->description = $request->description;
            $herosection->rating = $request->rating;
            $herosection->button_text = $request->button_text;

            if($request->hasFile('image_1')){
                $exists = 'images/herosection/'.$herosection->image_1;
                if(File::exists($exists))
                {
                    File::delete($exists);
                }
                $image_temp = $request->file('image_1');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = time().'.'.$extension;
                    $imagePath = 'images/herosection';
                    $image_temp->move(public_path($imagePath),$imageName);
                    $herosection->image_1 = $imageName;
                }
            }
            if($request->hasFile('image_2')){
                $exists = 'images/herosection/'.$herosection->image_2;
                if(File::exists($exists))
                {
                    File::delete($exists);
                }
                $image_temp = $request->file('image_2');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = time().'2'.$extension;
                    $imagePath = 'images/herosection';
                    $image_temp->move(public_path($imagePath),$imageName);
                    $herosection->image_2 = $imageName;
                }
            }
            $herosection->update();
            return redirect(route('heroSection'))->with('success','Update Complete!!');
        }
        return view('backend.homepage.herosection',compact('herosection'));
    }
    public function counter (Request $request)
    {
        $counter = Counter::get()->first();
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $counter->title = $request->title;
            $counter->bellow_text = $request->bellow_text;
            $counter->branches = $request->branches;
            $counter->content = $request->content;
            $counter->button_text = $request->button_text;
            $counter->teachers = $request->teachers;
            $counter->students = $request->students;
            $counter->founded = $request->founded;
            $counter->staff = $request->staff;
            $counter->campus = $request->campus;
            if($request->hasFile('bg')){
                $exists = 'images/counter/'.$counter->bg;
                if(File::exists($exists))
                {
                    File::delete($exists);
                }
                $image_temp = $request->file('bg');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = time().'.'.$extension;
                    $imagePath = 'images/counter';
                    $image_temp->move(public_path($imagePath),$imageName);
                    $counter->bg = $imageName;
                }
            }
            $counter->update();
            return redirect(route('counter'))->with('success','Update Complete!!');
        }
        return view('backend.homepage.counter',compact('counter'));
    }
    public function homeAboutUs (Request $request)
    {
        $aboutus = HomeAboutUS::get()->first();
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $aboutus->title = $request->title;
            $aboutus->content = $request->content;

            if($request->hasFile('image')){
                $exists = 'images/aboutus/'.$aboutus->image;
                if(File::exists($exists))
                {
                    File::delete($exists);
                }
                $image_temp = $request->file('image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = time().'.'.$extension;
                    $imagePath = 'images/aboutus';
                    $image_temp->move(public_path($imagePath),$imageName);
                    $aboutus->image = $imageName;
                }
            }
            $aboutus->update();
            return redirect(route('homeAboutUs'))->with('success','Update Complete!!');
        }
        return view('backend.homepage.aboutus',compact('aboutus'));
    }
    public function homeAgeSpecific (Request $request,string $id = null)
    {
        $ages = HomeAgeSpecific::get()->all();
        // dd($ages);
        if($id){
            $age = HomeAgeSpecific::findorfail($id);
        }
        else {
            $age= '';
        }
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $age->title = $request->title;
            $age->content = $request->content;

            if($request->hasFile('image')){
                $exists = 'images/agespecific/'.$age->image;
                if(File::exists($exists))
                {
                    File::delete($exists);
                }
                $image_temp = $request->file('image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension = $image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = time().'.'.$extension;
                    $imagePath = 'images/agespecific';
                    $image_temp->move(public_path($imagePath),$imageName);
                    $age->image = $imageName;
                }
            }
            $age->update();
            return redirect(route('homeAgeSpecific'))->with('success','Update Complete!!');
        }
        return view('backend.homepage.agespecific',compact('ages','age'));
    }
}
