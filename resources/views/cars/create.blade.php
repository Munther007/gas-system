<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استمارة المواطن</title>
    <link rel="stylesheet" href="../style.css">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"
            async defer></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
</head>

<body class='snippet-body'>
<div class="container register">
    <div class="row">
        <!-- side bar -->
        <div class="col-md-3 register-left">
            <br>
            <img src="{{asset('logo.png')}}" alt="" />
            <br>
            <br>
            <br>
            <h3>أهلا بك</h3>
            <br>
            <p>يرجى ملئ الاستمارة بعناية <br>
            والتأكد من ملئها بدقة
                <br>قبل الضغط على زر تسجيل البيانات</p>
            {{-- <input type="submit" name="" value="تسجيل دخول" /><br /> --}}
        </div>
        <!-- whole form  -->
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <!-- here is the first form -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h1 class="register-heading">استمارة المواطن</h1>
                    <!-- <div class="row register-form"> -->

                    <form class="row register-form"  action="{{route('cars.store')}}" method="post" enctype="multipart/form-data" dir="rtl">
                    @csrf
                    @method('POST')
                    <!-- here is the column one on the lift -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="اسم المالك *" value="{{ old('owner-name') }}" />
                                @error('owner_name')
                                <div class="form-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <input type="text" class="form-control" name="government_name" id="government_name" placeholder="المحافظة *" value="{{old("government_name")}}" /> --}}
                                <select class="form-control" name="government_name" id="government_name" value="{{old("government_name")}}">
                                    <option class="hidden" selected disabled>المحافظة</option>
                                    <option> بغداد</option>
                                    <option> البصرة</option>
                                    <option> نينوى</option>
                                    <option> أربيل</option>
                                    <option> النجف</option>
                                    <option>ذي قار </option>
                                    <option> كركوك</option>
                                    <option> الانبار</option>
                                    <option> ديالى</option>
                                    <option> المثنى</option>
                                    <option> القادسية</option>
                                    <option>ميسان </option>
                                    <option>واسط </option>
                                    <option>صلاح الدين </option>
                                    <option> دهوك</option>
                                    <option> السليمانية</option>
                                    <option> بابل</option>
                                    <option> كربلاء</option>

                                </select>
                                @error('government_name')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="car_number" id="car_number" placeholder="رقم السيارة *" value="{{old("car_number")}}" />
                                @error('car_number')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="car_letter" id="car_letter" placeholder="الحرف التابع لرقم السيارة *" value="{{old("car_letter")}}" />
                                @error('car_letter')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="document_number" id="document_number" placeholder="رقم السنوية *" value="{{old("document_number")}}" />
                                @error('car_letter')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file"  id="file" name="id_card_photo" id="id_card_photo" value="{{old("id_card_photo")}}" style="display:none;" />
                                <input type="button" class="form-control" id="click-input" value=" تحميل صورة الهوية او البطاقة الموحدة *" onclick="document.getElementById('file').click();" style="text-align: justify;"/>
                                {{-- <label for="click-input" id="file-name">  </label> --}}
                                @error('id_card_photo')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" id="file2"  name="car_photo" id="car_photo" placeholder="صورة المركبة *" value="{{old('car_photo')}}" style="display:none; text-align: center;"  />
                                <input type="button" class="form-control" id="click-input2" value=" تحميل  صورة المركبة *" onclick="document.getElementById('file2').click();" />
                                {{-- <label for="click-input2" id="file-name2">  </label> --}}
                                @error('car_photo')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" id="file3" name="resident_card_photo" id="resident_card_photo" placeholder="صورة بطاقة السكن *" value="{{old('resident_card_photo')}}" style="display:none;" />
                                <input type="button" class="form-control" id="click-input3" value=" تحميل  صورة بطاقة السكن *" onclick="document.getElementById('file3').click();" />
                                <label for="click-input3" id="file-name3">  </label>
                                @error('resident_card_photo')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
{{--                            <div class="btn_form">--}}
{{--                                <input type="submit" class="btnRegister4" value="عرض البيانات" />--}}
{{--                            </div>--}}
                        </div>
                        <!-- here is the second colunm on the right -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="family_number" id="family_number" placeholder="رقم البطاقةالتموينية *" value="{{old("family_number")}}" />
                                @error('family_number')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="11" name="mobile" id="mobile" class="form-control" placeholder="رقم الهاتف *" value="{{old("mobile")}}" />
                                @error('mobile')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="number_type" id="number_type" value="{{old('number_type')}}">
                                    <option class="hidden" selected disabled>أختر نوع الرقم</option>
                                    <option>خصوصي 1</option>
                                    <option>أجرة 2</option>
                                    <option>حمل 3</option>
                                    <option>حكومي 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="car_type" id="car_type" placeholder="نوع السيارة *" value="{{old('car_type')}}" />
                                @error('car_type')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="id_card_number" id="id_card_number" placeholder="رقم الهوية او الموحدة *" value="{{old("id_card_number")}}" />
                                @error('id_card_number')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="resident_number" id="resident_number" placeholder="رقم بطاقة السكن *" value="{{old("resident_number")}}" />
                                @error('resident_number')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" id="file4" name="document_front_photo" id="document_front_photo" placeholder="صورة وجه السنوية *" value="{{old("document_front_photo")}}" style="display:none;" />
                                <input type="button" class="form-control" id="click-input4" value=" تحميل  صورة وجه السنوية *" onclick="document.getElementById('file4').click();" />
                                {{-- <label for="click-input4" id="file-name4">  </label> --}}
                                @error('document_front_photo')
                                <div class="form-error">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" id="file5" name="document_back_photo" id="document_back_photo" placeholder="صورة ظهر السنوية *" value="{{old("document_back_photo")}}" style="display:none;"/>
                                <input type="button" class="form-control" id="click-input5" value=" تحميل  صورة ظهر السنوية *" onclick="document.getElementById('file5').click();" />
                                {{-- <label for="click-input5" id="file-name5">  </label> --}}
                                @error('document_back_photo')
                                <div class="form-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <script src="https://www.google.com/recaptcha/api.js?render={{ env("RECAPTCHA_PUBLIC") }}"></script>



                            <div class="form-group">

                            </div>

                            <div class="btn_form">
                                <button type="submit" class="btnRegister5" value="تسجيل البيانات">تسجيل البيانات </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

