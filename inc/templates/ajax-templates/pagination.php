<?php
/**
 *
 * This is generating the last page link and the next page link of the portfolio in the frontend when a category is clicked, or the next page is clicked or the last page is clicked
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
</div></div>
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-4">

     <?php

     if( $page > 1 ):

     ?>

       <div class="last-posts text-center">
         <p><a class="btn btn-default last-page" data-max="<?php echo intval( $max ); ?>" data-page="<?php echo intval( $page ); ?>" >LAST</a></p>
       </div>

     <?php
      endif;
     ?>
     </div>

     <div class="col-lg-4 text-center">
       <div class="current-post">
         <p>
         <?php

         if ( $page != 0 && $page !=1 ) {
           echo intval( $page );
         }

         ?>
        </p>
       </div>
     </div>

     <div class="col-lg-4">
       <?php

       if($page <= $max - 1 && $max%8!=0) :

       ?>
       <div class="next-posts text-center">
         <p><a class="btn btn-default next-page" data-max="<?php echo intval( $max ); ?>" data-page="<?php echo intval( $page ); ?>">NEXT</a></p>
       </div>
      <?php
      endif;
      ?>
     </div>

   </div>
 </div>
