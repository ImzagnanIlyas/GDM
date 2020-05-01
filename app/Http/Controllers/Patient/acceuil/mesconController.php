<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Consultation;
use App\Medicament;
use App\Prescription_medicamenteuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class mesconController extends Controller
{

    public function index()
    {
        $patient = Auth::guard('patient')->user();

 return view('patient.acceuil.mescon' , [

    'patient'=> $patient ,



 ]);
    }
    public function show($id){
 $patient = Auth::guard('patient')->user();
 $consultations =  Consultation::select('id')
 ->where('patient_id',$patient->id)
 ->get()
 ->toArray();


$id=Consultation::find($id);

                   return view('patient.acceuil.DetailCon' , compact('id') , [
'patient'=>$patient,
                    'consultations'=>$consultations ,
                    'id'=>$id

                ]

            );
    }

function search(Request $request)
{
    if($request->ajax())
    {
     $output = '';
     $query = $request->get('query');
     if($query != '')
     {
        $patient = Auth::guard('patient')->user();
        $consultations =  Consultation::select('id')
        ->where('patient_id',$patient->id)
        ->get()
        ->toArray();
      $data = Consultation::select('*')
      ->whereIn('id' , array_values( $consultations))
      ->where('date', 'like', '%'.$query.'%')
        ->get();

     }
     else
     {
        $patient = Auth::guard('patient')->user();
        $consultations =  Consultation::select('id')
        ->where('patient_id',$patient->id)
        ->get()
        ->toArray();
        $data = Consultation::select('*')
        ->whereIn('id' , array_values( $consultations))
         ->get();
     }
     $total_row = $data->count();
     if($total_row > 0)
     {
      foreach($data as $row)
      {
       $output .= '
       <tr>
        <td>'.$row->id.'</td>
        <td>'.$row->date.'</td>
        <td>'.$row->lieu.'</td>
        <td><a href="'.route('detail' ,[$row->id]).'" class="btn btn-primary">Détail</a></td>

       </tr>
       ';
      }
     }
     else
     {
      $output = '
      <tr>
       <td align="center" colspan="5">No Data Found</td>
      </tr>
      ';
     }
     $data = array(
      'table_data'  => $output,
      'total_data'  => $total_row
     );

     echo json_encode($data);
    }
   }

}

