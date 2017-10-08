@include('layouts.style')
<title>{{$service->name}} | Service</title>


<div>

    <!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
     @include('layouts.header')
    <!--END TOPBAR-->
    
        <!--BEGIN SIDEBAR MENU-->
        @include('layouts.menu')
        <!--END SIDEBAR MENU-->
        <div id="wrapper">
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            @include('layouts.sidebar')
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">
                        Service</div>
                </div>
                <div class="sharethis-inline-share-buttons col-md-4"></div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix">
                </div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            <div id="tab-general">
                <div class="mbl">
                    <div class="col-lg-12">

                        <div class="col-md-12">
                            <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                            </div>
                        </div>

                    </div>

                    <div>
                    <button class="cornsilk btn-blue" style="margin-top: 20px;">
                        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="padding: 0px;font-size: 25px;"><i class="fa  fa-search" style="font-size: 25px;color: #333;"></i></a>
                    </button>
                        <div class="page-content">
                            <div class="row">
                                <div class="col-lg-8" style="padding: 0;">
                                    <div class="panel" style="padding-top: 20px;">
                                        <div class="panel-body">
                                            <p style="font-size: 25px;color: #357ca5;">{{$service->name}}</p>

                                            <p><code> Alternate Name:</code>{{$service->alternate_name}}</p>

                                            <p><code> Organization Name:</code><a href="/organization_{{$service->organization}}" style="color: #428bca;">{{$organization}}</a></p>

                                            <p><code> Description:</code>{!! $service->description !!}</p>

                                            <p><code> Status:</code><span class="badge badge-green">{{$service->status}}</span></p>

                                            <p><code> Category:</code><a href="/category_{{$taxonomy->taxonomy_id}}" style="color: #428bca;">{{$taxonomy->name}}</a></p>

                                            <p><code> Url:</code>{!! $service->url !!}</p>

                                            <p><code> Email:</code>{{$service->email}}</p>

                                            <p><code> Program:</code>{{$program}}</p>

                                            <div class="divider">
                                                <h2>Additional Info</h2>
                                                <p><code> Application Process:</code>{!! $service->application_process !!}</p>
                                                <p><code> Wait Time:</code>{{$service->wait_time}}</p>
                                                <p><code> Fees:</code>{{$service->fees}}</p>
                                                <p><code> Accreditations:</code>{{$service->accreditations}}</p>
                                                <p><code> Licenses:</code>{{$service->licenses}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4" style="padding: 0;">
                                    <div class="portlet box">
                                        <div class="portlet-header">

                                                <div id="mymap" style="width: 100%;"></div>

                                        </div>
                                        <div class="portlet-body">
                                            <p><code>Address:</code></p>
                                                @foreach($service_map as $servicemap)
                                                    <p><a href="location_{{$servicemap->location_id}}">{{$servicemap->name}}</a>: {{$servicemap->address_1}}, {{$servicemap->city}}, {{$servicemap->state_province}}, {{$servicemap->postal_code}}</p>
                                                @endforeach
                                            <p><code>Contact:</code>{{$contacts}}</p>
                                            <p><code>Regular schedule:</code></p>
                                            <p><code>holiday schedule:</code></p>
                                            <h2>Details</h2>
                                            @foreach($service_details as $service_detail)
                                                <p><span class="badge badge-yellow">{{$service_detail->detail_type}}</span> {!! $service_detail->value !!}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright">
                <a href="#">&copy; ThemesGround 2015. Designed by ThemesGround </a></div>
            </div>
            <!--END FOOTER-->
        </div>
        <!--END CONTENT-->

    </div>
<!--END PAGE WRAPPER-->
</div>

@include('layouts.script')
        <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5XHJ6oNL9-qh0XsL0G74y1xbcxNGkSxw&callback=initMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
  <script type="text/javascript">

    var locations = <?php print_r(json_encode($service_map)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: 40.712722,
      lng: -74.006058,
      zoom:10
    });

    $.each( locations, function( index, value ){
        mymap.addMarker({
          lat: value.latitude,
          lng: value.longitude,
          title: value.name,

        infoWindow: {
            content: (value.name+'</br>' +value.address_1+', ' +value.city+', '+value.state_province+', '+value.postal_code)
        }
        });
   });

  </script>