<?php
 if($this->params["controller"] == 'main' and $auth == false) {
	    	$tpl = 'project/layouts/main_tpl.php';
	    } 

	    if($this->params["controller"] == 'main' and $auth == true) {
	    	$tpl = 'project/layouts/pagesregisted_tpl.php';
	    } 

	     if($this->params["controller"] == 'author' and $auth == false) {
	    	$tpl = 'project/layouts/main_tpl.php';
	    }

	     if($this->params["controller"] == 'author' and $auth == true) {
	    	$tpl = 'project/layouts/messregisted_tpl.php';
	    }

	    if($this->params["controller"] == 'account') {
	    	$tpl = 'project/layouts/regLogin_tpl.php';
	    }

      if($this->params["controller"] == 'createtheme') {
	    	$tpl = 'project/layouts/createtheme_tpl .php';
	    }
      
      if($this->params["controller"] == 'mythemec') {
	    		$tpl = 'project/layouts/pagesregisted_tpl.php';
	    }
      
       if($this->params["controller"] == 'myanswersc') {
	    		$tpl = 'project/layouts/pagesregisted_tpl.php';
	    }

	    if($this->params["controller"] == 'searchc' and $auth == false) {
	    		$tpl = 'project/layouts/main_tpl.php';
	    }

	    if($this->params["controller"] == 'searchc' and $auth == true) {
	    		$tpl = 'project/layouts/search_tpl.php';
	    }

       if($this->params["controller"] == 'writeanswerc') {
	    		$tpl = 'project/layouts/pagesregisted_tpl.php';
	    }

////////////////////////////////////////////////////////////
if($this->params["controller"] == 'adminc' and $this->params["action"] == 'admina' and  $_SESSION['auth_adm'] == false) {
$tpl = 'project/layouts/admin_tpl.php';
}	    

if($this->params["controller"] == 'adminc' and $this->params["action"] == 'admina' and  $_SESSION['auth_adm'] == true) {
$tpl = 'project/layouts/adminreg_tpl.php';
}

if($this->params["controller"] == 'adminc' and $this->params["action"] == 'adminmoda' and  $_SESSION['auth_adm'] == true) {
$tpl = 'project/layouts/adminname_tpl.php';
}

if($this->params["controller"] == 'adminc' and $this->params["action"] == 'adminmoda' and  $_SESSION['auth_adm'] == false) {
exit('Вы не администратор');
}

if($this->params["controller"] == 'adminc' and $this->params["action"] == 'adminadda' and  $_SESSION['auth_adm'] == true) {
$tpl = 'project/layouts/adminname_tpl.php';
}

if($this->params["controller"] == 'adminc' and $this->params["action"] == 'adminadda' and  $_SESSION['auth_adm'] == false) {
exit('Вы не администратор');
}
///////////////////////////////////////////////////////////////////////
	    
if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatlogina' and  $_SESSION['auth_moderator'] == false) {
$tpl = 'project/layouts/moderotorlogin_tpl.php';
}	    

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatlogina' and  $_SESSION['auth_moderator'] == true) {
$tpl = 'project/layouts/moderotorreg_tpl.php';
}	   

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatorapprova' and  $_SESSION['auth_moderator'] == true) {
$tpl = 'project/layouts/moderator_tpl.php';
}	  

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatorapprova' and  $_SESSION['auth_moderator'] == false) {
exit('Вы не модератор');
}	

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatorthemesa' and  $_SESSION['auth_moderator'] == true) {
$tpl = 'project/layouts/moderator_tpl.php';
}	  

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatorthemesa' and  $_SESSION['auth_moderator'] == false) {
exit('Вы не модератор');
}	

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatorusersa' and  $_SESSION['auth_moderator'] == true) {
$tpl = 'project/layouts/moderator_tpl.php';
}	  

if($this->params["controller"] == 'moderatorc' and $this->params["action"] == 'moderatorusersa' and  $_SESSION['auth_moderator'] == false) {
exit('Вы не модератор');
}	

