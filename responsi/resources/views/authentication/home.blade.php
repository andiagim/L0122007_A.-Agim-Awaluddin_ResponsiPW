 @extends('authentication.app')

 @section('content')
 <div class="row">
     <div class="col-md-8 offset-md-2">
         @auth
         <div class="card bg-transparent mt-4">
            <div class="card-body text-center">
                <p class="card-text" style="color:white;">Welcome <b>{{ Auth::user()->name }}</b></p>

                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="display: flex; gap: 10px;">
                    <a class="btn btn-secondary mr-10"style="width: 200px; height:150px;">
                        <img src="image/fakultas.png" alt="Option 1" style="width: 20%; height: 30%; margin-top:30px;">
                        <p style="margin-top: 5px; font-family:'Cabin';">Data Fakultas</p>
                    </a>
                    <a class="btn btn-secondary mr-10" style="width: 200px; height:150px;">
                        <img src="image/prodi.png" alt="Option 2" style="width: 20%; height: 30%; margin-top:30px;">
                        <p style="margin-top: 5px;font-family:'Cabin';">Data Program Studi</p>
                    </a>
                    <a href="mahasiswa" class="btn btn-secondary"style="width:200px; height:150px;">
                        <img src="image/mahasiswa.png" alt="Option 3" style="width: 20%; height: 30%; margin-top:30px;">
                        <p style="margin-top: 5px;font-family:'Cabin';">Data Mahasiswa</p>
                    </a>
                </div>

                <div class="mt-5">
                    <a class="btn btn-outline-primary" href="{{ route('password') }}">Change Password</a>
                    <a class="btn btn-outline-danger" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>

         @endauth
         @guest
         <div class="card bg-transparent border-0 mt-5">
            <p style="color:#BBE9FF; text-align:center; font-family:'Cabin'; font-size:17px; margin-top:48px;">Do You Need Our Help?</p>
            <P style="color:white; text-align:center;  font-weight: bold; font-family:'Cabin'; font-size:50px; margin-top:-20px;">WELCOME TO OUR</P>
            <P style="color: white; text-align:center;  font-weight: bold; font-family:'Cabin'; font-size:50px; margin-top:-25px">UNIVERSITY</P>
             <div class="card-body text-center">
                 <a class="btn btn-outline-info" href="{{ route('login') }}">Login</a>
                 <a class="btn btn-outline-info" href="{{ route('register') }}">Register</a>
             </div>
         </div>
         @endguest
     </div>
 </div>
 @endsection
