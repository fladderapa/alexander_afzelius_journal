<!-- REQUIRE HEAD, DATABASE, SESSION TIMEOUT AND CHECK IF SESSION IS ACTIVE. IF FALSEREDIRECT TO INDEX.PHP-->
<?php
  require_once 'partials/head.php';
  if(!isset($_SESSION["loggedIn"])){
    header('Location: index.php');
  }
  require_once 'partials/database.php';
  require_once 'partials/session-timeout.php';

?>
  <a href="partials/logout.php" class="waves-effect waves-light btn orange logout">Logga ut</a>
  <h2 class="center">Journal</h1>
  	<div class="container">
<!-- PREPARING QUESTION TO DATABASE TO GET ALL ENTRIES FROM ACTIVE USER -->
  		<?php
  			$statement = $db->prepare(
  			  "SELECT * FROM entries 
  			  WHERE userID = :userID"
  			);
// EXECUTING THE QUESTION
  			$statement->execute([
  			  ":userID" => $_SESSION["user"]["userID"]
  			]);
// GETTING REVERSED DATA TO GET LATEST ENTRY FIRST 
  			$reversed = $statement->fetchAll();
  			$entries = array_reverse($reversed);
// LOOPING THROUGH ARRAY OF ENTRIES/DATA
  			foreach ($entries as $entry): ?>
  					<div class="row">
  			      <div class="col s10 offset-s1">
  			      	<div class="card entry">
  			        	<div data-id="<?= $entry['entryID'];?>" class="card-content entry-content">
  			          	<span class="card-title"><?= $entry['title']; ?> </span>
  			          	<p class="card-content"><?= $entry['content']; ?></p>
  			       	 	</div>
  				        <div class="card-action">
  				         	<form  action="partials/delete-entry.php" method="POST">
  				         	<input type="hidden" name="entry-id" value=<?= $entry['entryID']; ?>>
  				         		<button class="btn waves-effect waves-light orange right" type="submit" name="action">	Radera
                  		</button>
  				          </form>
                  		<a class="modal-trigger edit btn waves-effect waves-light orange right" id="<?= $entry['entryID'];?>" href="#modal2">Ändra</a>
  				        </div>
  			      	</div>
  			      </div>
  			    </div>
  		<?php 
  			endforeach;
  		?>
  	</div>
  <a class="btn-floating btn-large waves-effect waves-light orange modal-trigger btn-add" href="#modal1"><i class="material-icons">add</i></a>
  <!-- MODAL TO CREATE ENTRY, POST GOES TO CREATE-ENTRY.PHP -->
    <div id="modal1" class="modal">
      <div class="modal-content">
    		<div class="row">
      		<form class="col s10 offset-s1" action="partials/create-entry.php" method="POST">
         		<div class="input-field col s12">
           		<input id="title" name="title" type="text" class="validate">
            	<label for="title">Titel</label>
           	</div>
          	<div class="input-field col s12">
            	<textarea id="textarea1" name="content" class="materialize-textarea"></textarea>
            	<label for="textarea1">Textarea</label>
          	</div>
          	<button class="btn waves-effect waves-light orange right" type="submit" name="action">Skapa
            </button>
      		</form>
    		</div>
    	</div>
    </div>
<!-- MODAL TO EDIT ENTRY, POST GOES TO EDIT-ENTRY.PHP -->
     <div id="modal2" class="modal">
      <div class="modal-content">
    		<div class="row">
      		<form class="col s10 offset-s1" action="partials/edit-entry.php" method="POST">
      		<input id="edit-entry-id" name="edit-entry-id" type="hidden" value="">
         		<div class="input-field col s12">
           		<input id="edit-title" name="edit-title" type="text" class="validate">
           	</div>
          	<div class="input-field col s12">
            	<textarea id="edit-content" name="edit-content" class="materialize-textarea"></textarea>
          	</div>
          	<button class="btn waves-effect waves-light orange right" type="submit" name="action">Skapa
            </button>
      		</form>
    		</div>
    		</div>
    	</div>
  <script src="/js/main.js" defer></script>
</body>
</html>