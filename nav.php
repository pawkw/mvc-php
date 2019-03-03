<?php
  $nav_items = Route::getNavList();

  $page = basename($_SERVER['PHP_SELF']);

  echo "<nav>";
  echo "<ul>";
  foreach($nav_items as $key => $item) {
      $name = $item['label'];
      if($key == $page) {
          echo '<li class="selected">'.$name.'</li>';
      } else {
          echo '<li><a href="'.$key.'">'.$name.'</a></li>';
      }
  }
  echo "</ul>";
  echo "</nav>";
 ?>
