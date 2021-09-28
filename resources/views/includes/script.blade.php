<script src="{{url('frontend/libraries//jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('frontend/libraries/boostrap/js/bootstrap.js')}}"></script>
    <script src="{{url('frontend/libraries/retina/retina.min.js')}}"></script>
    <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>

    <script>
      $(document).ready(function () {
        $(".xzoom, .xzoom-gallery").xzoom({
          zoomWidth: 500,
          title: false,
          tint: "#333",
          xoffset: 15,
        });
      });
    </script>