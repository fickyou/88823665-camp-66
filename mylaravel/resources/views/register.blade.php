@extends('layout.default')

@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href=""><b>Admin</b>LTE</a>
    </div>
    <!-- /.register-logo -->
    <div class="card">
      <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>
        <form action="{{ url('/register') }}" onsubmit="return myfunction()" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="text" name="name" id="name"class="form-control" placeholder="Full Name">
            <div class="input-group-text"><span class="bi bi-person"></span></div>
            <div class="invalid-feedback" id="invalid-name"></div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <div class="invalid-feedback" id="invalid-email"></div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
            <div class="invalid-feedback" id="invalid-pass"></div>
          </div>
          <!--begin::Row-->
          <div class="row">
            <div class="col-8">
              <div class="form-check">
                <input class="form-check-input" id="mycheckbox" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>
        <button class="btn" onclick="myfunction()">Click me</button>
        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p>
          <a href="#" class="btn btn-primary">
            <i class="bi bi-facebook me-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-danger">
            <i class="bi bi-google me-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->
        <p class="mb-0">
          <a href="{{ url('/login') }}" class="text-center"> I already have a membership </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
  </div>
@endsection

@section('scripts')
    <script>
      function myfunction() {
    // ดึงค่าจากฟอร์ม
    let name = $('#name');
    let email = $('#email');
    let pass = $('#pass');
    let mycheckbox = $('#mycheckbox');

    // รีเซ็ตการแสดงผลของข้อผิดพลาด
    $('#invalid-name').html('');
    $('#invalid-email').html('');
    $('#invalid-pass').html('');

    let valid = true;
    // ตรวจสอบว่า name ไม่เป็นค่าว่าง
    if (name.val().trim() === "") {
        name.addClass('is-invalid');
        $('#invalid-name').html("<b><u>กรุณาระบุชื่อ</u></b>");
        valid = false;
    } else {
        name.removeClass('is-invalid');
    }
    // ตรวจสอบ email ต้องมี @ และ .
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email.val())) {
        email.addClass('is-invalid');
        $('#invalid-email').html("<b><u>กรุณาระบุอีเมลที่ถูกต้อง</u></b>");
        valid = false;
    } else {
        email.removeClass('is-invalid');
    }

    // ตรวจสอบ password ต้องมีตัวเลข ตัวอักษรพิมพ์เล็กและพิมพ์ใหญ่
    const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    if (!passPattern.test(pass.val())) {
        pass.addClass('is-invalid');
        $('#invalid-pass').html("<b><u>รหัสผ่านต้องมีตัวเลข ตัวอักษรพิมพ์เล็ก และพิมพ์ใหญ่</u></b>");
        valid = false;
    } else {
        pass.removeClass('is-invalid');
    }
    if (!mycheckbox.prop('checked')) {
        alert("กรุณายอมรับข้อกำหนด");
        valid = false;
    }
    // ถ้า valid เป็น true ให้ส่งฟอร์ม
    return valid;
}
    </script>
@endsection

{{-- @section('scripts')
    <script>
        let $myvalue
        var myvalue2 = "value of myvalue2"
        const $myvalue3 = ""

        console.log("Hello World!")

        //alert("Hello World!")
        /**/
        //
        //ALERT("Hello World!")
        function myfunction(){
            let name = document.getElementById('name')
            name = $('#name')
            let email = document.getElementById('email')
            let password = document.getElementById('pass')
            let mycheckbox = document.getElementById('mycheckbox')
            // name.value = "My Name Value"
            // name.val("My Name Value")
            console.log(name.val(), email.value, password.value, mycheckbox.checked)
            if(name.val() == "My Name Value"){
                name.addClass('is-invalid');
                $('#invalid-name').html("<b><u>ใส่ name เป็นค่านี้ไม่ได้</u></b>")
                return false;
            } else{
                name.removeClass('is-invalid')
            }

            return true;
        }

        // myfunction()
    </script>
    <script>
        console.log(myvalue2)
    </script>
@endsection --}}