{{--            @if(session()->has('status.level'))--}}
{{--                <div class="alert alert-{{ session('status.level') }}">--}}
{{--                    {!! session('status.content') !!}--}}
{{--                </div>--}}
{{--        @endif--}}


            <!-- /////////////////// end of the first form ////////////////////////////////////////////////////////////////////////////-->

        </div>
    </div>
</div>

</div>

<script>
    $("#files").change(function() {
        filename = this.files[0].name;
        console.log(filename);
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    // here is the first up;load photo///////////
    inputElement = document.getElementById('file');
    inputElement2 = document.getElementById('click-input');

    labelElement = document.getElementById('file-name');
    inputElement.onchange = function(event) {
        var path = inputElement.value;
        if (path) {
            // labelElement.innerHTML = path.split(/(\\|\/)/g).pop();
            inputElement2.value= path.split(/(\\|\/)/g).pop();
        } else {
            labelElement.innerHTML = 'اختار صورة الهوية او البطاقة الموحدة ';
        }
    }

    // here is the second upload photo///////////
    inputElement3 = document.getElementById('file2');
    inputElement4 = document.getElementById('click-input2');
    labelElement2 = document.getElementById('file-name2');
    inputElement3.onchange = function(event2) {
        var path2 = inputElement3.value;
        if (path2) {
            inputElement4.value= path2.split(/(\\|\/)/g).pop();
            // labelElement2.innerHTML = path2.split(/(\\|\/)/g).pop()
        } else {
            labelElement2.innerHTML = 'اختار صورةالمركبة ';
        }
    }

    // here is the third upload photo///////////
    inputElement_file3 = document.getElementById('file3');
    inputElement_inp3 = document.getElementById('click-input3');
    labelElement_label3 = document.getElementById('file-name3');
    inputElement_file3.onchange = function(event3) {
        var path3 = inputElement_file3.value;
        if (path3) {
            inputElement_inp3.value= path3.split(/(\\|\/)/g).pop();
            // labelElement2.innerHTML = path2.split(/(\\|\/)/g).pop()
        } else {
            labelElement_label3.innerHTML = 'اختار صورة بطاقة السكن ';
        }
    }


    // here is the fourth upload photo///////////
    inputElement_file4 = document.getElementById('file4');
    inputElement_inp4 = document.getElementById('click-input4');
    labelElement_label4 = document.getElementById('file-name4');
    inputElement_file4.onchange = function(event4) {
        var path4 = inputElement_file4.value;
        if (path4) {
            inputElement_inp4.value= path4.split(/(\\|\/)/g).pop();
            // labelElement2.innerHTML = path2.split(/(\\|\/)/g).pop()
        } else {
            labelElement_label4.innerHTML = 'اختار صورة وجه السنوية ';
        }
    }

    // here is the five upload photo///////////
    inputElement_file5 = document.getElementById('file5');
    inputElement_inp5 = document.getElementById('click-input5');
    labelElement_label5 = document.getElementById('file-name5');
    inputElement_file5.onchange = function(event5) {
        var path5 = inputElement_file5.value;
        if (path5) {
            inputElement_inp5.value= path5.split(/(\\|\/)/g).pop();
            // labelElement2.innerHTML = path2.split(/(\\|\/)/g).pop()
        } else {
            labelElement_label5.innerHTML = 'اختار صورة ظهر السنوية ';
        }
    }
</script>
</body>
</html>
