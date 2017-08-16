function loadElement(elementName){

	if(elementName=='users'){
		$('#main-panel-heading').html('Users');
		$('#main-panel-body').load('parts/users.html');
		$('#main-panel-add-link').attr('data-target', '#addUserModal');
		$('#overview-panel').css('display', 'none');
	}
	else if(elementName=='posts'){
		$('#main-panel-heading').html('Posts');
		$('#main-panel-body').load('parts/posts.html');
		$('#main-panel-add-link').attr('data-target', '#addPostModal');
		$('#overview-panel').css('display', 'none');
	}
	else if(elementName=='pages'){
		$('#main-panel-heading').html('Pages');
		$('#main-panel-body').load('parts/pages.html');
		$('#main-panel-add-link').attr('data-target', '#addPageModal');
		$('#overview-panel').css('display', 'none');
	}
	else if(elementName=='profile'){
		$('#main-panel-heading').html('User Profile');
		$('#main-panel-body').load('parts/profile.html');
		$('#overview-panel').css('display', 'none');	
	}
	else if(elementName=='overview'){
		$('#main-panel-heading').html('Posts');
		$('#main-panel-body').load('parts/posts.html');
		$('#main-panel-add-link').attr('data-target', '#addPostModal');
		$('#overview-panel').load('parts/overview-panel.html');
		$('#overview-panel').css('display', 'block');
	}
}