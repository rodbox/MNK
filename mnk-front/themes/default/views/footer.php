  </div>

</div>

</div>

</div>

</div>

<?php 
mnk::js(
  array(
   "metro-plugins:breakpoints/breakpoints",
   "metro-plugins:jquery.blockui.js",
   "metro-plugins:jquery.cookie",
   "metro-plugins:uniform/jquery.uniform.min",
   //"metro-plugins:fullcalendar/fullcalendar/fullcalendar.min",
   // "metro:app",
   //"metro:calendar",
   "pack:calendar/calendar",
   "pack:root/root",

   "core:mnk-ui"
   )
  );
  ?>
  <script>
  jQuery(document).ready(function() {       
         // initiate layout and plugins
        // App.init();
  });
  </script>
</body>
</html>