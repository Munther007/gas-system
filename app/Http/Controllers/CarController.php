<?php

namespace App\Http\Controllers;

use App\Exports\CarsExport;
use App\Exports\UsersExport;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Rules\Recaptcha;
use App\Traits\UploadImageTrait;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Barryvdh\DomPDF;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS2D;
use Elibyy\TCPDF\Facades\TCPDF;
use function Symfony\Component\HttpFoundation\Session\Storage\Handler\getSelectSql;

class CarController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $cars = Car::paginate(10);
        return view('cars.allCars', compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     * @throws ValidationException
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'token' => "required|recaptcha:test",
//        ]);
//
//        $recaptcha = new ReCaptcha(env("RECAPTCHA_SECRET"));
//        $recaptchaResponse = $recaptcha
//            ->setExpectedAction('test')
//            ->setExpectedHostname(preg_replace('#^https?://#', '', rtrim(env("APP_URL"), '/')))
//            ->verify($request->get('token'));


//        $this -> validate($request, [
//            'g-recaptcha-response' =>
//                ['required', new Recaptcha()]]);

//         Recaptcha passed, do what ever you need

        $random_code = Str::random(10);

        $car = Car::create([
            'owner_name' => $request->owner_name,
            'number_type' => $request->number_type,
            'car_number' => $request->car_number,
            'car_letter' => $request->car_letter,
            'government_name' => $request->government_name,
            'document_number' => $request->document_number,
            'mobile' => $request->mobile,
            'car_type' => $request->car_type,
            'family_number' => $request->family_number,
            'id_card_number' => $request->id_card_number,
            'resident_number' => $request->resident_number,
            'document_front_photo' => $this->uploadImage1($request, 'imgs'),
            'document_back_photo' => $this->uploadImage2($request, 'imgs'),
            'id_card_photo' => $this->uploadImage3($request, 'imgs'),
            'car_photo' => $this->uploadImage4($request, 'imgs'),
            'resident_card_photo' => $this->uploadImage5($request, 'imgs'),
            'random_code' => $random_code
        ]);

//        Cookie::queue(Cookie::make('id', $car->id, 60));
//        $content = Cookie::has('id');
//        $content = $request->cookie('id');
//        $no = 1;
//        $pageId = $content + $no;

//        return Redirect::to('cars/' . $pageId);
        $id = $car->id ;
        Cookie::queue(Cookie::make('id', $id, 60));
        $content = Cookie::has('id');

        return Redirect::route('show2' , compact('id'));
//        return Redirect::to('cars/'. $id);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return string
     */
    public function show($id)
    {


        $content = Cookie::get('id');


        // dd($content);
//        if (Cookie::has('id')) {
//            $car = Car::find($id);
//            return view('cars.showID', compact('car'));
//        } else {
//            return "Try again and check the barcode ";
//        }
        Cookie::has('id');
        $car = Car::find($id);
        return view('cars.showID', compact('car'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @param $id
     * @return string
     */
    public function show2($id)
    {
        $content = Cookie::get('id');

        if (Cookie::has('id'))
         {
             $car = Car::find($content);
             return view('cars.info', compact('car'));
        } else {
            return "Try again and check the barcode " ;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return string
     */
    public function update(Request $request)
    {

        try {
            Cookie::has('id');
            $cookie = Cookie::get('id');

            $car = Car::find($cookie);
            $active_state = $car->active_state;
            if($active_state == false){
                $car->active_state = true;
                $car->save();
                return \redirect('scan')->with('success','تم التأكد من صحة البيانات !');
            }
           else {
               return \redirect('scan')->with('success','هذه الأستمارة مفعلة مسبقاً !');
           }
        } catch (\mysql_xdevapi\Exception $exception) {
            echo "Try again" ;
        }

        }


    public function getCookies()
    {

        if (Cookie::has('id')) {
            $content = Cookie::get('id');
            $no = 1;
            $pageId = $content + $no;
            echo $pageId;
        } else {
            echo 'no cookies';
        }
    }

    public function checkBarcode(Request $request)
    {
        $barcode = $request->barcode ;
        $array = DB::select('select id from cars where random_code = ?' , [$barcode]);
        $id = $array[0]->id;
        Cookie::queue($cookie =  Cookie::make('id', $id, 1));
        if (Cookie::has('id')){
            $id = Cookie::get('id');
            $car = Car::find($id);
        return redirect::to('cars/'. $id)->with(['car'=> $car , 'id' => $id]);
        }
        else {
            return \view('scan');
        }
//
//        $barcode = $request->barcode ;
//        $array = DB::select('select id from cars where random_code = ?' , [$barcode]);
//        $id = $array[0]->id;
//        $car = Car::find($id);
//        return view('cars/showID' , compact('car'));



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
            $car = Car::findOrFail($id);
            $car->delete();
            return \redirect('scan') ->with('error','تم الحذف لعدم صحة البيانات');

    }

    public function export()
    {
        return Excel::download(new CarsExport(), 'carsInformations.xlsx');
    }

    public function export2()
    {
        return Excel::download(new CarsExport(), 'أستمارة المعلومات الخاصة بك.xlsx');
    }

    public function exportpdf()
    {
//        $filename = 'hello_world.pdf';
//
//        $data = [
//            'title' => 'Hello world!'
//        ];
////-------------------------
//        $content = Cookie::get('id');
//
//        if (Cookie::has('id'))
//        {
//            $car = Car::find($content);
//            $view = \View::make('pdf.sample', $data);
//            $html = $view->render();
//
//            $pdf = new TCPDF;
//
//            $pdf::SetTitle('Hello World');
//            $pdf::AddPage();
//            $pdf::writeHTML($html, true, false, true, false, '');
//
//            $pdf::Output(public_path($filename), 'F');
//
//            return response()->with(['car' => $car])->download(public_path($filename));
//        } else {
//            return "Try again and check the barcode " ;
//        }
    }


}
