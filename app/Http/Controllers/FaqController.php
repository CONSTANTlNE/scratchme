<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index(Request $request){
        $locales  = Language::all()->toArray();
        $faqs=Faq::all();
        return view('admin.pages.faq', compact('locales','faqs'));
    }

    public function createFaq(Request $request){
//        $locales  = Language::all()->toArray();

        $faq=new Faq();
        $faq->setTranslation('question', app()->getLocale(), $request->question);
        $faq->setTranslation('answer', app()->getLocale(), $request->answer);
        $faq->save();
        return back();
    }


    public function updateFaq(Request $request){
//        $locales  = Language::all()->toArray();
        $faq=Faq::find($request->id);
        $faq->setTranslation('question', app()->getLocale(), $request->question);
        $faq->setTranslation('answer', app()->getLocale(), $request->answer);
        $faq->save();
        return back();
    }

    public function faqDelete(Request $request){
//        $locales  = Language::all()->toArray();
        $faq=Faq::find($request->id);
        $faq->delete();
        return back();
    }
}
