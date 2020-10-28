<?php $__env->startSection('title'); ?>
  Kontakt 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('center'); ?> 
<br/>
     <section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u(medium)">
								<header class="major">
									
									<p>Kontakt forma</p><br/>
                                                                         


                  <?php if(isset($errors)): ?>
                    <?php if($errors->any()): ?>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  <?php endif; ?>

                  <form action="<?php echo e(asset('/index.php/contact')); ?>" method="get">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Mejl:</label>
                        <input type="text" name="tbMejl" class="form-control" />
                    </div>
                  
                    <div class="form-group">
                      <label>Postavite pitanje:</label>
                      <input type="text" name="tbPitanje" class="form-control"/>
                    </div>
                    <br/>
                    <input type="submit" name="btnContact" value="Pošaljite poruku" class="btn btn-primary"/>
             
                  </form>
                					</header>
							</div>
							
						</div>
                                           <?php echo $__env->make('components.section_one', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				</section>
            		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>