<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;
use Excel;

class IndexController extends Controller
{
    //
    public function index()
    {

        return view('welcome')->withTitle('Import Excell-file');
    }
    /* import xlsx or xls files*/
    public function execute(Request $request)
    {
        if($request->file('file')){
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file_type = explode('.', $file_name);
            /*дістаємо сотанній елемент масиву -формат*/
            $file_type = array_pop($file_type);
            if($file_type == 'xlsx' || $file_type == 'xls'){
             $data =  Excel::load($file, function ($reader){})->first();
             /*обходимо коллекцію даних файлу*/
                foreach ($data as $value){
                    $worker = new Worker();
                    $worker->surname = $value->surname;
                    $worker->name = $value->name;
                    $worker->patronymic = $value->patronymic;
                    $worker->born = $value->born;
                    $worker->position = $value->position;
                    $worker->salary = $value->salary;
                    $worker->save();
                }

                return redirect()->back()->with('status','Дані збережено в базі даних.');


            }
            else{
                return back()
                    ->with('error',"Формат файлу має бути: <i>(.xlsx)</i> або <i>(.xls)</i> !");
            }

        }
        else{
            return back()->with('error','Файл не вибрано!');
        }
    }
}
