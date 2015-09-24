<br />

	<table style="width:100%">
		<tr>
			<td style="width:40%" class="labelled_text">Poids: </td>
			<td style="width:16%"><input type="text" name="poids" id="poids" value="<?php echo $article->getPoids ();?>"  class="classinput_xsize"/></td>
			<td style="width:49%">Kg</td>
		</tr>
		<tr>
			<td class="labelled_text">Colisage:</td>
			<td>
				<input type="text" name="colisage" id="colisage" value="<?php echo $article->getColisage ();?>"  class="classinput_xsize"/>			</td>
			<td >Ex: 1;5;20</td>
		</tr>
		<tr>
			<td class="labelled_text">Dur&eacute;e de Garantie: </td>
			<td><input type="text" name="dure_garantie" id="dure_garantie" value="<?php echo $article->getDuree_garantie ();?>"  class="classinput_xsize"/></td>
			<td >mois</td>
		</tr>
	<tr>
		<td class="labelled_text"></td>
		<td></td>
		<td>&nbsp;</td>
	</tr>
		<?php 
		if (count($stocks_liste)) {
			?>
			<tr>
				<td colspan="3" class="black_info_round">Gestion de stock</td>
			</tr>
			<tr>
				<td></td>
				<td style="text-align: center;" class="labelled_text">Minima</td>
				<td style="text-align: center;" class="labelled_text">Emplacements</td>
			</tr>
			<?php 
		}
		foreach ($stocks_liste as $stock_liste) {
			$seuil_exist = "0";
			$emplacement_article = "";
		 	foreach ($article_stocks_alertes as $article_stock_alerte) {
		 		if ($stock_liste->getId_stock() == $article_stock_alerte->id_stock) {
		 			$seuil_exist = htmlentities($article_stock_alerte->seuil_alerte, ENT_QUOTES, "UTF-8");
		 			$emplacement_article = htmlentities($article_stock_alerte->emplacement, ENT_QUOTES, "UTF-8");
		 		} 
		 	}
			?>
			<tr>
				<td class="labelled_text"><?php echo htmlentities($stock_liste->getLib_stock(), ENT_QUOTES, "UTF-8");?>: </td>
				<td>
					<input type="text" name="stock_<?php echo htmlentities($stock_liste->getId_stock() , ENT_QUOTES, "UTF-8");?>" 
						id="stock_<?php echo htmlentities($stock_liste->getId_stock(), ENT_QUOTES, "UTF-8");?>" 
						value="<?php echo $seuil_exist; ?>"  class="classinput_xsize"/>
				</td>
				<td >
					<input type="text" name="emplacement_stock_<?php echo htmlentities($stock_liste->getId_stock() , ENT_QUOTES, "UTF-8");?>" 
						id="emplacement_stock_<?php echo htmlentities($stock_liste->getId_stock(), ENT_QUOTES, "UTF-8");?>" 
						value="<?php echo $emplacement_article; ?>" class="classinput_xsize"/>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>

<SCRIPT type="text/javascript">
Event.observe("poids", "blur", function(evt){nummask(evt,"0", "X.X");}, false);
Event.observe("dure_garantie", "blur", function(evt){nummask(evt,"<?php echo $article->getDuree_garantie ();?>", "X");}, false);
 Event.observe("colisage", "blur", function(evt){nummask(evt,"<?php echo $article->getColisage ();?>", "X.XX;X.XX");}, false);		
<?php 
foreach ($stocks_liste as $stock_liste) {
	?>
 	Event.observe("stock_<?php echo htmlentities($stock_liste->getId_stock (), ENT_QUOTES, "UTF-8");?>", "blur", function(evt){nummask(evt,"0", "X.X");}, false);
	<?php 
} 
?>
//on masque le chargement
H_loading();
</SCRIPT>
