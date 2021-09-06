<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Administration;
 
use PDF;
   
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function students()
    {
        // Fetch all customers from database
        $data = Student::join('courses', 'students.course_id', '=', 'courses.id')->orderBy( 'students.id', 'desc' )->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView( 'PDFs.students', ['items' => $data] );
        // If you want to store the generated pdf to the server then you can use the store function
        /*$pdf->save( storage_path().'_filename.pdf' );
        */
        // Finally, you can download the file using download function
        $now = new \DateTime();
        return $pdf->download( 'estudiantes'.$now->format( 'd-m-Y' ).'_.pdf' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teachers()
    {
        // Fetch all customers from database
        $data = Teacher::orderBy( 'id', 'desc' )->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView( 'PDFs.teachers', ['items' => $data] );
        // If you want to store the generated pdf to the server then you can use the store function
        /*$pdf->save( storage_path().'_filename.pdf' );
        */
        // Finally, you can download the file using download function
        $now = new \DateTime();
        return $pdf->download( 'maestros'.$now->format( 'd-m-Y' ).'_.pdf' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function administrations()
    {
        // Fetch all customers from database
        $data = Administration::orderBy( 'id', 'desc' )->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView( 'PDFs.administrations', ['items' => $data] );
        // If you want to store the generated pdf to the server then you can use the store function
        /*$pdf->save( storage_path().'_filename.pdf' );
        */
        // Finally, you can download the file using download function
        $now = new \DateTime();
        return $pdf->download( 'administrativo'.$now->format( 'd-m-Y' ).'_.pdf' );
    }
}