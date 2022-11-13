<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $globalArr = ['Sapi', 'Kambing', 'Kuda'];

    public function index()
    {
        foreach($this->globalArr as $val){
            echo $val;
            echo "\n";
        }
    }

    public function get_data_by_index(Request $request, $id)
    {
        echo 'Get data array by index ke ' . $id;
        echo "\n";
        echo $this->globalArr[$id];
    }
    
    public function create(Request $request)
    {
        echo 'Data sebelum melakukan store data array';
        echo "\n";

        echo $this->index();
        
        echo "\n";
        echo 'Data setelah store data array';
        echo "\n";
        array_push($this->globalArr, $request->name);
        echo $this->index();
    }

    public function update(Request $request)
    {
        echo 'Data sebelum melakukan update data array';
        echo "\n";

        echo $this->index();
        
        echo "\n";
        echo 'Data setelah update data array';
        echo "\n";
        $this->globalArr = array_replace($this->globalArr, array($request->index => $request->name));
        echo $this->index();
    }

    public function delete(Request $request)
    {
        echo 'Data sebelum melakukan delete data array';
        echo "\n";

        echo $this->index();
        
        echo "\n";
        echo 'Data setelah delete data array';
        echo "\n";
        unset($this->globalArr[$request->index]);
        echo $this->index();
    }
}
