<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Johntaa\Arabic\I18N_Arabic;
use App\Models\Design;

class TestImage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addText(Request $request, $design)
    {
        $design = Design::find($design);
        //$text = " محمد خفاجي ";
        $text = $request->text;
        $image = Image::make(public_path('storage/'.$design->image));
        $Arabic = new \I18N_Arabic('Glyphs');
        $text = $Arabic->utf8Glyphs($text);
        $text = mb_convert_encoding($text, 'UTF-8');
        $image->text($text, 2250, 4000, function($font) {
            $font->file(public_path('fonts/Greta-Arabic-AR-LT-Heavy.ttf'));
            $font->size(200);
            $font->color('#788c71');
            $font->align('center');
            $font->valign('middle');
        
        });
        
        $image->save(public_path('images/my-image-with-text.jpg'));
        return view('card-details');
    }
    public function allCards(Request $request){
        $designs = Design::all();
        return view('all-cards',compact('designs'));
    }

    public function Card(Request $request, $design){
        $design = Design::find($design);
        return view('welcome',compact('design'));
    }
    
}
