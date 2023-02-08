<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

    <title>زلزال</title>
    <style>
        body{
            direction: rtl;
            background-color: #e5e5e5;
        }
        form{
            width: 600px;
            height: max-content;
            background-color: white;
        }
        .form{
            margin: 280px 0;
        }
        label{
            font-size: 15px;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center form" style="height: 100vh; width: 100%">
    <form class="p-5" action="{{route('cases.store')}}" method="POST">
        @csrf
        <h2 class="text-center mb-5">زلزال</h2>
        <p class="text-center mb-3">زلزال هو موقع بسيط يساعد على تحديد وتنظيم بيانات تتعلق بالاماكن والمناطق المنكوبة
            والفرق العاملة على ايصال المساعدات لها في سوريا</p>
        <p class="text-center mb-3">يرجى تحديد المعلومات بدقة كبيرة لمساعدتنا في ربط المعلومات مع الجهات المختصة
            وتحديدها على الخريطة بدقة</p>
        <h5 class="text-center"><a href="/map">لرؤية الخريطة من هنا</a></h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group my-4">
                <label for="case">حدد نوع الحالة <span style="color: red">* </span></label>
                <select name="type" class="form-control" id="cases" required>
                    <option value="1" selected>انقاض، اشخاص عالقين تحت الانقاض.</option>
                    <option value="2">مراكز يتوفر فيها حاجات اساسية مثل الطعام والشراب</option>
                    <option value="3">مراكز يتوفر فيها ملابس وتدفئة</option>
                    <option value="4">فريق استجابة، فرق تطوعية</option>
                    <option value="5">مراكز ايواء</option>
                    <option value="6">مراكز يتوفر فيها مواصلات</option>
                    <option value="7">مراكز أمنة</option>
                    <option value="8">مراكز غسيل كلية</option>
                    <option value="9">مراكز ونقاط طبية</option>
                    <option value="10">تقديم المساعدة والتطوع</option>
                    <option value="11">أخرى</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">الاسم الثلاثي متطوع او طبيب او مهندس\اسم الجهة\اسم الفريق\اسم المركز <span
                        style="color: red">* </span></label>
                <input type="text" required class="form-control" value="{{old('name')}}" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">رقم للتواصل\ اي وسيلة تواصل مساعدة <span style="color: red">* </span></label>
                <input type="text" required class="form-control" value="{{old('phone')}}" name="phone" id="name">
            </div>

            <div class="form-group">
                <label for="case-description">وصف الحالة\وصف البناء\ وصف امكانيات الفريق او نطاق عمله\ وصف طاقة المراكز
                    الطبية </label>
                <textarea class="form-control" name="description" id="case-description"
                          rows="3">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="case">حالة النقاط الطبية (خاص لنوع الحالة نقطة طبية)</label>
                <select name="medical_point_status" class="form-control" id="cases">
                    <option value="1" selected>فعالة</option>
                    <option value="2">جزئي</option>
                    <option value="0">غير فعالة</option>
                </select>
            </div>

            <div class="form-group">
                <label for="city"> المدينة<span style="color: red">* </span></label>
                <select name="city" required class="form-control" id="city">
                    @foreach($cities as $city)
                        <option
                            value="{{$city['id']}}" {{old('city') ==$city['id'] ? 'selected' : ''}}>{{$city['name']}}</option>
                    @endforeach
                </select>
{{--                <input type="text" name="city" required value="{{old('city')}}" class="form-control" id="city">--}}
            </div>

            <div class="form-group">
                <label for="area"> المنطقة<span style="color: red">* </span></label>
                <input type="text" name="area" required value="{{old('area')}}" class="form-control" id="area">
            </div>

            <div class="form-group">
                <label for="street"> الشارع <span style="color: red">* </span></label>
                <input type="text" name="street" required value="{{old('street')}}" class="form-control" id="street">
            </div>

            <div class="form-group">
                <label for="additional-data">أي بيانات اضافية</label>
                <textarea class="form-control" name="more_info" id="additional-data" rows="3">{{old('more_info')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">ارسال</button>
    </form>
</div>

</body>

</html>
