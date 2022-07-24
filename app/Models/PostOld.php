<?php
namespace App\Models;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class PostPast 
{
   
    public $title="";
    public $body="";
    public $date=2;
    public $expert="";
    public $file="";
    public $published_at="";

    function __construct($title="",$body="",$date=23,$expert="",$file="") {
            $this->title = $title;
            $this->body = $body;
            $this->date = $date;
            $this->expert = $expert;
            $this->file = $file;
    }

    public static function all(){

        return cache()->remember("soso}",1,function(){ 
                return collect(File::files(resource_path("posts")))
                ->map(function($file){
                    return YamlFrontMatter::parse($file->getContents());
                })
                ->map(function($doc){
                   return  new Post($doc->matter('title'),
                    $doc->body(),
                    $doc->matter('date'),
                    $doc->matter('expert'),
                    $doc->matter('file'));
                })
                ->sortBy("date");



        });
    }


    public static function find($slugPost){

         // getting the file name
        $path = resource_path("posts/{$slugPost}.html");


        // saftey check
        if(!file_exists($path)){
            abort(404);
        }

        // reading with file content
        // csching the resulr for extensive operation
        return cache()->remember("soso.{$slugPost}",now()->addDay(2),function() use($path){ 
        
            $doc = YamlFrontMatter::parseFile($path);
            $post = new Post($doc->matter('title'),
                    $doc->body(),
                    $doc->matter('date'),
                    $doc->matter('expert'),
                    $doc->matter('file'));
        

                //  ddd($post);
        return $post;
        });
    
    }
}
