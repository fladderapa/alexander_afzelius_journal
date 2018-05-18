  $(document).ready(function(){
    $('.modal').modal()


    const editButtons = document.getElementsByClassName('edit');
    for(const button of editButtons){
    	button.addEventListener('click', function(){

    		const titleDiv = document.querySelector(`[data-id="${this.id}"] .card-title`);
    		const contentDiv = document.querySelector(`[data-id="${this.id}"] .card-content`);
    		const title = titleDiv.innerText;
    		const content = contentDiv.innerText;

    		document.getElementById('edit-entry-id').value = this.id;
    		document.getElementById('edit-title').value = title;

    		 $('#edit-content').val(content);
  				M.textareaAutoResize($('#edit-content'));
    	})
    }


  });


