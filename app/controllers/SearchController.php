<?php
namespace App\Controllers;
use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
class SearchController extends BaseController
{
    public $table_name ='products';
    public  $getTheData = true;
    public $searchTerm = '';

     public function __construct(){
        if(!empty($this->searchTerm)){
            $this->searchTerm = $_GET['searchTerm']; 
        }
            $totalResultCount = Product::where('title', 'LIKE', "%{$this->searchTerm}%")->count();
            list($this->products, $this->links) = paginateSearchResult(1, $totalResultCount, $this->table_name, new Product , $this->searchTerm);
     }
     
     function search(){
           $searchResults = $this->products;
           $links = $this->links;
           $searchTerm =$this->searchTerm;
            return view('search', compact('searchResults', 'searchTerm' , 'links'));
    } 
}