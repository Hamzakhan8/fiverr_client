<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Customer;
use App\Models\CustomerList;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CustomerListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerlists=CustomerList::all();

        return view('dashboard.customerlist.index',compact('customerlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function download_pdf(){


    $test_pdf = Campaign::where('active', 1)->with('customer_lists')->get();

    $custom_Paper = array(0,0,500,678);

    $pdf = App::make('dompdf.wrapper', $test_pdf->toArray());
    $pdf->loadView('dashboard.customerlist.viewpdf', compact('test_pdf'))->setPaper($custom_Paper);

    return $pdf->stream('testpdf.pdf');

   }

   function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}


   public function importCsv(Request $request)
{
    $file = $request->csv_file;

    $customerArr = $this->csvToArray($file);

    for ($i = 0; $i < count($customerArr); $i ++)
    {
        Customer::firstOrCreate($customerArr[$i]);
    }

    return redirect()->route('opticians')
    ->with('created', 'CSV imported');  
}

   

    public function export_into_csv(){
        return Excel::download(new CustomersExport, 'customers.csv');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','alpha','string'],

         ]);

         CustomerList::create([

            'name'=>$request['name']

         ]);
         return redirect()->route('customerlist')
         ->with('created', 'customer has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => ['required','alpha','string'],

    ]);

    $optician_update = CustomerList::FindOrFail($id);

    $optician_update->update([

       'name'=>$request['name']

    ]);
    return redirect()->route('customerlist')
    ->with('created', 'customer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerList::findOrFail($id)->delete();

        return redirect()->route('customerlist');
    }
}
