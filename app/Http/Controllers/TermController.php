<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
 public function createTerm(Request $request){

     $request->validate([
         'term_ka' => 'required',
         'description_ka' => 'required',
         'term_en' => 'required',
         'description_en' => 'required',
     ]);

     $term=new Term();
     $term->setTranslation('term','ka', $request->term_ka);
     $term->setTranslation('description', 'ka', $request->description_ka);
     $term->setTranslation('page_title', 'ka', $request->page_title_ka);
     $term->setTranslation('term','en', $request->term_en);
     $term->setTranslation('description', 'en', $request->description_en);
     $term->setTranslation('page_title', 'en', $request->page_title_en);
     $term->save();

     return back();

 }

 public function deleteTerm(Request $request){
       $term=Term::find($request->id);
     $term->delete();
     return back();
 }


    public function updateTerm(Request $request){

        $request->validate([
            'term_ka' => 'required',
            'description_ka' => 'required',
            'term_en' => 'required',
            'description_en' => 'required',
        ]);

        $term=Term::find($request->id);
        $term->setTranslation('term','ka', $request->term_ka);
        $term->setTranslation('description', 'ka', $request->description_ka);
        $term->setTranslation('page_title', 'ka', $request->page_title_ka);
        $term->setTranslation('term','en', $request->term_en);
        $term->setTranslation('description', 'en', $request->description_en);
        $term->setTranslation('page_title', 'en', $request->page_title_en);
        $term->save();

        return back();

    }
}
