<?php

namespace App\Http\Controllers\URL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

use App\Models\URLShort;
use App\Models\Website;

class UrlController extends Controller
{
    public function store(Request $request){

        //TODO: Check url exists ?
        $url = URLShort::whereUrl($request->url)->first();

        //If url exists then just show the short url
        //Else generate a short url and save to DB and display the short url

        if($url == null){
            $short = $this->generateShortURL();
            URLShort::create([
                'url' => $request->url,
                'short' => $short
            ]);

            $url = URLShort::whereUrl($request->url)->first();
        }

        // return view('url.short_url', compact('url'));     
        return $url;     

      
    }


    public function generateShortURL(){
        $result = base_convert(rand(1000,99999), 10, 36);
        $data = URLShort::whereShort($result)->first();

        if($data != null){
            $this->generateShortURL();
        }

        return $result; 

    }

    public function shortLink($link){
        $url = URLShort::whereShort($link)->first();
        return redirect($url->url);
    }

    public function show($link){
        $url = URLShort::whereShort($link)->first();
        return redirect($url->url);        
    }

    public function index(){
        return URLShort::all();
    }


    public function websites(){
    //    $existData = Website::all();
         $existData = Website::limit(100)->offset(1)->get();

       if($existData->isEmpty()){          
        $row = 1;
        if (($handle = fopen("top.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);          
                $row++;
                $dataField = [];

                for ($c=0; $c < $num; $c++) {              
                    array_push($dataField, $data[$c]);       
                
                }     

                Website::create([
                    'rank' => $dataField[0],
                    'url' => $dataField[1],
                    'root' => $dataField[2],
                    'links' => $dataField[3],
                    'mozrank' => $dataField[4],
                    'moztrust' => $dataField[5]
                    ]);           

                }
            fclose($handle); 
           
          }       
       }

       return $existData;           
       
    }

   

    public function update(Request $request){
        
    }

    public function destroy(Request $request){
        
    }

  


}
