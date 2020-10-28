<section id="three" class="wrapper style1">
    <div class="container">

        <?php $__currentLoopData = $cetiri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="feature-grid">
            <div class="feature">
                <div class="image rounded"><img src="<?php echo e(asset('/'.$f->slika)); ?>" alt="" /></div>
                <div class="content">
                    <header>
                        <h4><?php echo e($f->alt); ?></h4>

                    </header>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse tenetur accusantium porro omnis, unde mollitia totam sit nesciunt consectetur.</p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
</section>

