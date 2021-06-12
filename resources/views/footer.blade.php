
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 footer">

            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row">
                            @foreach ($mainmenu as $value)

                            <div class="col-md-2 ">
                                <h6><a class=" dropdown-item m-1 mt-3 p-2 footer" href="{{ route('catagory.catagoryshow',$value->id) }}">{{ $value->banglaname }}</a></h6>
                            </div>

                            @endforeach
                        </div>

                        </div>
                    </div>

                </div>

                <div class="col-3">


                        <a class="dropdown-item footer mt-3" href="#"><i class="fas fa-camera"></i>  ছবি</a>
                        <a class="dropdown-item footer" href="#"><i class="fas fa-video"></i> ভিডিও</a>
                        <a class="dropdown-item footer" href="#"><i class="fas fa-file-archive"></i> আর্কাইভ</a>



                </div>

            </div>


                <hr style="border: 1px solid #444444;">


                <div class="text-left footer">
                    <div class="row linkUnLiRemove">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 footer p-2 m-1">
                            <footer>সম্পাদক ও প্রকাশক : xxxxxxxxx</footer>
                            <footer>ফোন : xxxxxxxxx</footer>
                            <footer>ইমেইল : xxxxxxxxx</footer>
                            <footer class="footer"><i class="fas fa-map-marker"></i> 12/1, Mymensingh Road, Bangla Motor, Dhaka-1000, Bangladesh</footer>
                            <footer> &#169;  স্বত্ব দ্যা বাংলা টাইম {{ date('Y')}}</footer>
                            <a  class="" href="http://www.brainchildbd.xyz/" >
                                <footer><span style="color: red"> Powered by :  </span> &nbsp; <img class='img-fluid' src='/image/profile/brainchild.png' width="40px" /> </footer>

                            </a>

                        </div>
                    </div>


                </div>






    </div>



</div>
