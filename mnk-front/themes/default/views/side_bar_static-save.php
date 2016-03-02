<div id="sidebar" class="page-sidebar nav-collapse collapse">

 <!-- BEGIN SIDEBAR MENU -->
 <ul>
   <li>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
  </li>
  <li>
    <br>
  </li>

  <li class="start ">
    <?php mnk::ilink("pack-page:root/root-index"); ?>
    <?php ui::img('home2','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Dashboard</span>
  </a>
</li>
<li>
  <a href="#">
  <?php ui::img('books','16', 'fff',array('class' => 'alpha_5')); ?>
  <span class="title">Documentation</span>
</a>
<ul class="sub-menu">
  <li> <?php mnk::ilink("pack-page:doc/doc-core"); ?>
  <?php ui::img('brain','16', 'fff',array('class' => 'alpha_5')); ?>
  <span class="title">Core</span>
</a>
</li>
  <li><li> <?php mnk::ilink("pack-page:doc/doc-mod","",array("mod"=>"admin")); ?>
  <?php ui::img('puzzle4','16', 'fff',array('class' => 'alpha_5')); ?>
  <span class="title">Mod</span>
</a></li>
  <li><?php mnk::ilink("pack-page:uifinder/uifinder-index"); ?>
  <?php ui::img('zoom-in','16', 'fff',array('class' => 'alpha_5')); ?>
  <span class="title">UI image</span>
</a></li>
<li><?php mnk::ilink("pack-page:doc/doc-constant"); ?>
  <?php ui::img('circle','16', 'fff',array('class' => 'alpha_5')); ?>
  <span class="title">Constantes</span>
</a></li>
</ul>
</li>
<li>
  <a href="#">
    <?php ui::img('cogs','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Creator</span>
  </a>
  <ul class="sub-menu">
    <li>
    <?php mnk::ilink("pack-page:snippet-manager/snippet-manager-index"); ?>
    <?php ui::img('code','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Snippet manager</span>
  </a>
</li>


    <li>
      <?php mnk::ilink("pack-page:pack-manager/pack-manager-index","",array("pack"=>"admin")); ?>
      <?php ui::img('package','16', 'fff',array('class' => 'alpha_5')); ?>
      <span class="title">Pack Manager</span>
    </a>
  </li> 
    <li>
      <?php mnk::ilink("pack-page:root/menu-manager"); ?>
      <?php ui::img('menu','16', 'fff',array('class' => 'alpha_5')); ?>
      <span class="title">Menu Manager</span>
    </a>
  </li> 
  <li>
    <?php mnk::ilink("pack-page:theme-manager/theme-manager-index","",array("theme"=>"default")); ?>
    <?php ui::img('stack','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Theme manager</span>
  </a>
</li>
<li>
    <?php mnk::ilink("pack-page:site-manager/site-manager-index","",array("site"=>"default")); ?>
    <?php ui::img('globe','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Site manager</span>
  </a>
</li>
<li>
    <?php mnk::ilink("pack-page:css-grid-generator/css-grid-generator-index"); ?>
    <?php ui::img('grid3','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">CSS grid</span>
  </a>
</li>
<li>
    <?php mnk::ilink("pack-page:css-color-generator/css-color-generator-index"); ?>
    <?php ui::img('paint-format','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">CSS color</span>
  </a>
</li>
<li>
    <?php mnk::ilink("pack-page:basket-manager/basket-manager-index"); ?>
    <?php ui::img('remove7','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Corbeille</span>
  </a>
</li>
</ul>
</li>
<li> <a href="#">
    <?php ui::img('brush','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Draw</span>
  </a>
     <ul class="sub-menu">
       <li><?php mnk::ilink("pack-page:draw/draw-index"); ?>
    <?php ui::img('pencil6','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Code Draw</span>
    </a></li>
       <li>
         
        <?php mnk::ilink("pack-page:draw/draw-normal"); ?>
    <?php ui::img('brush','16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title">Hand Draw</span>
    </a>

       </li>
     </ul>
</li>
</ul>
<!-- END SIDEBAR MENU -->
</div>