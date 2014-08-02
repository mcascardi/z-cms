<?php

return new Z(
	     $html,
	     new Z($head, new Z($title, 'Welcome to Z-CMS')),
	     new Z(
		   $body, 
		   new Z($h1, array('class' => 'title'), 'Welcome to Z-CMS'), 
		   new Z(
			 $h4, 'Well what are you waiting for?', 
			 'Get in Z folder and create some content!'
			 ),
		   array('id' => 'mine') 
		   )
	     );
