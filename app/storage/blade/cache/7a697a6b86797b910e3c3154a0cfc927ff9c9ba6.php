<?php $__env->startSection('title'); ?>
Accueil
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<header>
  <form method="post" action="<?php echo e(url('/deco')); ?>">
    <input type="submit" name="deco" value="DECONNEXION">
  </form>
<<<<<<< HEAD
<<<<<<< HEAD
  <style type="text/css">
    *{
      color:white;
    }
    table{
      border: 1px solid white;
    }
  </style>
=======
  <form method="get" action="<?php echo e(url('/profile')); ?>">
    <input type="submit" name="profile" value="PROFILE">
  </form>
=======
  <a href="<?php echo e(url('/profile')); ?>" class="button">retour à l'accueil</a>
>>>>>>> 83bf2682b17424072d1cc0d939cab8dc32e65bd7

>>>>>>> ca6d0083f3e4a944d9dcfdad8836c3c47d975e67
</header>

<section>
  <div id="cac40">
    <table>
      <tr>
        <td>Nom</td>
        <td>ISIN</td>
        <td>Ouverture</td>
        <td>Fermeture</td>
        <td>Min</td>
        <td>Max</td>
        <td>Variation</td>
        <td>Fav</td>
      </tr>
      <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($action['nom']); ?></td>
          <td><?php echo e($action['ISIN']); ?></td>
          <td><?php echo e($action['ouverture']); ?></td>
          <td><?php echo e($action['fermeture']); ?></td>
          <td><?php echo e($action['bas']); ?></td>
          <td><?php echo e($action['haut']); ?></td>
          <td><?php echo e($action['variation']); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    
  </div>

  <div id="cac80">
    <table>
      <tr>
        <td>Nom</td>
        <td>ISIN</td>
        <td>Ouverture</td>
        <td>Fermeture</td>
        <td>Min</td>
        <td>Max</td>
        <td>Variation</td>
        <td>Fav</td>
      </tr>
      <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($action['nom']); ?></td>
          <td><?php echo e($action['ISIN']); ?></td>
          <td><?php echo e($action['ouverture']); ?></td>
          <td><?php echo e($action['fermeture']); ?></td>
          <td><?php echo e($action['bas']); ?></td>
          <td><?php echo e($action['haut']); ?></td>
          <td><?php echo e($action['variation']); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
  <div>
    <table>
      <tr>
        <td>Nom</td>
        <td>ISIN</td>
        <td>Ouverture</td>
        <td>Fermeture</td>
        <td>Min</td>
        <td>Max</td>
        <td>Variation</td>
        <td>Fav</td>
      </tr>
      <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($action['nom']); ?></td>
          <td><?php echo e($action['ISIN']); ?></td>
          <td><?php echo e($action['ouverture']); ?></td>
          <td><?php echo e($action['fermeture']); ?></td>
          <td><?php echo e($action['bas']); ?></td>
          <td><?php echo e($action['haut']); ?></td>
          <td><?php echo e($action['variation']); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>


</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>