<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head.php'); ?>
<?php include ('inc/menu.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if(isset($alert)) echo $alert; ?>
			<!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Entrez les informations </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url().'index.php/parameters'; ?>" method="post">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                                <div class="form-group">
                                  <label>Prix des plats de résistances</label>
                                  <input type="text" id="meal_price" name="meal_price" value="<?php if(isset($params)) echo $params['meal_price']; ?>" required class="form-control" placeholder="Entez une valeur ">
                                </div>
                                <div class="form-group">
                                  <label>Prix des entrées</label>
                                  <input type="text" id="starter_price" class="form-control" value="<?php if(isset($params)) echo $params['starter_price']; ?>" required name="starter_price" placeholder="Entez une valeur">
                                </div>
								 <div class="form-group">
                                  <label>Nouveau mot de passe (facultatif)</label>
                                  <input type="password" id="password" class="form-control" value="" name="password" >
                                </div>
                           </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                  <label>Prix des desserts</label>
                                  <input type="text" id="dessert_price" name="dessert_price" value="<?php if(isset($params)) echo $params['dessert_price']; ?>" required class="form-control" placeholder="Entez une valeur">
                                </div>
                                <div class="form-group">
                                  <label>Nombre de plats chaud à créditer le mois suivant</label>
                                    <input type="text" id="meal_to_add" name="meal_to_add" value="<?php if(isset($params)) echo $params['meal_to_add']; ?>" class="form-control" placeholder="Entez une valeur">
                               </div>
                           </div>
                       </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onClick="return checkValues();">Enregistrer</button> <button type="reset" class="btn btn-default">Annuler</button>
                  </div>
                </form>
              </div><!-- /.box -->
         
		 
		 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include ('inc/footer.php'); ?>
<script>
function checkValues() {
	if($("#meal_price").val() < 0 || $("#starter_price").val() < 0 || $("#dessert_price").val() < 0 || $("#meal_to_add").val() < 0) {
		alert("Aucune valeur négative s.v.p.");
		return false;
	} else {
		if($("#password").val() != '')
			if($("#password").val().length < 5) {
				alert('Le mot de passe doit avoir au moins 5 caractères!');
				return false;
			}
		return true;
	}
	
	
		
}
</script>

