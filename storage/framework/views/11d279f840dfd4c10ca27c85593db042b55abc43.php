<?php $__env->startSection('administracija'); ?>


<div class="col-md-8">
            <h3>Dodaj anketu</h3>
            
            <?php if(isset($errors)): ?>
              <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="alert alert-danger"> <?php echo e($error); ?> </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            <?php endif; ?>

            <form action="<?php echo e(isset($updatePoll)? asset('/index.php/admin/ankete/update/'.$updatePoll->id_ankete) : asset('/index.php/admin/ankete/store')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

             
              <div class="form-group">
                <label>Pitanje:</label>
                <input type="text" name="pitanje" class="form-control" value="<?php echo e(isset($updatePoll)? $updatePoll->pitanje : old('pitanje')); ?>"/>
              </div>
               <div class="form-group">
                <label>Aktivna (0-1)</label>
                <input type="text" name="aktivna" class="form-control" value="<?php echo e(isset($updatePoll)? $updatePoll->aktivna : old('aktivna')); ?>"/>
              </div>
             
               
              <div class="form-group">
                <input type="submit" name="addAnketu" value="<?php echo e(isset($updatePoll)? 'Promeni anketu' : 'Dodaj anketu'); ?>" class="btn btn-default" />
              </div> 
            </form>

            <table class="table">
              <tr>
                <th>ID</th>
                <th>Pitanje</th>
                <th>Aktivna</th>
             
                <th>Izmeni</th>
                <th>Obrisi</th>
              </tr>

              <?php $__currentLoopData = $ankete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anketa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($anketa->id_ankete); ?></td>
                  <td><?php echo e($anketa->pitanje); ?></td>
                  <td><?php echo e($anketa->aktivna); ?></td>
                 
                  <td><a href="<?php echo e(asset('/index.php/admin/ankete/'.$anketa->id_ankete)); ?>">Izmeni</a></td>
                  <td><a href="<?php echo e(asset('/index.php/admin/ankete/destroy/'.$anketa->id_ankete)); ?>">Obrisi</a></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>